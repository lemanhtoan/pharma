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
        <div class="col-md-4" style="display: none"><a class="btn-buy pull-right" href="">Lọc đơn hàng</a></div>
    </div>

    <div class="row bg-padding">
        <table class="table table-order history">
            <thead>
            <tr>
                <th>Mã đặt hàng <br> Mã đơn</th>
                <th class="two-rows"><span class="title">Tổng tiền</span>
                    <a  class="sasc" <?php if(isset($_GET['end_total']) && $_GET['end_total'] == 'asc'){ ?> style="display: none"<?php } ?>  href="{!! url('/history?end_total=asc') !!}" >
                        <i class="fa fa-sort-asc" aria-hidden="true"></i>
                    </a>
                    <a class="sdesc <?php if(isset($_GET['end_total']) && $_GET['end_total'] == 'asc'){ ?> no-padl<?php }?> " <?php if(isset($_GET['end_total']) && $_GET['end_total'] == 'desc'){ ?> style="display: none"<?php }?> href="{!! url('/history?end_total=desc') !!}">
                        <i class="fa fa-sort-desc" aria-hidden="true"></i>
                    </a>
                </th>

                <th class="two-rows">
                    <span class="title">Tình trạng</span>
                    <a  class="sasc" <?php if(isset($_GET['status']) && $_GET['status'] == 'asc'){ ?> style="display: none"<?php } ?>  href="{!! url('/history?status=asc') !!}" >
                        <i class="fa fa-sort-asc" aria-hidden="true"></i>
                    </a>
                    <a class="sdesc <?php if(isset($_GET['status']) && $_GET['status'] == 'asc'){ ?> no-padl<?php }?> " <?php if(isset($_GET['status']) && $_GET['status'] == 'desc'){ ?> style="display: none"<?php }?> href="{!! url('/history?status=desc') !!}">
                        <i class="fa fa-sort-desc" aria-hidden="true"></i>
                    </a>
                </th>
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