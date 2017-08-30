<?php

namespace App\Repositories;

use App\Models\Pharmacies;
use App\Models\Province;
use App\Models\District;

class PharmaciesRepository extends BaseRepository {

    public function __construct(
        Pharmacies $pharmacies
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

        $post->uid = uniqid();
        $post->username = uniqid();
        $post->password = uniqid();
        $post->phamercist = $inputs['owner'];
        $post->ownerPhone = $inputs['phone'];

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

    public function search($n, $search,  $sPharmacieType, $sStatus, $sProvince, $sDistrict)
    {
        $query = $this->queryActiveWithUserOrderByDate();

        $query->where(function($q) use ($search) {
            $q->where('code', 'like', "%$search%")
                ->orWhere('name', 'like', "%$search%")
                ->orWhere('address', 'like', "%$search%")
                ->orWhere('owner', 'like', "%$search%")
                ->orWhere('email', 'like', "%$search%")
                ->orWhere('license', 'like', "%$search%")
                ->orWhere('phone', 'like', "%$search%");
        });
        if($sPharmacieType) $query->where('pharmacieType', '=', "$sPharmacieType");
        if($sStatus =='0'){
            $query->where('status', '=', "$sStatus");
        }
        if($sStatus) $query->where('status', '=', "$sStatus");
        if($sProvince) $query->where('province', '=', "$sProvince");
        if($sDistrict) $query->where('district', '=', "$sDistrict");
        //echo $query->toSql();die;

        return $query->paginate($n);
    }

    public function index($n,  $orderby = 'created_at', $direction = 'desc', $search=null, $sPharmacieType=null, $sStatus=null, $sProvince=null, $sDistrict=null)
    {
        if($search || $sStatus || $sStatus =='0' || $sPharmacieType || $sProvince || $sDistrict) {
            $query = $this->queryActiveWithUserOrderByDate();

            $query->where(function($q) use ($search) {
                $q->where('code', 'like', "%$search%")
                    ->where('name', 'like', "%$search%")
                    ->orWhere('code', 'like', "%$search%")
                    ->orWhere('address', 'like', "%$search%")
                    ->orWhere('owner', 'like', "%$search%")
                    ->orWhere('email', 'like', "%$search%")
                    ->orWhere('license', 'like', "%$search%")
                    ->orWhere('phone', 'like', "%$search%");
            });
            if($sPharmacieType) $query->where('pharmacieType', '=', "$sPharmacieType");
            if($sStatus =='0'){
                $query->where('status', '=', "$sStatus");
            }
            if($sStatus) $query->where('status', '=', "$sStatus");
            if($sProvince) $query->where('province', '=', "$sProvince");
            if($sDistrict) $query->where('district', '=', "$sDistrict");
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
        return compact('post');
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

    public function update($inputs, $post)
    {
        $this->save($post, $inputs, 'update');
    }

    public function updateActive($inputs, $id)
    {
        $post = $this->getById($id);

        $post->status = $inputs['status'] == 'true';

        $post->save();
    }

    public function updateActiveChecked($ids)
    {
        foreach ($ids as $id ){
            $post = $this->getById($id);

            $post->status = 1;

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
