@extends('back.template')
@section('main')

  @include('back.partials.entete', ['title' => 'Danh sách thuốc' . link_to_route('drug.create', 'Thêm mới', [], ['class' => 'btn btn-info pull-right']), 'icone' => 'pencil', 'fil' => 'Danh sách thuốc'])

	@if(session()->has('ok'))
    @include('partials/error', ['type' => 'success', 'message' => session('ok')])
	@endif

  <div class="row col-lg-12">
    <div class="search-bar pull-left" style="margin-left: -15px">
      <!--search bar-->
      {!! Form::open(array(
          'method' =>'GET',
          'url' => 'drug/search',
          'class'=>'form navbar-form navbar-right searchform'
          )
      ) !!}

      <!-- required="required" -->
      <input  value="<?php if(isset($_GET['search'])) {echo $_GET['search'];} else {echo '';}?>" class="form-control" placeholder="Tìm theo Tên thuốc, Hoạt chất, CTy Sx,..." name="search" type="text">
      <input class="btn btn-default" type="submit" value="Tìm kiếm">
      <a href="{!! route('drug.index') !!}" class="btn btn-default">Hủy</a><br/>

        <div class="fox-filter">
            <select class="form-control" name="s_group">
                <option value="">Nhóm thuốc</option>
                <?php foreach($groupdrug as $gd) { ?>
                <option <?php if(isset($_GET['s_group']) && $_GET['s_group'] == $gd['id']){echo 'selected';}else{echo '';} ?> value="<?php echo $gd['id']?>"><?php echo $gd['short_name']?></option>
                <?php   }  ?>
            </select>

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
              Mã thuốc
              <a href="#" name="drugs.code" class="order">
                <span class="fa fa-fw fa-{{ $order->name == 'drugs.code' ? $order->sens : 'unsorted'}}"></span>
              </a>
            </th>
            <th>
              Tên thuốc
              <a href="#" name="drugs.name" class="order">
                <span class="fa fa-fw fa-{{ $order->name == 'drugs.name' ? $order->sens : 'unsorted'}}"></span>
              </a>
            </th>
            <th>
              Hoạt chất chính
              <a href="#" name="drugs.activeIngredient" class="order">
                <span class="fa fa-fw fa-{{ $order->name == 'drugs.activeIngredient' ? $order->sens : 'unsorted'}}"></span>
              </a>
            </th>
            <th>
              Nhóm thuốc
              <a href="#" name="drugs.group_drug_id" class="order">
                <span class="fa fa-fw fa-{{ $order->name == 'drugs.group_drug_id' ? $order->sens : 'unsorted'}}"></span>
              </a>
            </th>
            <th>
              Hàm lượng
              <a href="#" name="drugs.content" class="order">
                <span class="fa fa-fw fa-{{ $order->name == 'drugs.content' ? $order->sens : 'unsorted'}}"></span>
              </a>
            </th>
            <th>
              QC đóng gói
              <a href="#" name="drugs.package" class="order">
                <span class="fa fa-fw fa-{{ $order->name == 'drugs.package' ? $order->sens : 'unsorted'}}"></span>
              </a>
            </th>
            <th>
              Công ty SX
              <a href="#" name="drugs.produceCompany" class="order">
                <span class="fa fa-fw fa-{{ $order->name == 'drugs.produceCompany' ? $order->sens : 'unsorted'}}"></span>
              </a>
            </th>
            <th>
              Trạng thái
              <a href="#" name="drugs.status" class="order">
                <span class="fa fa-fw fa-{{ $order->name == 'drugs.status' ? $order->sens : 'unsorted'}}"></span>
              </a>
            </th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @include('back.drug.table')
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
<?php if(isset($_GET['s_group'])) {$sGroup =  $_GET['s_group'];} else {$sGroup = '';}?>
<?php if(isset($_GET['s_status'])) {$sStatus =  $_GET['s_status'];} else {$sStatus = '';}?>

@section('scripts')

  <script>

    $(function() {

      // Active gestion
      $(document).on('change', ':checkbox[name="status"]', function() {
        $(this).parents('tr').toggleClass('warning');
        $(this).hide().parent().append('<i class="fa fa-refresh fa-spin"></i>');
        var token = $('input[name="_token"]').val();
        $.ajax({
          url: '{{ url('postActdrug') }}' + '/' + this.value,
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
        var sGroup = '<?php echo $sGroup; ?>';
        var sStatus = '<?php echo $sStatus; ?>';

        // Send ajax
        $.ajax({
          url: '{{ url('drug/order') }}',
          type: 'GET',
          dataType: 'json',
          data: "name=" + name + "&sens=" + tri + "&search=" + search + "&s_group=" + sGroup + "&s_status=" + sStatus
        })
        .done(function(data) {
          $('tbody').html(data.view);
          $('.link').html(data.links.replace('drugs.(.+)&sens', name));
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
