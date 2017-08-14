@extends('back.template')
@section('main')

  @include('back.partials.entete', ['icone' => 'pencil', 'fil' => 'Người dùng', 'title' => 'Người dùng'. link_to_route('customer.index', 'Quay lại', [], ['class' => 'btn btn-info pull-right'])])

  <div class="row col-lg-12">
    <p>Tên người dùng: {{ $post->name }}</p>
    <p>Số điện thoại: {{ $post->phone }}</p>
    <p>Email: {{ $post->email }}</p>
    <p>Nhà thuốc:
      <?php foreach($pharmacies as $gd) { ?>
      <?php if(isset($post->pharmacieId) && $post->pharmacieId == $gd['id']){ ?>
      {!! link_to('pharmacies/' . $gd['id'], $gd['name']) !!}
      <?php
      }else{echo '';} ?>
      <?php   }  ?>
    </p>
    <p>Trạng thái: <?php if($post->status == '1') {echo 'Hoạt động';}else{echo 'Khóa';}?></p>
  </div>

@stop

@section('scripts')
@stop
