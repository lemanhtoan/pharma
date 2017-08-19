<?php $__env->startSection('main'); ?>

  <?php echo $__env->make('back.partials.entete', ['title' => 'Khách hàng' . link_to_route('pharmacies.create', 'Thêm mới', [], ['class' => 'btn btn-info pull-right']), 'icone' => 'pencil', 'fil' => 'Khách hàng'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

	<?php if(session()->has('ok')): ?>
    <?php echo $__env->make('partials/error', ['type' => 'success', 'message' => session('ok')], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php endif; ?>

  <div class="row col-lg-12">
    <div class="search-bar pull-left" style="margin-left: -15px">
      <!--search bar-->
      <?php echo Form::open(array(
          'method' =>'GET',
          'url' => 'pharmacies/search',
          'class'=>'form navbar-form navbar-right searchform'
          )
      ); ?>

      <input  value="<?php if(isset($_GET['search'])) {echo $_GET['search'];} else {echo '';}?>" class="form-control" placeholder="Tìm kiếm theo tên NT, tên chủ, SĐT, địa chỉ,..." name="search" type="text">
    <?php echo Form::submit('Tìm kiếm'); ?>

      <a href="<?php echo route('pharmacies.index'); ?>" class="btn btn-default">Hủy</a>

      <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
      <div class="fox-filter">
        <select class="form-control" name="s_pharmacieType">
          <option value="">Nhóm khách hàng</option>
            <?php foreach($pharmacieType as $gd) { ?>
          <option <?php if(isset($_GET['s_pharmacieType']) && $_GET['s_pharmacieType'] == $gd){echo 'selected';}else{echo '';} ?> value="<?php echo $gd?>"><?php echo $gd?></option>
            <?php   }  ?>
        </select>

        <select class="form-control" name="s_status">
          <option value="">Trạng thái</option>
          <option <?php if(isset($_GET['s_status']) && $_GET['s_status'] == '1'){echo 'selected';}else{echo '';} ?> value="1">Hoạt động</option>
          <option <?php if(isset($_GET['s_status']) && $_GET['s_status'] == '0'){echo 'selected';}else{echo '';} ?> value="0">Khóa</option>
        </select>

        <select class="form-control" name="s_province" id="s_province">
          <option value="">Tỉnh /TP</option>
            <?php foreach($province as $gd) { ?>
            <option <?php if(isset($_GET['s_province']) && $_GET['s_province'] == $gd['name']){echo 'selected';}else{echo '';} ?> dataget="<?php echo $gd['id']?>"  value="<?php echo $gd['name']?>"><?php echo $gd['name']?></option>
            <?php   }  ?>
        </select>

        <select class="form-control" name="s_district" id="s_district">
          <option value="">Quận/Huyện</option>
            <?php foreach($district as $gd) { ?>
            <option <?php if(isset($_GET['s_district']) && $_GET['s_district'] == $gd['name']){echo 'selected';}else{echo '';} ?> value="<?php echo $gd['name']?>"><?php echo $gd['name']?></option>
            <?php   }  ?>
        </select>


      </div>


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
              Mã Khách hàng
              <a href="#" name="pharmacies.code" class="order">
                <span class="fa fa-fw fa-<?php echo e($order->name == 'pharmacies.code' ? $order->sens : 'unsorted'); ?>"></span>
              </a>
            </th>
            <th>
              Tên Khách hàng
              <a href="#" name="pharmacies.name" class="order">
                <span class="fa fa-fw fa-<?php echo e($order->name == 'pharmacies.name' ? $order->sens : 'unsorted'); ?>"></span>
              </a>
            </th>

            <th>
              Nhóm Khách hàng
              <a href="#" name="pharmacies.pharmacieType" class="order">
                <span class="fa fa-fw fa-<?php echo e($order->name == 'pharmacies.pharmacieType' ? $order->sens : 'unsorted'); ?>"></span>
              </a>
            </th>

            <th>
              Địa chỉ
              <a href="#" name="pharmacies.address" class="order">
                <span class="fa fa-fw fa-<?php echo e($order->name == 'pharmacies.address' ? $order->sens : 'unsorted'); ?>"></span>
              </a>
            </th>

            <th>
              Quận/Huyện
              <a href="#" name="pharmacies.district" class="order">
                <span class="fa fa-fw fa-<?php echo e($order->name == 'pharmacies.district' ? $order->sens : 'unsorted'); ?>"></span>
              </a>
            </th>

            <th>
              Tỉnh/TP
              <a href="#" name="pharmacies.province" class="order">
                <span class="fa fa-fw fa-<?php echo e($order->name == 'pharmacies.province' ? $order->sens : 'unsorted'); ?>"></span>
              </a>
            </th>
            <th>
              Số điện thoại
              <a href="#" name="pharmacies.phone" class="order">
                <span class="fa fa-fw fa-<?php echo e($order->name == 'pharmacies.phone' ? $order->sens : 'unsorted'); ?>"></span>
              </a>
            </th>
            <th>
              Trạng thái
              <a href="#" name="pharmacies.status" class="order">
                <span class="fa fa-fw fa-<?php echo e($order->name == 'pharmacies.status' ? $order->sens : 'unsorted'); ?>"></span>
              </a>
            </th>
          </tr>
        </thead>
        <tbody>
          <?php echo $__env->make('back.pharmacies.table', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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
<?php if(isset($_GET['s_pharmacieType'])) {$spharmacieType =  $_GET['s_pharmacieType'];} else {$spharmacieType = '';}?>
<?php if(isset($_GET['s_status'])) {$sStatus =  $_GET['s_status'];} else {$sStatus = '';}?>
<?php if(isset($_GET['s_province'])) {$sProvince =  $_GET['s_province'];} else {$sProvince = '';}?>
<?php if(isset($_GET['s_district'])) {$sDistrict =  $_GET['s_district'];} else {$sDistrict = '';}?>
<?php $__env->startSection('scripts'); ?>

  <script>

    $(function() {

        // change province load district
        $(document).on('change', '#s_province', function () {
            var token = $('input[name="_token"]').val();
            var provinceSelect = $('option:selected', this).attr('dataget');
            $.ajax({
                url: '<?php echo e(url('postChangeProvince')); ?>',
                type: 'POST',
                data: "province=" + provinceSelect + "&_token=" + token
            })
            .done(function (response) {
                // remove old data
                $('#s_district').find('option')
                    .remove()
                    .end();
                $('#s_district')
                    .append($("<option value=''> Quận/Huyện </option>"));
                // each and append new list
                jQuery.each(response, function(index, obj) {
                    $('#s_district')
                        .append($("<option></option>")
                            .attr("value",obj.name)
                            .text(obj.name));
                });
            })
            .fail(function () {
                console.log('Lỗi - lấy dữ liệu districts');
            });
        });

      // Active gestion
      $(document).on('change', ':checkbox[name="status"]', function() {
        $(this).parents('tr').toggleClass('warning');
        // $(this).hide().parent().append('<i class="fa fa-refresh fa-spin"></i>');
        var token = $('input[name="_token"]').val();
        $.ajax({
          url: '<?php echo e(url('postActpharmacies')); ?>' + '/' + this.value,
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
        var spharmacieType = '<?php echo $spharmacieType; ?>';
        var sStatus = '<?php echo $sStatus; ?>';
        var sProvince = '<?php echo $sProvince; ?>';
        var sDistrict = '<?php echo $sDistrict; ?>';

        // Send ajax
        $.ajax({
          url: '<?php echo e(url('pharmacies/order')); ?>',
          type: 'GET',
          dataType: 'json',
          data: "name=" + name + "&sens=" + tri + "&search=" + search + "&s_pharmacieType=" + spharmacieType + "&s_status=" + sStatus + "&s_province=" + sProvince + "&s_district=" + sDistrict
        })
        .done(function(data) {
          $('tbody').html(data.view);
          $('.link').html(data.links.replace('pharmacies.(.+)&sens', name));
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