<?php $__env->startSection('main'); ?>

  <?php echo $__env->make('back.partials.entete', ['icone' => 'pencil', 'fil' => 'Khách hàng', 'title' => 'Khách hàng'. link_to_route('transactions.index', 'Quay lại', [], ['class' => 'btn btn-info pull-right'])], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

  <div class="row col-lg-12">
    <p>Mã Khách hàng: <?php echo e($post->code); ?></p>
    <p>Tên Khách hàng: <?php echo e($post->name); ?></p>
    <p>Số điện thoại: <?php echo e($post->phone); ?></p>
    <p>Email: <?php echo e($post->email); ?></p>
    <p>Địa chỉ: <?php echo e($post->address); ?></p>
    <p>Tỉnh thành: <?php echo e($post->province); ?></p>
    <p>Quận huyện: <?php echo e($post->district); ?></p>
    <p>Số ĐKKD: <?php echo e($post->license); ?></p>
    <p>Loại khách hàng: <?php echo e($post->pharmacieType); ?></p>
    <p>Chủ nhà thuốc: <?php echo e($post->owner); ?></p>
    <p>Trạng thái: <?php if($post->status == '1') {echo 'Hoạt động';}else{echo 'Khóa';}?></p>
  </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('back.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>