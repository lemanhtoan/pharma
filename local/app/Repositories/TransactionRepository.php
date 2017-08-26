<?php

namespace App\Repositories;

use App\Models\Drug;
use App\Models\Mind_Drug;
use App\Models\Transaction;
use App\Models\Province;
use App\Models\District;
use App\Models\TransactionDrug;
use App\Models\Mind;
use App\Models\Shipping;

use App\Helpers\ProcessText;

class TransactionRepository extends BaseRepository {

    public function __construct(
        Transaction $pharmacies
    )
    {
        $this->model = $pharmacies;
    }

    private function save($post, $inputs, $up = null)
    {
        $provinceId = $inputs['province'];
        $provinceData = Province::findOrFail($provinceId);
        $districtId = $inputs['district'];
        $districtData = District::findOrFail($districtId);

        $post->name = $inputs['name'];
        $post->code = $inputs['code'];
        $post->phone = $inputs['phone'];
        $post->email = $inputs['email'];
        $post->address = $inputs['address'];
        $post->license = $inputs['license'];
        $post->pharmacieType = $inputs['pharmacieType'];
        $post->owner = $inputs['owner'];
        $post->status = $inputs['status'];

        $post->province = $provinceData['name'];
        $post->district = $districtData['name'];

        $post->save();

        return $post;
    }

    private function queryActiveWithUserOrderByDate()
    {
        return $this->model
            ->select('*')->latest();
    }

    public function indexFront($n)
    {
        $query = $this->queryActiveWithUserOrderByDate();

        return $query->paginate($n);
    }

    public function search($n,$search, $s_mind_id, $customerGroup, $sStatus, $sProvince, $sDistrict)
    {
        $query = $this->model->select('*')->latest();//$this->queryActiveWithUserOrderByDate();
//dd($query);
        $query->where(function($q) use ($search) {
            $q->where('transactions.owner', 'like', "%$search%")
                ->orWhere('transactions.address', 'like', "%$search%")
                ->orWhere('transactions.phone', 'like', "%$search%");
        });

        if($s_mind_id) {
            $query->where('transactions.mind_id', '=', $s_mind_id);
        }
        if($sStatus =='0'){
            $query->where('transactions.status', '=', "$sStatus");
        }
        if($sStatus) $query->where('transactions.status', '=', "$sStatus");
//        if($sProvince) {
//            $query->leftJoin('customers', 'customers.id', '=', 'transactions.user_id')->get(array('customers.id', 'customers.name'));
//
//            $query->leftJoin('pharmacies','customers.pharmacieId', '=', 'pharmacies.id')->get(array('pharmacies.province', 'pharmacies.code'));
//
//            $query->where('pharmacies.province', '=', "$sProvince");
//        }
//        if($sDistrict) $query->where('district', '=', "$sDistrict");
//        echo $query->toSql();die;

        return $query->paginate($n);
    }

    public function index($n,  $orderby = 'created_at', $direction = 'desc', $search=null, $s_mind_id=null, $customerGroup=null, $sStatus=null, $sProvince=null, $sDistrict=null)
    {
        if($search || $sStatus || $sStatus =='0' || $s_mind_id || $customerGroup || $sProvince || $sDistrict) {
            $query = $this->queryActiveWithUserOrderByDate();

            $query->where(function($q) use ($search) {
                $q->where('owner', 'like', "%$search%")
                    ->orWhere('address', 'like', "%$search%")
                    ->orWhere('phone', 'like', "%$search%");
            });

//        $query->join('pharmacies', function($join)
//        {
//            $join->on('users.id', '=', 'contacts.user_id')
//                ->where('contacts.user_id', '>', 5);
//        });

            if($s_mind_id) {
                $query->where('mind_is', '=', $s_mind_id);
            }
            if($sStatus =='0'){
                $query->where('status', '=', "$sStatus");
            }
            if($sStatus) $query->where('status', '=', "$sStatus");
//            if($sProvince) $query->where('province', '=', "$sProvince");
//            if($sDistrict) $query->where('district', '=', "$sDistrict");

            $query->select('*')
                ->orderBy($orderby, $direction);
        }else{
            $query = $this->model
                ->select('*')
                ->orderBy($orderby, $direction);
        }

        return $query->paginate($n);
    }

    public function show($id)
    {
        $post = $this->model->whereId($id)->firstOrFail();
        $tran_drugs = TransactionDrug::where('transaction_id', $id)->orderBy('drug_id', 'desc')->get();
        $drugs = Drug::orderBy('name', 'asc')->get();
        // fix phí
        $phiMuaho = ProcessText::getConfig('dataKM');
        $phiVanchuyen =  ProcessText::getConfig('dataVC');
        $kmvanchuyen =  ProcessText::getConfig('dataKMVC');

        // get transction subtotal
        $khuyenMai = ProcessText::getKhuyenMai($post->sub_total, $post->user_id);
        $shippings = Shipping::orderby('name', 'asc')->get();
        return compact('post', 'tran_drugs', 'drugs', 'phiMuaho', 'phiVanchuyen', 'khuyenMai', 'kmvanchuyen', 'shippings');
    }

    public function edit($post)
    {
        $province = Province::all();

        if ($post) {
            $provinceData = Province::where('name', $post['province'])->get(['id']);
            $district = District::where('provinceId', $provinceData[0]->id)->orderBy('name', 'asc')->get();
        } else {
            $district = District::all();
        }

        if(count($district) == 0){
            $district = District::all();
        }

        $pharmacieType = \Config::get('constants.pharmacieType');

        return compact('post', 'province', 'district', 'pharmacieType');
    }

    public function getDataMindDrug($mindId, $drugId, $type) {
        $data = Mind_Drug::where('mind_id', $mindId)->where('drug_id', $drugId)->first();
        if ($type=='discount') {
            $price = $data->drug_special_price;
        } else {
            $price = $data->drug_price;
        }
        return $price;
    }

    public function update($inputs, $post)
    {
        // update transaction_drug
//        echo "<pre>"; var_dump($inputs['qty_update']);
        // get min_id from transaction_id

        $mindData = Transaction::where('id', $post->id)->first();
        $mindId = $mindData->mind_id;

        // get data of mind_drug where drug_id and mind_id => price
        $qtys = $inputs['qty_update'];
        $countQty = 0;
        $caclSubPrice = 0;
        foreach ($qtys as $idDrug => $dataQty) {
            foreach ($dataQty as $type=>$qty) {
                $countQty += $qty;
                if ($qty != '0') {
                    if ($type=='discount') {
                        $productPrice = $this->getDataMindDrug($mindId, $idDrug, $type);
                        TransactionDrug::where('transaction_id', $post->id)
                            ->where('drug_id', $idDrug)
                            ->where('type', 'discount')
                            ->update(['qty' => $qty, 'price' => $productPrice*$qty]);
                        $caclSubPrice += ($productPrice * $qty);
                    } else {
                        $productPrice = $this->getDataMindDrug($mindId, $idDrug, $type);
                        TransactionDrug::where('transaction_id', $post->id)
                            ->where('drug_id', $idDrug)
                            ->where('type', 'root')
                            ->update(['qty' => $qty, 'price' => $productPrice*$qty]);
                        $caclSubPrice += ($productPrice * $qty);
                    }
                } else {
                    // 0 :remove product from it
                    TransactionDrug::where('transaction_id', $post->id)
                        ->where('drug_id', $idDrug)
                        ->where('type', $type)
                        ->delete();
                }
            }
        }

        // calc again total count and price (s)
        // sub_total before_total before_pay end_total countQty
        $post->countQty = $countQty;
        $post->sub_total = $caclSubPrice;
        $post->before_total = $caclSubPrice;
        $post->before_pay = $caclSubPrice;
        // fix phí

        $phiMuaho = ProcessText::getConfig('dataKM');
        $phiVanchuyen =  ProcessText::getConfig('dataVC');
        $kmphiVanchuyen =  ProcessText::getConfig('dataKMVC');
        
        $khuyenMai = ProcessText::getKhuyenMai($caclSubPrice, $mindData->user_id); //55000;
        $post->end_total = ($caclSubPrice + $phiMuaho + $phiVanchuyen) - $khuyenMai - $kmphiVanchuyen;

        $post->address = $inputs['address'];
        $post->phone = $inputs['phone'];
        $post->note = $inputs['note_trans'];
        if ($inputs['transaction_status'] != "") {
            $post->status = $inputs['transaction_status'];
        }
        $post->save();
    }

    public function updateActive($inputs)
    {
        $ids = explode(",", $inputs['dataChoise']);
        foreach ($ids as $id ){
            $post = $this->getById($id);

            $post->status = $inputs['status'];

            $post->save();
        }
    }


    public function store($inputs)
    {
        $this->save(new $this->model, $inputs);
    }

    public function destroy($post) {
        $post->delete();
    }
}
