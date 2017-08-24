@extends('back.template')
@section('main')

  @include('back.partials.entete', ['title' => 'Nhà vận chuyển' . link_to_route('shipping.create', 'Thêm mới', [], ['class' => 'btn btn-info pull-right']), 'icone' => 'pencil', 'fil' => 'Nhà vận chuyển'])

	@if(session()->has('ok'))
    @include('partials/error', ['type' => 'success', 'message' => session('ok')])
	@endif

  <div class="row col-lg-12">

    <?php if(count($posts)):?>
    <div class="table-responsive">
      <table class="table">
        <thead>
          <tr>
            <th>
              Tên nhà vận chuyển
            </th>
            <th>
              Ghi chú
            </th>
            <th></th>
            
          </tr>
        </thead>
        <tbody>
          @include('back.shipping.table')
        </tbody>
      </table>
    </div>
  </div>

  <div class="row col-lg-12">
    <div class="pull-right link">{!! $links !!}</div>
  </div>

  <?php else:    ?>
  <h4>Danh sách rỗng</h4>
  <?php endif;?>

@stop
