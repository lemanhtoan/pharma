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
        <div class="col-md-8 col-xs-8"><h2 class="title-main gray-color"><img src="{!!url('/images/bill_1_07.png')!!}" alt=""> Chi tiết đơn hàng    # {!! $id !!} </h2></div>
        <div class="col-md-4 col-xs-4"><a class="btn-buy pull-right" href="{!!url('/history')!!}">< Trở lại</a></div>
    </div>
    
    <?php if (isset($message)) : ?>
    <div class="row">
        <div class="alert alert-success alert-dismissable">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>{!! $message !!}</strong>
        </div>
    </div>
    <?php endif;?>
<div class="checkout_step2 after_order">
    <div class="row">
        <p class="status-text"><b>Trạng thái: </b> <?php echo $dataTransaction->status ?></p>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="box-shiper">
                <h3>Thông tin giao hàng:</h3>
                <ul>
                    <li>Người nhận: <span class="value_name"><?php echo $dataTransaction->owner ?></span> </li>
                    <li>Địa chỉ: <span class="vale_address"><?php echo $dataTransaction->address ?></span></li>
                    <li>Điện thoại: <span class="value_phone"><?php echo $dataTransaction->phone ?></span></li>
                </ul>
            </div>

            <div class="box-summary">
                <h3>Tóm tắt đơn hàng:</h3>
                 <div class="row-even">
                    <div class="row-label">Tổng giá trị hàng hóa</div>
                    <div class="row-value"> <?php echo number_format($dataTransaction->sub_total);?></div>
                </div>
                <div class="row-old">
                    <div class="row-label">Chiết khấu</div>
                    <div class="row-value"><?php echo number_format($dataTransaction->cost_discount);?></div>
                </div>
                <div class="row-even">
                    <div class="row-label">Phí mua hộ</div>
                    <div class="row-value"><?php echo number_format($dataTransaction->buyer_cost);?></div>
                </div>
                <div class="row-old">
                    <div class="row-label">Vận chuyển</div>
                    <div class="row-value"><?php echo number_format($dataTransaction->shipping_cost);?></div>
                </div>
                <div class="row-even">
                    <div class="row-label">KM vận chuyển</div>
                    <?php $dataKMVC = DB::table('settings')->where('name', 'dataKMVC')->select('content')->get()[0]; ?>
                    <div class="row-value"><?php echo number_format($dataKMVC->content);?></div>
                </div>
                <div class="row-old">
                    <div class="row-label"><b class="capt">Tổng</b></div>
                    <div class="row-value"><b class="red"><?php echo number_format($dataTransaction->end_total);?></b></div>
                </div>
            </div>

        </div>
        <div class="col-md-6 detail-order">
            <h3>Chi tiết đơn hàng:</h3>
            <table class="table table-order">
                <thead>
                <tr>
                    <th>Thuốc</th>
                    <th>Số lượng</th>
                    <th>Đơn giá</th>
                    <th>Thành tiền</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($dataTranDrugs as $drug) :?>
                <tr>
                    <td><?php
                        foreach ($drugs as $item) {
                        if ($item['id'] == $drug->drug_id) { ?>
                        <p><?php echo $item['name'];?></p>
                        <p><?php echo $item['donvibuon'];?></p>
                        <?php }
                        }
                        ?></td>
                    <td><?php echo $drug->qty ?></td>
                    <td>
                        <?php if ($drug->type=="discount"):?><p>Giá ưu đãi: <?php echo number_format(($drug->price)/($drug->qty)) ?></p><?php endif;?>
                        <?php if ($drug->type=="root"):?><p>Giá thường: <?php echo number_format(($drug->price)/($drug->qty)) ?></p><?php endif;?>
                    </td>
                    <td><?php echo number_format($drug->price) ?></td>
                </tr>
                <?php endforeach; ?>
                </tbody>
            </table>

            <div class="pag-nav pull-right">
                {{ $dataTranDrugs->links() }}
            </div>
        </div>
    </div>
</div>
@stop