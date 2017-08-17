<?php $__env->startSection('main'); ?>

  <?php echo $__env->make('back.partials.entete', ['icone' => 'pencil', 'fil' => 'Thuốc', 'title' => 'Thuốc'. link_to_route('drug.index', 'Quay lại', [], ['class' => 'btn btn-info pull-right'])], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

  <div class="row col-lg-12">
    <div class="col-md-6">
      <p>Mã thuốc: <?php echo e($post->code); ?></p>
      <p>Tên thuốc: <?php echo e($post->name); ?></p>
      <p>Nhóm thuốc:
        <?php foreach($groupdrug as $gd) { ?>
        <?php if(isset($post->group_drug_id) && $post->group_drug_id == $gd['id']){ ?>
        <?php echo link_to('groupdrug/' . $gd['id'], $gd['full_name']); ?>

        <?php
          }else{echo '';} ?>
        <?php   }  ?>
      </p>
      <p>Hoạt chất chính: <?php echo e($post->activeIngredient); ?></p>
      <p>Hàm lượng: <?php echo e($post->content); ?></p>
      <p>Dạng bào chế: <?php echo e($post->design); ?></p>
      <p>Quy cách đóng gói: <?php echo e($post->package); ?></p>
      <p>Đơn vị buôn: <?php echo e($post->donvibuon); ?></p>
      <p>Đơn vị lẻ: <?php echo e($post->donvile); ?></p>
      <p>Hệ số quy đổi: <?php echo e($post->hesoquydoi); ?></p>
    </div>

    <div class="col-md-6">
      <p>Số đăng ký: <?php echo e($post->registerNumber); ?></p>
      <p>Công ty sản xuất: <?php echo e($post->produceCompany); ?></p>
      <p>Nước sản xuất: <?php echo e($post->produceCountry); ?></p>
      <p>Công ty đăng ký: <?php echo e($post->registerCompany); ?></p>
      <p>Nước đăng ký: <?php echo e($post->registerCountry); ?></p>
      <p>Ghi chú: <?php echo e($post->note); ?></p>
      <p>Ảnh thuốc:
        <?php $stt=0; ?>
        <div class="row">
        <?php foreach($post->drug_img as $row): ?>
        <?php $stt++; ?>
        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
          Ảnh cũ: <?php echo $stt; ?><br><img src="<?php echo url(\Config::get('constants.pathDrugImg').$row->url); ?>" height="65">
        </div>
        <?php endforeach; ?>
        </div>
      </p>
      <p>Trạng thái: <?php if($post->status == '1') {echo 'Hoạt động';}else{echo 'Khóa';}?></p>
    </div>
  </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('back.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>