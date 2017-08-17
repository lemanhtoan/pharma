<?php $__env->startSection('main'); ?>

  <?php echo $__env->make('back.partials.entete', ['icone' => 'pencil', 'fil' => 'Người dùng', 'title' => 'Người dùng'. link_to_route('customer.index', 'Quay lại', [], ['class' => 'btn btn-info pull-right'])], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

  <div class="row col-lg-12">
    <p>Tên người dùng: <?php echo e($post->name); ?></p>
    <p>Số điện thoại: <?php echo e($post->phone); ?></p>
    <p>Email: <?php echo e($post->email); ?></p>
    <p>Nhà thuốc:
      <?php foreach($pharmacies as $gd) { ?>
      <?php if(isset($post->pharmacieId) && $post->pharmacieId == $gd['id']){ ?>
      <?php echo link_to('pharmacies/' . $gd['id'], $gd['name']); ?>

      <?php
      }else{echo '';} ?>
      <?php   }  ?>
    </p>
    <p>Trạng thái: <?php if($post->status == '1') {echo 'Hoạt động';}else{echo 'Khóa';}?></p>
  </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('back.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>