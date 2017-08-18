@extends('back.template')
@section('main')

  @include('back.partials.entete', ['title' => 'Khuyến mãi' . link_to_route('discount.create', 'Thêm mới', [], ['class' => 'btn btn-info pull-right']), 'icone' => 'pencil', 'fil' => 'Người dùng'])

	@if(session()->has('ok'))
    @include('partials/error', ['type' => 'success', 'message' => session('ok')])
	@endif

  <div class="row col-lg-12">

    <?php if(count($posts)): ?>
    <div class="table-responsive">
      <table class="table">
        <thead>
          <tr>
            <th>
              Tên mức KM
              <a href="#" name="config_discount.name" class="order">
                <span class="fa fa-fw fa-{{ $order->name == 'config_discount.name' ? $order->sens : 'unsorted'}}"></span>
              </a>
            </th>
            <th>
              Mức khuyến mãi
              <a href="#" name="config_discount.level" class="order">
                <span class="fa fa-fw fa-{{ $order->name == 'config_discount.level' ? $order->sens : 'unsorted'}}"></span>
              </a>
            </th>
            <th>
              KM Từ
              <a href="#" name="config_discount.from" class="order">
                <span class="fa fa-fw fa-{{ $order->name == 'config_discount.fron' ? $order->sens : 'unsorted'}}"></span>
              </a>
            </th>
            <th>
              KM Đến
              <a href="#" name="config_discount.to" class="order">
                <span class="fa fa-fw fa-{{ $order->name == 'config_discount.to' ? $order->sens : 'unsorted'}}"></span>
              </a>
            </th>
            <th>
              Giá trị %
              <a href="#" name="config_discount.percent" class="order">
                <span class="fa fa-fw fa-{{ $order->name == 'config_discount.percent' ? $order->sens : 'unsorted'}}"></span>
              </a>
            </th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @include('back.discount.table')
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
@section('scripts')

  <script>

    $(function() {

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

        // Send ajax
        $.ajax({
          url: '{{ url('discount/order') }}',
          type: 'GET',
          dataType: 'json',
          data: "name=" + name + "&sens=" + tri
        })
        .done(function(data) {
          $('tbody').html(data.view);
          $('.link').html(data.links.replace('config_discount.(.+)&sens', name));
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
