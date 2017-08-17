@extends('back.template')
@section('main')

  @include('back.partials.entete', ['icone' => 'pencil', 'fil' => 'Người dùng', 'title' => 'Người dùng'. link_to_route('discount.index', 'Quay lại', [], ['class' => 'btn btn-info pull-right'])])

  <div class="row col-lg-12">
    <p>Tên mức khuyến mãi: {{ $post->name }}</p>
    <p>Mức khuyến mãi: Mức {{ $post->level }}</p>
    <p>Khuyến mãi từ : {{ $post->from }}(triệu vnđ)</p>
    <p>Khuyến mãi đến : {{ $post->to }}(triệu vnđ)</p>
    <p>Giá trị KM : {{ $post->percent }}%</p>
  </div>

@stop

@section('scripts')
@stop
