<?php
// check login or not
if ( !Auth::check() ) {
    $url = 'auth/login';
    header( "Location: $url" );
    die();
}
?>
@extends('front.template')

@section('main')
    <div class="row checkout_step1">
        <div class="col-md-8 col-xs-8"><h2 class="title-main gray-color"><img src="{!!url('/images/bill_1_07.png')!!}" alt=""> Thông tin đơn hàng </h2></div>
        <div class="col-md-4 col-xs-4"><a class="btn-buy pull-right" href="{!!url('/')!!}">< Trở lại</a></div>
    </div>

    <div class="row">
        <div class="box-green">
            <b class="green-color">Dự kiến: </b>
            <?php echo $mindMessage->note; ?>
        </div>
    </div>

    <div class="row">
        <?php if (count($drugs)) :?>
        <table class="table table-cart">
            <thead>
            <tr>
                <th>Ảnh sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Giá</th>
                <th>Số lượng</th>
            </tr>
            </thead>
            <tbody>
            <?php  foreach($drugs as $drug) { ?>

            <?php
            $qtyDiscount = 0;
            $qtyRoot = 0;
            $qtyTotal = 0;
            $priceTotal = 0;
            $cartCurrentDiscount = array();
            $cartCurrentRoot = array();
            if ($data) {
                if (array_key_exists("productDiscount", $data['dataPrint'])) {
                    $cartCurrentDiscount = $data['dataPrint']['productDiscount'];
                    if (count($cartCurrentDiscount) > 0) {
                        foreach ($cartCurrentDiscount as $productCurrent) {
                            if ($drug['drug_id'] == $productCurrent['product_id']) {
                                $qtyDiscount = $productCurrent['qty'];
                            }
                        }
                    }
                }

                if (array_key_exists("productRoot", $data['dataPrint'])) {
                    $cartCurrentRoot = $data['dataPrint']['productRoot'];
                    if (count($cartCurrentRoot) > 0) {
                        foreach ($cartCurrentRoot as $productCurrent) {
                            if ($drug['drug_id'] == $productCurrent['product_id']) {
                                $qtyRoot = $productCurrent['qty'];
                            }
                        }
                    }
                }

                // get qty total and price total
                $qtyTotal = $data['countQty'];
                $priceTotal = $data['countRootTotalPrice']; // + $data['countDiscount'];
            }
            ?>
            <?php if ($qtyDiscount>0 || $qtyRoot>0):?>
            <tr class="tr-row-<?php echo $drug['drug_id'];?>">
                <?php
                $userId = 0;
                if (Auth::check()) $userId = Auth::user()->id;
                ?>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="mind_id" value="<?php echo $data['mind_id']; ?>">
                <input type="hidden" name="user_id" value="<?php echo $userId ?>">
                <?php
                $price = $drug['drug_price'] ? $drug['drug_price'] : 0;
                $specialPrice = $drug['drug_special_price'] ? $drug['drug_special_price'] : 0;
                ?>


                <input class="price<?php echo $drug['drug_id'];?>" type="hidden" name="price" value="<?php echo $price ?>">
                <input  class="special_price<?php echo $drug['drug_id'];?>" type="hidden" name="special_price" value="<?php echo $specialPrice ?>">


                <td colspan="2"><?php $img = $drug['drugImage']; if($img) { $url = Config::get('constants.pathDrugImg').$img[0]->url;} else {$url = 'images/product.png';}; ?>
                    <img class="show-detail" data-drug="<?php echo $drug['drug_id'];?>" src="{!! url($url) !!}" alt="">
                    <h3 class="" data-drug="<?php echo $drug['drug_id'];?>"><?php echo  $drug['drugInfo']->name;?></h3>
                </td>
                <td>
                    <?php if($drug['drugBasePrice']->drug_special_price > 0) : ?><p class="green-color">Ưu đãi: <?php echo number_format($drug['drugBasePrice']->drug_special_price) ?>đ</p> <?php endif;?>
                    <p>Giá:  <?php echo number_format($drug['drugBasePrice']->drug_price) ?>đ</p>
                </td>
                <td>

                    <?php if ($qtyDiscount > 0) :?>
                    <div class="qty-box qty-<?php echo $drug['drug_id'];?> type_discount" data-type="type_discount">
                        <span data-drug="<?php echo $drug['drug_id'];?>" data-type="type_discount" class="qty_discount qty-minus qty-minus-<?php echo $drug['drug_id'];?>">-</span>
                        <input value="<?php echo $qtyDiscount;?>" name="qty_discount" type="number" max="0"  min="1" data-drug="<?php echo $drug['drug_id'];?>" data-type="type_discount" class="type_discount no-spinners qty_discount qty-count qty-count-<?php echo $drug['drug_id'];?>"/>
                        <span data-drug="<?php echo $drug['drug_id'];?>" data-type="type_discount" class="qty_discount qty-add qty-add-<?php echo $drug['drug_id'];?>">+</span>

                        <span data-drug="<?php echo $drug['drug_id'];?>" data-type="type_discount" class="qty_discount qty-del qty-del-<?php echo $drug['drug_id'];?>">x</span>
                    </div>
                    <?php endif;?>

                    <?php if ($qtyRoot > 0) :?>
                    <div class="qty-box qty-<?php echo $drug['drug_id'];?> type_root" data-type="type_root">
                        <span data-drug="<?php echo $drug['drug_id'];?>" data-type="type_root" class="qty_root qty-minus qty-minus-<?php echo $drug['drug_id'];?>">-</span>
                        <input value="<?php echo $qtyRoot;?>" name="qty_root" type="number" min="1"  max="0"  data-drug="<?php echo $drug['drug_id'];?>" data-type="type_root" class="type_root no-spinners qty_root qty-count qty-count-<?php echo $drug['drug_id'];?>"/>
                        <span data-drug="<?php echo $drug['drug_id'];?>" data-type="type_root" class="qty_root qty-add qty-add-<?php echo $drug['drug_id'];?>">+</span>

                        <span data-drug="<?php echo $drug['drug_id'];?>" data-type="type_root" class="qty_root qty-del qty-del-<?php echo $drug['drug_id'];?>">x</span>
                    </div>
                    <?php endif;?>
                </td>
            </tr>
            <?php endif;?>
            <?php } ?>
            </tbody>
        </table>
        <?php else: echo '<p class="empty-cart">Giỏ hàng rỗng.</p>'; endif; ?>
    </div>

    <?php if (isset($qtyTotal) && ($qtyTotal > 0)) :?>
    <div class="row">
        <div class="col-md-8 row-total col-xs-12">Tổng cộng: <b class="total-qty-cart"><?php echo $qtyTotal;?></b> sản phẩm: <b class="total-price-cart"><?php echo number_format($priceTotal);?>đ</b></div>
        <div class="col-md-4 col-xs-12 button_continue"><a class="btn-continue pull-right" href="{!! url('before-buy') !!}">Tiếp tục</a></div>
    </div>
    <?php endif; ?>

@stop
