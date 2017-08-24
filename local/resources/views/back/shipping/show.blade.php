@extends('back.template')
@section('main')

  @include('back.partials.entete', ['icone' => 'pencil', 'fil' => 'Nhà vận chuyển', 'title' => 'Nhà vận chuyển'. link_to_route('shipping.index', 'Quay lại', [], ['class' => 'btn btn-info pull-right'])])

  <div class="row col-lg-12 ">
    <p><b>Tên nhà vận chuyển: </b>{{ $post->name }}</p>
    <p><b>Ghi chú: </b>{{ $post->note }}</p>
  </div>

@stop

@section('scripts')
@stop
