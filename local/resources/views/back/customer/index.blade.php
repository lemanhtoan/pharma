@extends('back.template')
@section('main')

  @include('back.partials.entete', ['title' => 'Người dùng' . link_to_route('customer.create', 'Thêm mới', [], ['class' => 'btn btn-info pull-right']), 'icone' => 'pencil', 'fil' => 'Người dùng'])

	@if(session()->has('ok'))
    @include('partials/error', ['type' => 'success', 'message' => session('ok')])
	@endif

  <div class="row col-lg-12">
    <div class="search-bar pull-left" style="margin-left: -15px">
      <!--search bar-->
      {!! Form::open(array(
          'method' =>'GET',
          'url' => 'customer/search',
          'class'=>'form navbar-form navbar-right searchform'
          )
      ) !!}

      <!-- required="required" -->
      <input  value="<?php if(isset($_GET['search'])) {echo $_GET['search'];} else {echo '';}?>" class="form-control" placeholder="Tìm kiếm..." name="search" type="text">
    {!! Form::submit('Tìm kiếm') !!}
      <a href="{!! route('customer.index') !!}" class="btn btn-default">Hủy</a>

      <div class="fox-filter">

        <select class="form-control" name="s_status">
          <option value="">Trạng thái</option>
          <option <?php if(isset($_GET['s_status']) && $_GET['s_status'] == '1'){echo 'selected';}else{echo '';} ?> value="1">Hoạt động</option>
          <option <?php if(isset($_GET['s_status']) && $_GET['s_status'] == '0'){echo 'selected';}else{echo '';} ?> value="0">Khóa</option>
        </select>

      </div>


    {!! Form::close() !!}
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
              ID người dùng
              <a href="#" name="customers.code" class="order">
                <span class="fa fa-fw fa-{{ $order->name == 'customers.code' ? $order->sens : 'unsorted'}}"></span>
              </a>
            </th>
            <th>
              Tên người dùng
              <a href="#" name="customers.name" class="order">
                <span class="fa fa-fw fa-{{ $order->name == 'customers.name' ? $order->sens : 'unsorted'}}"></span>
              </a>
            </th>
            <th>
              SĐT
            </th>
            <th>
              Nhà thuốc
              <a href="#" name="customers.pharmacieId" class="order">
                <span class="fa fa-fw fa-{{ $order->name == 'customers.pharmacieId' ? $order->sens : 'unsorted'}}"></span>
              </a>
            </th>
            <th>
              Lần đăng nhập gần nhất
            </th>
            <th>
              Trạng thái
              <a href="#" name="customers.status" class="order">
                <span class="fa fa-fw fa-{{ $order->name == 'customers.status' ? $order->sens : 'unsorted'}}"></span>
              </a>
            </th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @include('back.customer.table')
        </tbody>
      </table>
    </div>
  </div>

  <div class="row col-lg-12">
    <div class="pull-right link">{!! $links !!}</div>
  </div>

  <?php else: ?>
  <h4>Danh sách rỗng</h4>
  <?php endif;?>

@stop
<?php if(isset($_GET['search'])) {$search =  $_GET['search'];} else {$search = '';}?>
<?php if(isset($_GET['s_status'])) {$sStatus =  $_GET['s_status'];} else {$sStatus = '';}?>
@section('scripts')

  <script>

    $(function() {

      // Active gestion
      $(document).on('change', ':checkbox[name="status"]', function() {
        $(this).parents('tr').toggleClass('warning');
        // $(this).hide().parent().append('<i class="fa fa-refresh fa-spin"></i>');
        var token = $('input[name="_token"]').val();
        $.ajax({
          url: '{{ url('postActcustomer') }}' + '/' + this.value,
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
        var sStatus = '<?php echo $sStatus; ?>';
        // Send ajax
        $.ajax({
          url: '{{ url('customer/order') }}',
          type: 'GET',
          dataType: 'json',
          data: "name=" + name + "&sens=" + tri + "&search=" + search + "&s_status=" + sStatus
        })
        .done(function(data) {
          $('tbody').html(data.view);
          $('.link').html(data.links.replace('customers.(.+)&sens', name));
          $('#tempo').remove();
        })
        .fail(function() {
          $('#tempo').remove();
          alert('Lỗi sắp xếp');
        });
      })

    });

  </script>

@stop
