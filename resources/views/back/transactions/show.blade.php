@extends('back.template')
@section('main')

  @include('back.partials.entete', ['icone' => 'pencil', 'fil' => 'Khách hàng', 'title' => 'Khách hàng'. link_to_route('transactions.index', 'Quay lại', [], ['class' => 'btn btn-info pull-right'])])

  <div class="row col-lg-12">
    <p>Mã Khách hàng: {{ $post->code }}</p>
    <p>Tên Khách hàng: {{ $post->name }}</p>
    <p>Số điện thoại: {{ $post->phone }}</p>
    <p>Email: {{ $post->email }}</p>
    <p>Địa chỉ: {{ $post->address }}</p>
    <p>Tỉnh thành: {{ $post->province }}</p>
    <p>Quận huyện: {{ $post->district }}</p>
    <p>Số ĐKKD: {{ $post->license }}</p>
    <p>Loại khách hàng: {{ $post->pharmacieType }}</p>
    <p>Chủ nhà thuốc: {{ $post->owner }}</p>
    <p>Trạng thái: <?php if($post->status == '1') {echo 'Hoạt động';}else{echo 'Khóa';}?></p>
  </div>

@stop

@section('scripts')
@stop
