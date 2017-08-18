@extends('back.template')
@section('main')

  @include('back.partials.entete', ['title' => 'Nhóm thuốc' . link_to_route('groupdrug.create', 'Thêm mới', [], ['class' => 'btn btn-info pull-right']), 'icone' => 'pencil', 'fil' => 'Nhóm thuốc'])

	@if(session()->has('ok'))
    @include('partials/error', ['type' => 'success', 'message' => session('ok')])
	@endif

  <div class="row col-lg-12">
    <div class="search-bar pull-left" style="margin-left: -15px">
      <!--search bar-->
      {!! Form::open(array(
          'method' =>'GET',
          'url' => 'groupdrug/search',
          'class'=>'form navbar-form navbar-right searchform'
          )
      ) !!}

      <!-- required="required" -->
      <input  value="<?php if(isset($_GET['search'])) {echo $_GET['search'];} else {echo '';}?>" class="form-control" placeholder="Tìm kiếm..." name="search" type="text">
    {!! Form::submit('Tìm kiếm') !!}
      <a href="{!! route('groupdrug.index') !!}" class="btn btn-default">Hủy</a>
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
              Mã nhóm thuốc
              <a href="#" name="group_drugs.code" class="order">
                <span class="fa fa-fw fa-{{ $order->name == 'group_drugs.code' ? $order->sens : 'unsorted'}}"></span>
              </a>
            </th>
            <th>
              Tên viết tắt
              <a href="#" name="group_drugs.short_name" class="order">
                <span class="fa fa-fw fa-{{ $order->name == 'group_drugs.short_name' ? $order->sens : 'unsorted'}}"></span>
              </a>
            </th>
            <th>
              Tên đầy đủ
              <a href="#" name="group_drugs.full_name" class="order">
                <span class="fa fa-fw fa-{{ $order->name == 'group_drugs.full_name' ? $order->sens : 'unsorted'}}"></span>
              </a>
            </th>
            <th>Số lượng thuốc</th>
            <th>
              Trạng thái
              <a href="#" name="group_drugs.status" class="order">
                <span class="fa fa-fw fa-{{ $order->name == 'group_drugs.status' ? $order->sens : 'unsorted'}}"></span>
              </a>
            </th>
            <th></th>
            
          </tr>
        </thead>
        <tbody>
          @include('back.groupdrug.table')
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
@section('scripts')

  <script>

    $(function() {

      // Active gestion
      $(document).on('change', ':checkbox[name="status"]', function() {
        $(this).parents('tr').toggleClass('warning');
        $(this).hide().parent().append('<i class="fa fa-refresh fa-spin"></i>');
        var token = $('input[name="_token"]').val();
        $.ajax({
          url: '{{ url('postActgroupdrug') }}' + '/' + this.value,
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
          url: '{{ url('groupdrug/order') }}',
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

@stop
