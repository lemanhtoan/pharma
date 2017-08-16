<?php $__env->startSection('main'); ?>

  <?php echo $__env->make('back.partials.entete', ['icone' => 'pencil', 'fil' => 'Giao dịch', 'title' => 'Giao dịch'. link_to_route('mind.index', 'Quay lại', [], ['class' => 'btn btn-info pull-right']) ], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

  <div class="row col-lg-12">
    <p>
      <?php echo link_to_route('mind.edit', 'Sửa', [$post->id], ['class' => 'edit-link']); ?>

    </p>
    <p>Mã phiên giao dịch: <?php echo e($post->code); ?></p>
    <p>Tên phiên giao dịch: <?php echo e($post->name); ?></p>
    <p>Bắt đầu: <?php echo e($post->start_time); ?></p>
    <p>Kết thúc: <?php echo e($post->end_time); ?></p>
    <p>KM tối đa nhóm KH 1: <?php echo e($post->discount_cg1); ?></p>
    <p>KM tối đa nhóm KH 2: <?php echo e($post->discount_cg2); ?></p>
    <p>Ghi chú: <?php echo e($post->note); ?></p>
    <p>Trạng thái: <?php if($post->status == '1') {echo 'Hoạt động';}else{echo 'Khóa';}?></p>
    <div>
      <h4>Danh sách thuốc trong phiên</h4>
      <?php if (count($post->mind_drugs)) { ?>
      <?php $stt=0; ?>
      <div class="row">
        <div class="col-md-12">
          <table class="table table-striped table-bordered">
            <tr>
              <th>#</th>
              <th>Tên thuốc</th>
              <th>Giá gốc</th>
              <th>Giá KM</th>
              <th>Giới hạn KM</th>
              <th>Giới hạn Đặt hàng</th>
              <th>Ghi chú</th>
            </tr>
            <?php foreach($post->mind_drugs as $row): ?>
                <?php $stt++; ?>
                <tr>
                  <td><?php echo $stt; ?></td>
                  <td>
                      <?php foreach($drugs as $gd) { ?>
                      <?php if(isset($row->drug_id) && $row->drug_id == $gd['id']){ ?>
                      <?php echo link_to('drug/' . $gd['id'], $gd['name']); ?>

                      <?php
                      }else{echo '';} ?>
                      <?php   }  ?>
                  </td>
                  <td><?php echo $row->drug_price; ?></td>
                  <td><?php echo $row->drug_special_price; ?></td>
                  <td><?php echo $row->max_discount_qty; ?></td>
                  <td><?php echo $row->max_qty; ?></td>
                  <td><?php echo $row->note; ?></td>
                </tr>
              </p>
            <?php endforeach; ?>
          </table>
        </div>
      </div>
      <?php } else { ?>
      <p>Danh sách rỗng</p>
      <?php }?>
    </div>
  </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('back.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>