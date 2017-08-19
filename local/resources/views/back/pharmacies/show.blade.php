@extends('back.template')
@section('main')

  @include('back.partials.entete', ['icone' => 'pencil', 'fil' => 'Khách hàng', 'title' => 'Khách hàng '."$post->name". link_to_route('pharmacies.index', 'Quay lại', [], ['class' => 'btn btn-info pull-right'])])

  <div class="row col-lg-12 customer-info-up">
    <p><b>Mã Khách hàng: </b><b>{{ $post->code }}</b></p>
    <p><b>Tên Khách hàng: </b><b>{{ $post->name }}</b></p>
    <p><b>Số điện thoại: </b><b>{{ $post->phone }}</b></p>
    <p><b>Email: </b>{{ $post->email }}</p>
    <p><b>Địa chỉ: </b>{{ $post->address }}</p>
    <p><b>Tỉnh thành: </b>{{ $post->province }}</p>
    <p><b>Quận huyện: </b>{{ $post->district }}</p>
    <p><b>Số ĐKKD: </b>{{ $post->license }}</p>
    <p><b>Loại khách hàng: </b>{{ $post->pharmacieType }}</p>
    <p><b>Chủ nhà thuốc: </b>{{ $post->owner }}</p>
    <p><b>Trạng thái: </b><?php if($post->status == '1') {echo 'Hoạt động';}else{echo 'Khóa';}?></p>
  </div>

@stop

@section('scripts')
@stop
