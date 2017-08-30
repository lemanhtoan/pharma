@extends('back.template')
@section('main')

  @include('back.partials.entete', ['icone' => 'pencil', 'fil' => 'Người dùng', 'title' => 'Người dùng '."$post->name". link_to_route('customer.index', 'Quay lại', [], ['class' => 'btn btn-info pull-right'])])

  <div class="row col-lg-12 customer-info">
    <p>
      {!! link_to_route('customer.edit', 'Sửa', [$post->id], ['class' => 'edit-link']) !!}
    </p>
    <p><b>Tên người dùng: </b> <b>{{ $post->name }}</b></p>
    <p><b>Số điện thoại: </b><b>{{ $post->phone }}</b></p>
    <p><b>Email: </b>{{ $post->email }}</p>
    <p><b>Nhà thuốc: </b>
      <?php foreach($pharmacies as $gd) { ?>
      <?php if(isset($post->pharmacieId) && $post->pharmacieId == $gd['id']){ ?>
      {!! link_to('pharmacies/' . $gd['id'], $gd['name']) !!}
      <?php
      }else{echo '';} ?>
      <?php   }  ?>
    </p>
    <p><b>Trạng thái: </b><?php if($post->status == '1') {echo 'Hoạt động';}else{echo 'Khóa';}?></p>
  </div>

@stop

@section('scripts')
@stop
