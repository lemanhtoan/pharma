<?php
// check login or not
if ( !Auth::check() ) {
    $url = 'auth/login';
    header( "Location: $url" );
    die();
}
?>


<?php $__env->startSection('main'); ?>

    <div class="row">
        <div class="col-md-8"><h2 class="title-main gray-color"><img src="<?php echo url('/images/bill_1_07.png'); ?>" alt=""> Các đơn hàng của tôi </h2></div>
        <div class="col-md-4"><a class="btn-buy pull-right" href="">Lọc đơn hàng</a></div>
    </div>

    <div class="row">
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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>