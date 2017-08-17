<?php $__env->startSection('main'); ?>

  <?php echo $__env->make('back.partials.entete', ['icone' => 'pencil', 'fil' => 'Nhóm thuốc', 'title' => 'Nhóm thuốc'. link_to_route('groupdrug.index', 'Quay lại', [], ['class' => 'btn btn-info pull-right'])], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

  <div class="row col-lg-12">
    <p>Mã nhóm thuốc: <?php echo e($post->code); ?></p>
    <p>Tên viết tắt: <?php echo e($post->short_name); ?></p>
    <p>Tên đầy đủ: <?php echo e($post->full_name); ?></p>
    <p>Ghi chú: <?php echo e($post->note); ?></p>
    <p>Trạng thái: <?php if($post->status == '1') {echo 'Hoạt động';}else{echo 'Khóa';}?></p>
  </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('back.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>