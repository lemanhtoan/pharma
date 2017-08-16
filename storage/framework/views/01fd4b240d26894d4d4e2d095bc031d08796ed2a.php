<?php $__env->startSection('main'); ?>

  <?php echo $__env->make('back.partials.entete', ['title' => 'Nhóm thuốc' . link_to_route('groupdrug.create', 'Thêm mới', [], ['class' => 'btn btn-info pull-right']), 'icone' => 'pencil', 'fil' => 'Nhóm thuốc'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

	<?php if(session()->has('ok')): ?>
    <?php echo $__env->make('partials/error', ['type' => 'success', 'message' => session('ok')], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php endif; ?>

  <div class="row col-lg-12">
    <div class="search-bar pull-left" style="margin-left: -15px">
      <!--search bar-->
      <?php echo Form::open(array(
          'method' =>'GET',
          'url' => 'groupdrug/search',
          'class'=>'form navbar-form navbar-right searchform'
          )
      ); ?>


      <!-- required="required" -->
      <input  value="<?php if(isset($_GET['search'])) {echo $_GET['search'];} else {echo '';}?>" class="form-control" placeholder="Tìm kiếm..." name="search" type="text">
    <?php echo Form::submit('Tìm kiếm'); ?>

      <a href="<?php echo route('groupdrug.index'); ?>" class="btn btn-default">Hủy</a>
    <?php echo Form::close(); ?>

    <!--end search bar-->
    </div>
  </div>

  <div class="row col-lg-12">

    <?php if(count($posts)): ?>
    <div class="table-responsive">
      <table class="table">
        <thead>
          <tr>
            <th>
              Mã nhóm thuốc
              <a href="#" name="group_drugs.code" class="order">
                <span class="fa fa-fw fa-<?php echo e($order->name == 'group_drugs.code' ? $order->sens : 'unsorted'); ?>"></span>
              </a>
            </th>
            <th>
              Tên viết tắt
              <a href="#" name="group_drugs.short_name" class="order">
                <span class="fa fa-fw fa-<?php echo e($order->name == 'group_drugs.short_name' ? $order->sens : 'unsorted'); ?>"></span>
              </a>
            </th>
            <th>
              Tên đầy đủ
              <a href="#" name="group_drugs.full_name" class="order">
                <span class="fa fa-fw fa-<?php echo e($order->name == 'group_drugs.full_name' ? $order->sens : 'unsorted'); ?>"></span>
              </a>
            </th>
            <th>
              Trạng thái
              <a href="#" name="group_drugs.status" class="order">
                <span class="fa fa-fw fa-<?php echo e($order->name == 'group_drugs.status' ? $order->sens : 'unsorted'); ?>"></span>
              </a>
            </th>
          </tr>
        </thead>
        <tbody>
          <?php echo $__env->make('back.groupdrug.table', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </tbody>
      </table>
    </div>
  </div>

  <div class="row col-lg-12">
    <div class="pull-right link"><?php echo $links; ?></div>
  </div>

  <?php else: ?>
  <h4>Danh sách rỗng</h4>
  <?php endif;?>

<?php $__env->stopSection(); ?>
<?php if(isset($_GET['search'])) {$search =  $_GET['search'];} else {$search = '';}?>
<?php $__env->startSection('scripts'); ?>

  <script>

    $(function() {

      // Active gestion
      $(document).on('change', ':checkbox[name="status"]', function() {
        $(this).parents('tr').toggleClass('warning');
        $(this).hide().parent().append('<i class="fa fa-refresh fa-spin"></i>');
        var token = $('input[name="_token"]').val();
        $.ajax({
          url: '<?php echo e(url('postActgroupdrug')); ?>' + '/' + this.value,
          type: 'PUT',
          data: "status=" + this.checked + "&_token=" + token
        })
        .done(function() {
          $('.fa-spin').remove();
          $('input:checkbox[name="status"]:hidden').show();
        })
        .fail(function() {
          $('.fa-spin').remove();
          chk = $('input:checkbox[name="status"]:hidden');
          chk.show().prop('checked', chk.is(':checked') ? null:'checked').parents('tr').toggleClass('warning');
          alert('Lỗi thay đổi trạng thái');
        });
      });

      // Sorting gestion
      $('a.order').click(function(e) {
        e.preventDefault();
        // Sorting direction
        var sens;
        if($('span', this).hasClass('fa-unsorted')) sens = 'aucun';
        else if ($('span', this).hasClass('fa-sort-desc')) sens = 'desc';
        else if ($('span', this).hasClass('fa-sort-asc')) sens = 'asc';
        // Set to zero
        $('a.order span').removeClass().addClass('fa fa-fw fa-unsorted');
        // Adjust selected
        $('span', this).removeClass();
        var tri;
        if(sens == 'aucun' || sens == 'asc') {
          $('span', this).addClass('fa fa-fw fa-sort-desc');
          tri = 'desc';
        } else if(sens == 'desc') {
          $('span', this).addClass('fa fa-fw fa-sort-asc');
          tri = 'asc';
        }
        var name = $(this).attr('name');
        // Wait icon
        $('.breadcrumb li').append('<span id="tempo" class="fa fa-refresh fa-spin"></span>');
        var search = '<?php echo $search; ?>';
        // Send ajax
        $.ajax({
          url: '<?php echo e(url('groupdrug/order')); ?>',
          type: 'GET',
          dataType: 'json',
          data: "name=" + name + "&sens=" + tri + "&search=" + search
        })
        .done(function(data) {
          $('tbody').html(data.view);
          $('.link').html(data.links.replace('group_drugs.(.+)&sens', name));
          $('#tempo').remove();
        })
        .fail(function() {
          $('#tempo').remove();
          alert('Lỗi sắp xếp');
        });
      })

    });

  </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('back.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>