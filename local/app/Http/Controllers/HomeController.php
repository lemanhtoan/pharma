<?php

namespace App\Http\Controllers;


use App\Models\Mind;
use App\Models\Mind_Drug;
use App\Models\Drug;
use App\Models\Drug_img;
use App\Models\Customer;
use App\Models\Pharmacies;
use App\Models\Transaction;
use App\Models\TransactionDrug;

use App\Models\Discount;

use App\Settings;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use DateTime;

use PDF;

use App\Helpers\ProcessText;


use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class HomeController extends Controller
{
    /**
     * Display the home page.
     *
     * @return Response
     */
    public function index()
    {
        $mind = Mind::where('end_time', '>',  date("Y-m-d H:i:s") )
            ->where('start_time', '<',  date("Y-m-d H:i:s") )
            ->where('status', '1' )
            ->orderBy('start_time', 'asc')
            ->limit(1)
            ->get();
        if (count($mind)) {
            $drug = Mind::whereId($mind[0]->id)->firstOrFail();

            $drugArr = array();
            if (count($drug->mind_drugs)) {
                $drugItem = array();
                foreach($drug->mind_drugs as $row) {
                    $drugItem['drug_id'] = $row->drug_id;
                    $drugItem['drug_price'] = $row->drug_price;
                    $drugItem['drug_special_price'] = $row->drug_special_price;
                    $drugItem['max_discount_qty'] = $row->max_discount_qty;
                    $drugItem['max_qty'] = $row->max_qty;
                    $drugItem['note'] = $row->note;
                    $drugItem['status'] = $row->status;
                    $drugItem['drugInfo'] = $this->getDrugInfo($row->drug_id);
                    $drugItem['drugImage'] = $this->getDrugImage($row->drug_id);
                    $drugArr[] = $drugItem;
                }
            }

            // sort
            $price = array();
            foreach ($drugArr as $key => $row)
            {
                $price[$key] = $row['drug_special_price'];
            }
            array_multisort($price, SORT_DESC, $drugArr);

            //dd($drugArr);
            //$products =  $query->paginate(15);

            $currentPage = LengthAwarePaginator::resolveCurrentPage();
            $col = new Collection($drugArr);

            // fix test pagination
            $perPage = 12;
            $currentPageSearchResults = $col->slice(($currentPage - 1) * $perPage, $perPage)->all();
            $drugs = new LengthAwarePaginator($currentPageSearchResults, count($col), $perPage, $currentPage,[ 'path' => LengthAwarePaginator::resolveCurrentPath()]);

            $nextMind = Mind::where('start_time', '>',  date("Y-m-d H:i:s") )
                ->where('status', '1' )
                ->orderBy('start_time', 'asc')
                ->limit(1)
                ->get();
            $isCheckMind = false;

            return view( 'front.index', compact('mind', 'drugs', 'nextMind', 'isCheckMind') );
        } else {

            $mind = Mind::where('end_time', '<',  date("Y-m-d H:i:s") )
                ->where('status', '1' )
                ->orderBy('end_time', 'desc')
                ->limit(1)
                ->get();
            if (count($mind)) {
                $drug = Mind::whereId($mind[0]->id)->firstOrFail();
                $drugArr = array();
                if (count($drug->mind_drugs)) {
                    $drugItem = array();
                    foreach ($drug->mind_drugs as $row) {
                        $drugItem['drug_id'] = $row->drug_id;
                        $drugItem['drug_price'] = $row->drug_price;
                        $drugItem['drug_special_price'] = $row->drug_special_price;
                        $drugItem['max_discount_qty'] = $row->max_discount_qty;
                        $drugItem['max_qty'] = $row->max_qty;
                        $drugItem['note'] = $row->note;
                        $drugItem['status'] = $row->status;
                        $drugItem['drugInfo'] = $this->getDrugInfo($row->drug_id);
                        $drugItem['drugImage'] = $this->getDrugImage($row->drug_id);
                        $drugArr[] = $drugItem;
                    }
                }

                $currentPage = LengthAwarePaginator::resolveCurrentPage();
                $col = new Collection($drugArr);

                // fix test pagination
                $perPage = 12;
                $currentPageSearchResults = $col->slice(($currentPage - 1) * $perPage, $perPage)->all();
                $drugs = new LengthAwarePaginator($currentPageSearchResults, count($col), $perPage, $currentPage, ['path' => LengthAwarePaginator::resolveCurrentPath()]);

                //$products =  $query->paginate(15);

                $nextMind = Mind::where('start_time', '>', date("Y-m-d H:i:s"))
                    ->where('status', '1')
                    ->orderBy('start_time', 'asc')
                    ->limit(1)
                    ->get();

                $isCheckMind = true;
                return view('front.index', compact('mind', 'drugs', 'nextMind', 'isCheckMind'));
            } else{
                $isCheckMind = true;
                $drugs = array();
                $nextMind = Mind::where('start_time', '>', date("Y-m-d H:i:s"))
                    ->where('status', '1')
                    ->orderBy('start_time', 'asc')
                    ->limit(1)
                    ->get();
                return view('front.index', compact('mind', 'drugs', 'nextMind', 'isCheckMind'));
            }
        }

    }

    //settLogo settHotline settMuaho settVanchuyen settQD settHT
    public function settLogo(Request $rq) {
        $check = Settings::where('name', 'dataLogo')->lists( 'content', 'id')->toArray();
        if ($check) {
            $checkId = key($check);
            $checkContent = array_values($check)[0];
            $cat = Settings::find($checkId);
            $cat->name = 'dataLogo';
            $file_path = public_path('uploads/commons/').$checkContent;
            if ($rq->hasFile('logo')) {
                if (file_exists($file_path))
                {
                    unlink($file_path);
                }

                $f = $rq->file('logo')->getClientOriginalName();
                $filename = time().'_'.$f;
                $cat->content = $filename;
                $rq->file('logo')->move('uploads/commons/',$filename);
            }
            $cat->save();

        } else {
            $item = new Settings();
            $f = $rq->file('logo')->getClientOriginalName();
            $filename = time().'_'.$f;
            $item->name = 'dataLogo';
            $item->content = $filename;
            $rq->file('logo')->move('uploads/commons/',$filename);
            $item->save();
        }
        return redirect()->route('getsettings');
    }

    public function settHotline(Request $rq) {
        $check = Settings::where('name', 'dataHotline')->lists( 'content', 'id')->toArray();
        if ($check) {
            $checkId = key($check);
            $cat = Settings::find($checkId);
            $cat->name = 'dataHotline';
            $cat->content = $rq->hotline;
            $cat->save();

        } else {
            $item = new Settings();
            $item->name = 'dataHotline';
            $item->content = $rq->hotline;
            $item->save();
        }

        return redirect()->route('getsettings');
    }

    public function settMuaho(Request $rq) {
        $check = Settings::where('name', 'dataKM')->lists( 'content', 'id')->toArray();
        if ($check) {
            $checkId = key($check);
            $cat = Settings::find($checkId);
            $cat->name = 'dataKM';
            $cat->content = $rq->muaho;
            $cat->save();

        } else {
            $item = new Settings();
            $item->name = 'dataKM';
            $item->content = $rq->muaho;
            $item->save();
        }

        return redirect()->route('getsettings');
    }

    public function settVanchuyen(Request $rq) {
        $check = Settings::where('name', 'dataVC')->lists( 'content', 'id')->toArray();
        if ($check) {
            $checkId = key($check);
            $cat = Settings::find($checkId);
            $cat->name = 'dataVC';
            $cat->content = $rq->vanchuyen;
            $cat->save();

        } else {
            $item = new Settings();
            $item->name = 'dataVC';
            $item->content = $rq->vanchuyen;
            $item->save();
        }

        return redirect()->route('getsettings');
    }

    public function settKMVC(Request $rq) {
        $check = Settings::where('name', 'dataKMVC')->lists( 'content', 'id')->toArray();
        if ($check) {
            $checkId = key($check);
            $cat = Settings::find($checkId);
            $cat->name = 'dataKMVC';
            $cat->content = $rq->kmvanchuyen;
            $cat->save();

        } else {
            $item = new Settings();
            $item->name = 'dataKMVC';
            $item->content = $rq->kmvanchuyen;
            $item->save();
        }

        return redirect()->route('getsettings');
    }

    public function settMinDiscount(Request $rq) {
        $check = Settings::where('name', 'dataDiscount')->lists( 'content', 'id')->toArray();
        if ($check) {
            $checkId = key($check);
            $cat = Settings::find($checkId);
            $cat->name = 'dataDiscount';
            $cat->content = $rq->mindiscount;
            $cat->save();

        } else {
            $item = new Settings();
            $item->name = 'dataDiscount';
            $item->content = $rq->mindiscount;
            $item->save();
        }

        return redirect()->route('getsettings');
    }
    
    public function settQD(Request $rq) {
        $check = Settings::where('name', 'dataQD')->lists( 'content', 'id')->toArray();
        if ($check) {
            $checkId = key($check);
            $cat = Settings::find($checkId);
            $cat->name = 'dataQD';
            $cat->content = $rq->quydinh;
            $cat->save();

        } else {
            $item = new Settings();
            $item->name = 'dataQD';
            $item->content = $rq->quydinh;
            $item->save();
        }

        return redirect()->route('getsettings');
    }
    public function settHT(Request $rq) {
        $check = Settings::where('name', 'dataHT')->lists( 'content', 'id')->toArray();
        if ($check) {
            $checkId = key($check);
            $cat = Settings::find($checkId);
            $cat->name = 'dataHT';
            $cat->content = $rq->hotro;
            $cat->save();

        } else {
            $item = new Settings();
            $item->name = 'dataHT';
            $item->content = $rq->hotro;
            $item->save();
        }

        return redirect()->route('getsettings');
    }


    public function getsettings()
    {
        return View ('back.settings-list', $this->getDataSetting());
    }


    public function getDataSetting() {
        $data = Settings::all();
        $dataQD = Settings::where('name', 'dataQD')->get(['content'])->toArray();
        $dataHT = Settings::where('name', 'dataHT')->get(['content'])->toArray();
        $dataLogo = Settings::where('name', 'dataLogo')->get(['content'])->toArray();
        $dataKM = Settings::where('name', 'dataKM')->get(['content'])->toArray();
        $dataVC = Settings::where('name', 'dataVC')->get(['content'])->toArray();
        $dataKMVC = Settings::where('name', 'dataKMVC')->get(['content'])->toArray();
        $dataHotline = Settings::where('name', 'dataHotline')->get(['content'])->toArray();
        $dataDiscount = Settings::where('name', 'dataDiscount')->get(['content'])->toArray();
        return ['data'=>$data,
            'dataQD'=> $dataQD,
            'dataHT' => $dataHT,
            'dataLogo' => $dataLogo,
            'dataKM' => $dataKM,
            'dataVC' => $dataVC,
            'dataHotline' => $dataHotline,
            'dataKMVC'=> $dataKMVC,
            'dataDiscount'=> $dataDiscount
        ];
    }

    public function showOrder($id) {
        if (Auth::check()) $user = Auth::user()->id;
        $transctionId =  Transaction::where('user_id', $user)->where('id', $id)->first();
        $dataTransaction = Transaction::whereId($transctionId->id)->firstOrFail();
        $dataTranDrugArrs = TransactionDrug::where('transaction_id', $transctionId->id)->orderBy('drug_id', 'desc')->get();

        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $col = new Collection($dataTranDrugArrs);

        // fix test pagination
        $perPage = 15;
        $currentPageSearchResults = $col->slice(($currentPage - 1) * $perPage, $perPage)->all();
        $dataTranDrugs = new LengthAwarePaginator($currentPageSearchResults, count($col), $perPage, $currentPage,[ 'path' => LengthAwarePaginator::resolveCurrentPath()]);


        $drugs = Drug::orderBy('name', 'asc')->get();
        return view( 'front.orderview', compact('dataTransaction', 'dataTranDrugs', 'drugs', 'id') );

    }
    public function searchData(Request $request)
    {
        $keyword = $request->input('txtkeyword');
        $drugSearchs = \DB::table('drugs')->where('name', 'LIKE', '%' . $keyword . '%')->orWhere('code', 'LIKE', '%' . $keyword . '%')
            ->orWhere('content', 'LIKE', '%' . $keyword . '%')
            ->orWhere('activeIngredient', 'LIKE', '%' . $keyword . '%')
            ->orWhere('design', 'LIKE', '%' . $keyword . '%')
            ->orWhere('produceCompany', 'LIKE', '%' . $keyword . '%')
            ->orWhere('produceCountry', 'LIKE', '%' . $keyword . '%')
            ->orWhere('donvibuon', 'LIKE', '%' . $keyword . '%')
            ->orWhere('donvile', 'LIKE', '%' . $keyword . '%')->get();
        $drugArrSearch = array();
        foreach($drugSearchs as $row) {
            $drugArrSearch[] = $row->id;
        }

        $mind = Mind::where('end_time', '>',  date("Y-m-d H:i:s") )
            ->where('start_time', '<',  date("Y-m-d H:i:s") )
            ->where('status', '1' )
            ->orderBy('start_time', 'asc')
            ->limit(1)
            ->get(['id']);
        
        if (count($mind)) {
            $drug = Mind::whereId($mind[0]->id)->firstOrFail();

            $drugArr = array();
            if (count($drug->mind_drugs)) {
                $drugItem = array();
                foreach ($drug->mind_drugs as $row) {
                    if (in_array($row->drug_id, $drugArrSearch)) {
                        $drugItem['drug_id'] = $row->drug_id;
                        $drugItem['drug_price'] = $row->drug_price;
                        $drugItem['drug_special_price'] = $row->drug_special_price;
                        $drugItem['max_discount_qty'] = $row->max_discount_qty;
                        $drugItem['max_qty'] = $row->max_qty;
                        $drugItem['note'] = $row->note;
                        $drugItem['status'] = $row->status;
                        $drugItem['drugInfo'] = $this->getDrugInfo($row->drug_id);
                        $drugItem['drugImage'] = $this->getDrugImage($row->drug_id);
                        $drugArr[] = $drugItem;
                    }
                }
            }

            // sort
            $price = array();
            foreach ($drugArr as $key => $row) {
                $price[$key] = $row['drug_special_price'];
            }
            array_multisort($price, SORT_DESC, $drugArr);

            //dd($drugArr);
            //$products =  $query->paginate(15);

            $currentPage = LengthAwarePaginator::resolveCurrentPage();
            $col = new Collection($drugArr);

            // fix test pagination
            $perPage = 12;
            $currentPageSearchResults = $col->slice(($currentPage - 1) * $perPage, $perPage)->all();
            $drugs = new LengthAwarePaginator($currentPageSearchResults, count($col), $perPage, $currentPage, ['path' => LengthAwarePaginator::resolveCurrentPath()]);

            $nextMind = Mind::where('start_time', '>', date("Y-m-d H:i:s"))
                ->where('status', '1')
                ->orderBy('start_time', 'asc')
                ->limit(1)
                ->get();
            $isCheckMind = false;
            return view('front.index', compact('mind', 'drugs', 'nextMind', 'isCheckMind'));
        } else {
            $isCheckMind = true;
            $drugs = array();
            $nextMind = Mind::where('start_time', '>', date("Y-m-d H:i:s"))
                ->where('status', '1')
                ->orderBy('start_time', 'asc')
                ->limit(1)
                ->get();
            return view('front.index', compact('mind', 'drugs', 'nextMind', 'isCheckMind'));
        }

    }

    // test pdf
    public function doPdf() {
        $data = array(
            'title' => 'Title page'
        );
        $pdf = PDF::loadView('pdf.invoice', $data);
        return $pdf->download('invoice.pdf');
    }

    public function getQuydinh(){
        $content = ProcessText::getConfig('dataQD');
        return view( 'front.static', compact('content') );
    }

    public function getHotro(){
        $content = ProcessText::getConfig('dataHT');
        return view( 'front.static', compact('content') );
    }

    public function getProfile() {
        $content = 'Noi dung profile';
        if (Auth::check()) {
            $user = Auth::user()->id;
            $content =  Customer::where('id', $user)->first();
            $dataAdd = Pharmacies::where('id', $content->pharmacieId)->first();
            return view( 'front.profile', compact('content', 'dataAdd') );
        }

        return view( 'front.profile', compact('content') );
    }

    public function updateProfile(Request $request) {
        if (Auth::check()) {
            $user = Auth::user()->id;
            $content =  Customer::where('id', $user)->first();
            $phone = $request->input('phone');
            $email = $request->input('email');
            $password= $request->input('password');

            $userId = $request->input('user_id');

            if ($userId  == $user) {
                if ($password !="") {
                    Customer::where('id', $user)
                        ->update(['password' => bcrypt($password), 'email' =>  $email,
                            'phone' => $phone]);
                } else {
                    Customer::where('id', $user)
                        ->update(['email' =>  $email, 'phone' => $phone]);
                }

            }

            $message =  'Cập nhật thành công';
            return redirect('/profile')->with('content', 'message');
        }
        $content = 'Không được phép truy cập';

        return view( 'front.profile', compact('content') );
    }




    public function getDrugInfo($id) {
        $drug = Drug::whereId($id)->first();
        if (count($drug)) {
            return $drug;
        }
        return array();
    }

    public function checkDrugQty($drugId, $mindId) {
        return Mind_Drug::where('drug_id', $drugId)->where('mind_id', $mindId)->firstOrFail();
    }

    public function drugBasePrice($drugId, $mindId) {
        return Mind_Drug::where('drug_id', $drugId)->where('mind_id', $mindId)->firstOrFail();
    }

    public function getCheckout() {
        $data = \Session::get('pharma.cartDataJson');

        // get all product id in cart
        $productIds = array();
        $cartCurrentDiscount = \Session::get('pharma.cartData.productDiscount');
        if (count($cartCurrentDiscount) > 0) {
            foreach ($cartCurrentDiscount as $productCurrent) {
                if (!in_array($productCurrent['product_id'], $productIds)) $productIds[] = $productCurrent['product_id'];
            }
        }

        $cartCurrentRoot = \Session::get('pharma.cartData.productRoot');
        if (count($cartCurrentRoot) > 0) {
            foreach ($cartCurrentRoot as $productCurrent) {
                if (!in_array($productCurrent['product_id'], $productIds)) $productIds[] = $productCurrent['product_id'];
            }
        }

        $mindId = \Session::get('pharma.cartData.mindId');
        $drugs = array();
        if (count($productIds)) {
            $drug = Mind::whereId($mindId)->firstOrFail();
            $drugItem = array();
            foreach($productIds as $id) {
                if (count($drug->mind_drugs)) {
                    foreach($drug->mind_drugs as $row) {
                        if ($id ==  $row->drug_id) {
                            $drugItem['drug_price'] = $row->drug_price;
                            $drugItem['drug_special_price'] = $row->drug_special_price;
                            $drugItem['max_discount_qty'] = $row->max_discount_qty;
                            $drugItem['max_qty'] = $row->max_qty;
                        }
                    }
                }

                $drugItem['drug_id'] = $id;
                $drugItem['drugInfo'] = $this->getDrugInfo($id);
                $drugItem['drugImage'] = $this->getDrugImage($id);
//                var_dump($id, $mindId); echo "<hr>";
                $drugItem['drugBasePrice'] =  $this->drugBasePrice($id, $mindId);
                $drugs[] = $drugItem;
            }
        }

        $mindId = $data['mind_id'];
        $mindMessage = Mind::whereId($mindId)->firstOrFail();
        return view( 'front.checkout', compact('data', 'drugs', 'mindMessage') );
    }

    public function getBeforeBuy() {
        $data = \Session::get('pharma.cartDataJson');
        if (Auth::check()) $user = Auth::user()->id;
        $dataUser = Customer::whereId($user)->first();

        $dataAdd = Pharmacies::where('id', $dataUser->pharmacieId)->first();

        $priceTotal = $data['countRootTotalPrice'];

        $khuyenmai = ProcessText::getKhuyenMai($priceTotal, $user);
        $muaho = ProcessText::getConfig('dataKM');
        $vanchuyen =  ProcessText::getConfig('dataVC');
        $kmvanchuyen =  ProcessText::getConfig('dataKMVC');

        $mindId = $data['mind_id'];
        $mindMessage = Mind::whereId($mindId)->firstOrFail();

        return view( 'front.before-buy', compact('data', 'dataUser', 'khuyenmai', 'mindMessage', 'muaho', 'vanchuyen', 'kmvanchuyen', 'dataAdd') );
    }

    public function postProcessBuy(Request $request) {
        $cName = $request->input('customer_name');
        $cAddress = $request->input('customer_address');
        $cPhone = $request->input('customer_phone');

        // fix phí
        $phiMuaho = ProcessText::getConfig('dataKM');
        $phiVanchuyen =  ProcessText::getConfig('dataVC');
        $kmphiVanchuyen =  ProcessText::getConfig('dataKMVC');
        //$khuyenMai = 55000;

        $data = \Session::get('pharma.cartDataJson');

        $arrayImport = array();
        $arrTemp = array();
        if (array_key_exists("productDiscount", $data['dataPrint'])) {
            $cartCurrentDiscount = $data['dataPrint']['productDiscount'];
            if (count($cartCurrentDiscount) > 0) {
                foreach ($cartCurrentDiscount as $productCurrent) {
                    $arrTemp['product_id'] = $productCurrent['product_id'];
                    $arrTemp['qty_discount'] = $productCurrent['qty'];
                    $arrTemp['qty_root'] = 0;
                    $arrTemp['special_price'] = $productCurrent['special_price'];
                    $arrTemp['price'] = $productCurrent['price'];
                    $arrTemp['type'] = 'discount';
                    $arrayImport[] = $arrTemp;
                }
            }
        }

        if (array_key_exists("productRoot", $data['dataPrint'])) {
            $cartCurrentRoot = $data['dataPrint']['productRoot'];
            if (count($cartCurrentRoot) > 0) {
                foreach ($cartCurrentRoot as $productCurrent) {
                    $arrTemp['product_id'] = $productCurrent['product_id'];
                    $arrTemp['qty_discount'] = 0;
                    $arrTemp['qty_root'] = $productCurrent['qty'];
                    $arrTemp['special_price'] = $productCurrent['special_price'];
                    $arrTemp['price'] = $productCurrent['price'];
                    $arrTemp['type'] = 'root';
                    $arrayImport[] = $arrTemp;
                }
            }
        }


        // create new transaction
        $transction = new Transaction();
        $transction->mind_id = $data['mind_id'];
        $transction->user_id = $data['user_id'];
        $transction->created_date = new datetime;
        $transction->address = $cAddress;
        $transction->phone = $cPhone;

        $transction->owner = $cName;
        $transction->shipping_method = 'Vận chuyển tới khách hàng';
        $transction->status = 'Đợi giao hàng';
        $transction->sub_total = $data['countRootTotalPrice'];
        $transction->buyer_cost = $phiMuaho;
        $transction->shipping_cost = $phiVanchuyen;

        $transction->cost_discount = ProcessText::getKhuyenMai($data['countRootTotalPrice'], $data['user_id']);

        $transction->before_total = $data['countRootTotalPrice'];
        $transction->before_pay = $data['countRootTotalPrice'];


        $transction->end_total = ($data['countRootTotalPrice'] + $phiMuaho + $phiVanchuyen) - $kmphiVanchuyen - ProcessText::getKhuyenMai($data['countRootTotalPrice'], $data['user_id']);
        $transction->countQty = $data['countQty'];
        $transction->save();

        $transctionId = $transction->id;

        // insert data relation transaction drugs

        // 	drug_id 	qty  qty_discount   	price 	price_discount
        if (count($arrayImport)) {
            foreach ($arrayImport as $drug) {

                if ($drug['type'] = 'discount') {
                    $tranDrug = new TransactionDrug();
                    $tranDrug->transaction_id = $transctionId;
                    $tranDrug->drug_id = $drug['product_id'];
                    $tranDrug->qty = $drug['qty_discount'];
                    $tranDrug->price = $drug['special_price'];
                    $tranDrug->type = 'discount';
                    if ($tranDrug->price > 0 ){
                        $tranDrug->save();
                    }

                }

                if ($drug['type'] = 'root') {
                    $tranDrug = new TransactionDrug();
                    $tranDrug->transaction_id = $transctionId;
                    $tranDrug->drug_id = $drug['product_id'];
                    $tranDrug->qty = $drug['qty_root'];
                    $tranDrug->price = $drug['price'];
                    $tranDrug->type = 'root';
                    if ($tranDrug->price > 0 ){
                        $tranDrug->save();
                    }
                }

            }
        }

        // remove session - empty cart
        \Session::forget('pharma.cartDataJson');
        \Session::forget('pharma.cartData.productDiscount');
        \Session::forget('pharma.cartData.productRoot');


        $dataTransaction = Transaction::whereId($transctionId)->firstOrFail();
        $dataTranDrugArrs = TransactionDrug::where('transaction_id', $transctionId)->orderBy('drug_id', 'desc')->get();

        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $col = new Collection($dataTranDrugArrs);

        // fix test pagination
        $perPage = 15;
        $currentPageSearchResults = $col->slice(($currentPage - 1) * $perPage, $perPage)->all();
        $dataTranDrugs = new LengthAwarePaginator($currentPageSearchResults, count($col), $perPage, $currentPage,[ 'path' => LengthAwarePaginator::resolveCurrentPath()]);

        $drugs = Drug::orderBy('name', 'asc')->get();

        $message = 'Đơn hàng của bạn đã được tạo, xin cảm ơn quý khách!';

        return view( 'front.after-buy', compact('dataTransaction', 'dataTranDrugs', 'drugs', 'message') );
    }

    public function getProcessBuy(Request $request) {
        if (Auth::check()) $user = Auth::user()->id;
        $transctionId =  Transaction::where('user_id', $user)->orderBy('id', 'desc')->first();
        $dataTransaction = Transaction::whereId($transctionId->id)->firstOrFail();
        $dataTranDrugArrs = TransactionDrug::where('transaction_id', $transctionId->id)->orderBy('drug_id', 'desc')->get();


        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $col = new Collection($dataTranDrugArrs);

        // fix test pagination
        $perPage = 15;
        $currentPageSearchResults = $col->slice(($currentPage - 1) * $perPage, $perPage)->all();
        $dataTranDrugs = new LengthAwarePaginator($currentPageSearchResults, count($col), $perPage, $currentPage,[ 'path' => LengthAwarePaginator::resolveCurrentPath()]);


        $drugs = Drug::orderBy('name', 'asc')->get();

        return view( 'front.after-buy', compact('dataTransaction', 'dataTranDrugs', 'drugs') );
    }

    public function getHistory(Request $request){
        if (!empty($request->all())) {
            $sort = $request->all();
            if (Auth::check()) {
                $user = Auth::user()->id;
                if(key($sort) !='page') {
                    $dataTransaction =  Transaction::where('user_id', $user)->orderBy(key($sort) , $sort[key($sort)] )->paginate(5);
                } else {
                    $dataTransaction =  Transaction::where('user_id', $user)->paginate(15);
                }

                return view( 'front.history', compact('dataTransaction', 'order') );
            }
        }
        if (Auth::check()) {
            $user = Auth::user()->id;
            $dataTransaction =  Transaction::where('user_id', $user)->orderBy('id', 'desc')->paginate(15);
            return view( 'front.history', compact('dataTransaction', 'order') );
        }
        return view( 'front.history', compact('order'));

    }

    public function postProductCart(Request $request) {

        if ($request->input('data_add') == 'delete') {

            $productId = (int)$request->input('product_id');
            $mindId = (int)$request->input('mind_id');
            $userId = (int)$request->input('user_id');
            $dataType = $request->input('type_add');

            // root price ===============================
            if ($dataType == 'type_root') {
                $cartCurrentRoot = $request->session()->get('pharma.cartData.productRoot');
                $currentProductIdsRoot = array();

                if (count($cartCurrentRoot)>0) {
                    foreach ($cartCurrentRoot as $productCurrent) {
                        array_push($currentProductIdsRoot, $productCurrent['product_id']);
                    }
                }

                // check product exist in current list
                if (in_array($productId, $currentProductIdsRoot)) {

                    // remove from data
                    foreach ($cartCurrentRoot as $key => $productCurrent){
                        if ($productCurrent['product_id'] == $productId) {
                            unset($cartCurrentRoot[$key]);
                        }
                    }
                }

                // update - set again value session
                $request->session()->put('pharma.cartData.productRoot', $cartCurrentRoot);

            } else {
                // discount price ========================================
                $cartCurrentDiscount = $request->session()->get('pharma.cartData.productDiscount');
                $currentProductIdsDiscount = array();

                if (count($cartCurrentDiscount) > 0) {
                    foreach ($cartCurrentDiscount as $productCurrent) {
                        array_push($currentProductIdsDiscount, $productCurrent['product_id']);
                    }
                }

                // check product exist in current list
                if (in_array($productId, $currentProductIdsDiscount)) {

                    // remove from data
                    foreach ($cartCurrentDiscount as $key => $productCurrent){
                        if ($productCurrent['product_id'] == $productId) {
                            unset($cartCurrentDiscount[$key]);
                        }
                    }
                }

                // update - set again value session
                $request->session()->put('pharma.cartData.productDiscount', $cartCurrentDiscount);
            }

            $cartGetSession = $request->session()->get('pharma.cartData');

            $dataRoot = array();
            if (array_key_exists('productRoot', $cartGetSession)) {
                $dataRoot = $cartGetSession['productRoot'];
            }

            $dataDiscount = array();
            if (array_key_exists('productDiscount', $cartGetSession)) {
                $dataDiscount = $cartGetSession['productDiscount'];
            }

            $countRootQty = 0;
            $countRootTotalPrice = 0;

            if (count($dataRoot) > 0) {
                foreach ($dataRoot as $dataCart) {
                    $countRootQty += $dataCart['qty'];
                    $countRootTotalPrice += $dataCart['price'];
                }
            }


            $countDiscountQty = 0;
            $countDiscount = 0;

            if (count($dataDiscount) > 0) {
                foreach ($dataDiscount as $dataCart) {
                    $countDiscountQty += $dataCart['qty'];
                    $countRootTotalPrice += $dataCart['special_price'];
                    $countDiscount += $dataCart['discount'];
                }
            }

            $dataReturn = array(
                'dataPrint' => $cartGetSession,
                'mind_id' => $mindId,
                'user_id' => $userId,
                'countQty' => $countRootQty + $countDiscountQty,
                'countRootQty' => $countRootQty,
                'countRootTotalPrice' => $countRootTotalPrice,
                'countDiscount' => $countDiscount,
                'countDiscountQty' => $countDiscountQty,
            );


            // session of datajson
            $request->session()->get('pharma.cartDataJson');
            $request->session()->put('pharma.cartDataJson', $dataReturn);
            $request->session()->save();

            // session of mindId
            $request->session()->get('pharma.cartData.mindId');
            $request->session()->put('pharma.cartData.mindId', $mindId);
            $request->session()->save();

            return response()->json([
                'cartData' => $dataReturn,
                'message' => 'Xóa sản phẩm thành công'
            ]);

        } else {
            $result = array();
            $productId = (int)$request->input('product_id');

            $mindId = (int)$request->input('mind_id');
            $userId = (int)$request->input('user_id');
            $specialPrice = $request->input('special_price');
            $price = $request->input('price');
            $dataType = $request->input('type_add');

            // check max qty discount
            $qtyGetDb = $this->checkDrugQty($productId, $mindId);
            $qtyMaxDiscount = (int)$qtyGetDb->max_discount_qty;
            $qtyMaxAllow = (int)$qtyGetDb->max_qty;
            if ($qtyMaxAllow == 0) {
                $qtyMaxAllow = 5000; // no limit
            }
            $isRootPrice = 0;
            $isAddRoot = 0;

            // type_discount_price
            $qtyDiscount = 0;
            if ($dataType == 'type_discount') {
                $qtyDiscount = (int)$request->input('qty');
                $isAddRoot = 0;
                $isRootPrice = 0;

                if ($qtyDiscount > $qtyMaxDiscount) { // discount apply
                    $isRootPrice = 1;
                    $qtyDiscount = $qtyMaxDiscount;
                }

                $arrayProductDiscount = array(
                    'product_id' =>   $productId,
                    'qty' =>   $qtyDiscount,
                    'mind_id' =>   $mindId,
                    'user_id' =>  $userId,
                    'price' =>   0,
                    'special_price' =>  $qtyDiscount * $specialPrice,
                    'discount' => ($qtyDiscount * $price) - ($qtyDiscount * $specialPrice)
                );


                // discount price ========================================
                $cartCurrentDiscount = $request->session()->get('pharma.cartData.productDiscount');
                $currentProductIdsDiscount = array();

                if (count($cartCurrentDiscount) > 0) {
                    foreach ($cartCurrentDiscount as $productCurrent) {
                        array_push($currentProductIdsDiscount, $productCurrent['product_id']);
                    }
                }

                // check product exist in current list
                if (in_array($productId, $currentProductIdsDiscount)) {

                    // remove from data
                    foreach ($cartCurrentDiscount as $key => $productCurrent){
                        if ($productCurrent['product_id'] == $productId) {
                            unset($cartCurrentDiscount[$key]);
                        }
                    }
                }

                // update - set again value session
                $request->session()->put('pharma.cartData.productDiscount', $cartCurrentDiscount);

                // add new value to it
                $request->session()->push('pharma.cartData.productDiscount', $arrayProductDiscount);
                $request->session()->save();

            }

            // type_root_price
            $qtyRoot = 0;
            if ($dataType == 'type_root') {

                //dd($request->all());

                $qtyRoot = (int)$request->input('qty');

                if( $qtyRoot <= $qtyMaxAllow ) { // in stock
                    $isRootPrice = 1;
                    // nếu có sản phẩm khuyến mãi
                    if ($qtyMaxDiscount > 0) {
                        // lấy ra số lượng đã mua khuyến mãi hiện tại và cộng thêm số qty để biết nó vượt hay k
                        $cartCurrentDiscount = $request->session()->get('pharma.cartData.productDiscount');
                        if ($cartCurrentDiscount) {
                            foreach ($cartCurrentDiscount as $key => $productCurrent){
                                if ($productCurrent['product_id'] == $productId) {
                                    $discountQty = $productCurrent['qty'];
                                }
                            }
                        }
                        if ( ($discountQty + $qtyRoot) > $qtyMaxAllow) {
                            // apply root price for discount
                            $arrayProductRoot = array(
                                'product_id' =>   $productId,
                                'qty' =>   ($qtyRoot-1),
                                'mind_id' =>   $mindId,
                                'user_id' =>   $userId,
                                'price' => ($qtyRoot-1) * $price,
                                'special_price' =>   0,
                                'discount' => 0
                            );
                            $isRootPrice = 2;
                            $result['errors'] = 'Vượt quá giới hạn sản phẩm được mua trong phiên (giới hạn: ' . $qtyMaxAllow. ' sản phẩm)';
                        } else {
                            // apply root price for discount
                            $arrayProductRoot = array(
                                'product_id' =>   $productId,
                                'qty' =>   $qtyRoot,
                                'mind_id' =>   $mindId,
                                'user_id' =>   $userId,
                                'price' => $qtyRoot * $price,
                                'special_price' =>   0,
                                'discount' => 0
                            );
                        }
                    } else {

                        // khong co gia khuyen mai
                        // apply root price for discount
                        $arrayProductRoot = array(
                            'product_id' =>   $productId,
                            'qty' =>   $qtyRoot,
                            'mind_id' =>   $mindId,
                            'user_id' =>   $userId,
                            'price' => $qtyRoot * $price,
                            'special_price' =>   0,
                            'discount' => 0
                        );
                    }
                } else {
                    $arrayProductRoot = array(
                        'product_id' =>   $productId,
                        'qty' =>   $qtyMaxAllow,
                        'mind_id' =>   $mindId,
                        'user_id' =>   $userId,
                        'price' => $qtyMaxAllow * $price,
                        'special_price' =>   0,
                        'discount' => 0
                    );
                    $isRootPrice = 2;
                    $result['errors'] = 'Vượt quá giới hạn sản phẩm được mua trong phiên (giới hạn: ' . $qtyMaxAllow. ' sản phẩm)';
                }

                // root price ===============================
                $cartCurrentRoot = $request->session()->get('pharma.cartData.productRoot');
                $currentProductIdsRoot = array();

                if (count($cartCurrentRoot)>0) {
                    foreach ($cartCurrentRoot as $productCurrent) {
                        array_push($currentProductIdsRoot, $productCurrent['product_id']);
                    }
                }

                // check product exist in current list
                if (in_array($productId, $currentProductIdsRoot)) {

                    // remove from data
                    foreach ($cartCurrentRoot as $key => $productCurrent){
                        if ($productCurrent['product_id'] == $productId) {
                            unset($cartCurrentRoot[$key]);
                        }
                    }
                }

                // update - set again value session
                $request->session()->put('pharma.cartData.productRoot', $cartCurrentRoot);

                // add new value to it
                $request->session()->push('pharma.cartData.productRoot', $arrayProductRoot);
                $request->session()->save();
            }

            $cartGetSession = $request->session()->get('pharma.cartData');

            $dataRoot = array();
            if (array_key_exists('productRoot', $cartGetSession)) {
                $dataRoot = $cartGetSession['productRoot'];
            }

            $dataDiscount = array();
            if (array_key_exists('productDiscount', $cartGetSession)) {
                $dataDiscount = $cartGetSession['productDiscount'];
            }

            $countRootQty = 0;
            $countRootTotalPrice = 0;

            if (count($dataRoot) > 0) {
                foreach ($dataRoot as $dataCart) {
                    $countRootQty += $dataCart['qty'];
                    $countRootTotalPrice += $dataCart['price'];
                }
            }


            $countDiscountQty = 0;
            $countDiscount = 0;

            if (count($dataDiscount) > 0) {
                foreach ($dataDiscount as $dataCart) {
                    $countDiscountQty += $dataCart['qty'];
                    $countRootTotalPrice += $dataCart['special_price'];
                    $countDiscount += $dataCart['discount'];
                }
            }

            $dataReturn = array(
                'dataPrint' => $cartGetSession,
                'mind_id' => $mindId,
                'user_id' => $userId,
                'countQty' => $countRootQty + $countDiscountQty,
                'countRootQty' => $countRootQty,
                'countRootTotalPrice' => $countRootTotalPrice,
                'countDiscount' => $countDiscount,
                'countDiscountQty' => $countDiscountQty,
            );

            // session of datajson
            $request->session()->get('pharma.cartDataJson');
            $request->session()->put('pharma.cartDataJson', $dataReturn);
            $request->session()->save();

            // session of mindId
            $request->session()->get('pharma.cartData.mindId');
            $request->session()->put('pharma.cartData.mindId', $mindId);
            $request->session()->save();

            return response()->json([
                'isRootPrice' => $isRootPrice,
                'isAddRoot' => $isAddRoot,
                'cartData' => $dataReturn,
                'message' => $result
            ]);
        }

    }

    public function getDrugImage($id) {
        $data = array();
        $detail = Drug_img::where('drug_id',$id)->get();
        if(count($detail)) {
            foreach ($detail as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return $data;
    }

    public function mindBefore() {

        $mind = Mind::where('end_time', '<',  date("Y-m-d H:i:s") )
            ->where('status', '1' )
            ->orderBy('end_time', 'desc')
            ->limit(1)
            ->get(['id']);
        $drug = Mind::whereId($mind[0]->id)->firstOrFail();
        $drugArr = array();
        if (count($drug->mind_drugs)) {
            $drugItem = array();
            foreach($drug->mind_drugs as $row) {
                $drugItem['drug_id'] = $row->drug_id;
                $drugItem['drug_price'] = $row->drug_price;
                $drugItem['drug_special_price'] = $row->drug_special_price;
                $drugItem['max_discount_qty'] = $row->max_discount_qty;
                $drugItem['max_qty'] = $row->max_qty;
                $drugItem['note'] = $row->note;
                $drugItem['status'] = $row->status;
                $drugItem['drugInfo'] = $this->getDrugInfo($row->drug_id);
                $drugItem['drugImage'] = $this->getDrugImage($row->drug_id);
                $drugArr[] = $drugItem;
            }
        }

        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $col = new Collection($drugArr);

        // fix test pagination
        $perPage = 15;
        $currentPageSearchResults = $col->slice(($currentPage - 1) * $perPage, $perPage)->all();
        $drugs = new LengthAwarePaginator($currentPageSearchResults, count($col), $perPage, $currentPage,[ 'path' => LengthAwarePaginator::resolveCurrentPath()]);

        //$products =  $query->paginate(15);

        $nextMind = Mind::where('start_time', '>',  date("Y-m-d H:i:s") )
            ->where('status', '1' )
            ->orderBy('start_time', 'asc')
            ->limit(1)
            ->get();


        $mindCheckExist = Mind::where('end_time', '>',  date("Y-m-d H:i:s") )
            ->where('start_time', '<',  date("Y-m-d H:i:s") )
            ->where('status', '1' )
            ->orderBy('start_time', 'asc')
            ->limit(1)
            ->get(['id']);
        $isCheckMind = false;
        if(count($mindCheckExist)) {
            $isCheckMind = true;
        }
        return view( 'front.mind-before', compact('drugs', 'nextMind', 'isCheckMind') );
    }

    /**
     * Change language.
     *
     * @param  App\Jobs\ChangeLocaleCommand $changeLocale
     * @param  String $lang
     * @return Response
     */
//    public function language( $lang,
//                              ChangeLocale $changeLocale)
//    {
//        $lang = in_array($lang, config('app.languages')) ? $lang : config('app.fallback_locale');
//        $changeLocale->lang = $lang;
//        $this->dispatch($changeLocale);
//
//        return redirect()->back();
//    }

}
