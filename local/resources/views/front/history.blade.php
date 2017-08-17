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
    <?php if (count($dataTransaction)) { ?>
    <div class="row row-top">
        <div class="col-md-8"><h2 class="title-main gray-color"><img src="{!!url('/images/bill_1_07.png')!!}" alt=""> Các đơn hàng của tôi </h2></div>
        <div class="col-md-4"><a class="btn-buy pull-right" href="">Lọc đơn hàng</a></div>
    </div>

    <div class="row bg-padding">
        <table class="table table-order history">
            <thead>
            <tr>
                <th>Mã đặt hàng <br> Mã đơn</th>
                <th class="two-rows">Tổng tiền</th>
                <th class="two-rows">Tình trạng</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($dataTransaction as $tran) :?>
            <tr>
                <td><?php $date = date_create($tran->created_date); echo date_format($date, 'd/m/Y');?><br><span class="red"><?php echo '#',$tran->id;?></span></td>
                <td><?php echo number_format($tran->end_total) ?>đ</td>
                <td><?php echo $tran->status ?></td>
            </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?php } else { ?>
    <h4>Danh sách rỗng</h4>
    <?php } ?>

@stop