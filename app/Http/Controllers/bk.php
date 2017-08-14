<?php

namespace App\Http\Controllers;


use App\Models\Mind;
use App\Models\Mind_Drug;
use App\Models\Drug;
use App\Models\Drug_img;
use Illuminate\Http\Request;

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
            ->orderBy('start_time', 'asc')
            ->limit(1)
            ->get(['id']);

        $drug = Mind::whereId($mind[0]->id)->firstOrFail();

        $drugs = array();
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
                $drugs[] = $drugItem;
            }
        }
        //$products =  $query->paginate(15);

        $nextMind = Mind::where('start_time', '>',  date("Y-m-d H:i:s") )
            ->orderBy('start_time', 'asc')
            ->limit(1)
            ->get();

        return view( 'front.index', compact('mind', 'drugs', 'nextMind') );
    }

    public function getDrugInfo($id) {
        return Drug::whereId($id)->firstOrFail();
    }

    public function checkDrugQty($drugId, $mindId) {
        return Mind_Drug::where('drug_id', $drugId)->where('mind_id', $mindId)->firstOrFail();
    }

    public function getCheckout() {
        $data = array();
        $cartCurrentDiscount = \    Session::get('pharma.cartData');
        $drugs = array();
        if (count($cartCurrentDiscount)) {
            $drugItem = array();
            foreach($cartCurrentDiscount as $row) {
                $drugItem['drug_id'] = $row['product_id'];
                $drugItem['drugInfo'] = $this->getDrugInfo($row['product_id']);
                $drugItem['drugImage'] = $this->getDrugImage($row['product_id']);
                $drugItem['mind_id'] = $row['mind_id'];
                $drugItem['user_id'] = $row['user_id'];
                $drugItem['price'] = $row['price'];
                $drugItem['special_price'] = $row['special_price'];
                $drugItem['discount'] = $row['discount'];
                $drugItem['qty'] = $row['qty'];
                $drugs[] = $drugItem;
            }
        }
        return view( 'front.checkout', compact('data', 'drugs') );
    }

    public function getBeforeBuy() {
        $data = array();
        return view( 'front.before-buy', compact('data') );
    }

    public function getProcessBuy(Request $request) {
        // process add to db and return view
        // mind_id user_id created_date  address  owner  phone  shipping_method  note   status (enum - or interger ) => contstant  created_at updated_at
        //  ==> will update   sub_total    shipping_cost   shipping_discount  before_total  before_pay  end_toal

        return view( 'front.after-buy', compact('data') );
    }

    public function postProductCart(Request $request) {
        $result = array();
        $productId = (int)$request->input('product_id');
        $qty = (int)$request->input('qty');
        $mindId = (int)$request->input('mind_id');
        $userId = (int)$request->input('user_id');
        $specialPrice = $request->input('special_price');
        $price = $request->input('price');
        $dataType = $request->input('type_add');

        // check max qty discount
        $qtyGetDb = $this->checkDrugQty($productId, $mindId);
        $qtyMaxDiscount = (int)$qtyGetDb->max_discount_qty;
        $qtyMaxAllow = (int)$qtyGetDb->max_qty;

        // $dataType with type_discount_price and type_root_price
        // type_discount_price
        $qtyDiscount = 0;
        if ($dataType == 'type_discount_price') {
            $qtyDiscount = $qty;
            $isAddRoot = 0;
            $isRootPrice = 0;

            if ($qty > $qtyMaxDiscount) { // discount apply
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
        if ($dataType == 'type_root_price') {

            if( $qty <= $qtyMaxAllow ) { // in stock
                $isRootPrice = 1;
                $isAddRoot = 1;

                // check if type_root_price and have qty_discount => default = qty post
                if ($qtyMaxDiscount > 0) {
                    $qtyRoot = $qty - $qtyMaxDiscount;
                    $qtyDiscount = $qtyMaxDiscount;
                } else {
                    $qtyRoot = $qty;
                }

            } else {
                $result['errors'] = 'Vượt quá giới hạn sản phẩm được mua trong phiên (giới hạn: ' . $qtyMaxAllow. ' sản phẩm)';
            }

            // apply root price
            $arrayProductRoot = array(
                'product_id' =>   $productId,
                'qty' =>   $qtyRoot,
                'mind_id' =>   $mindId,
                'user_id' =>   $userId,
                'price' => $qtyRoot * $price,
                'special_price' =>   0,
                'discount' => 0
            );


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
        //echo "<pre>"; var_dump($cartGetSession);

//        $countQty = 0;
//        $countTotalPrice = 0;
//        $countDiscount = 0;
//        foreach ($cartGetSession as $dataCart) {
//            $countQty += $dataCart['qty'];
//            $countTotalPrice += ($dataCart['price'] + $dataCart['special_price']);
//            $countDiscount += $dataCart['discount'];
//        }
//
        $dataReturn = array(
            'mind_id' => $mindId,
            'user_id' => $userId,
            'count_qty' => $qtyDiscount + $qtyRoot, // $countQty,
            'count_price' => 100, // $countTotalPrice,
            'count_discount' => 200, // $countDiscount
            'aaddddtest' => $cartGetSession,
            'qtyDiscount' => $qtyDiscount,
            'qtyRoot' => $qtyRoot
        );

//        // session of datajson
//        $request->session()->get('pharma.cartDataJson');
//        $request->session()->put('pharma.cartDataJson', $dataReturn);
//        $request->session()->save();
//
        return response()->json([
            'isRootPrice' => $isRootPrice,
            'isAddRoot' => $isAddRoot,
            'cartData' => $dataReturn
        ]);

        //echo "<pre>"; var_dump($request->all(), $request->session()->get('pharma.cartData')); //->all());
        //die;
    }

    public function getDrugImage($id) {
        $data = array();
        $detail = Drug_img::where('drug_id',$id)->get();
        foreach ($detail as $row) {
            $data[] = $row;
        }
        return $data;
    }

    public function mindBefore() {

        $mind = Mind::where('end_time', '<',  date("Y-m-d H:i:s") )
            ->orderBy('end_time', 'desc')
            ->limit(1)
            ->get(['id']);

        $drug = Mind::whereId($mind[0]->id)->firstOrFail();

        $drugs = array();
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
                $drugs[] = $drugItem;
            }
        }
        //$products =  $query->paginate(15);

        $nextMind = Mind::where('start_time', '>',  date("Y-m-d H:i:s") )
            ->orderBy('start_time', 'asc')
            ->limit(1)
            ->get();

        return view( 'front.mind-before', compact('drugs', 'nextMind') );
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
