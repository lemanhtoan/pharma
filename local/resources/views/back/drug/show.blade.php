@extends('back.template')
@section('main')

  @include('back.partials.entete', ['icone' => 'pencil', 'fil' => 'Thuốc', 'title' => 'Thuốc'. link_to_route('drug.index', 'Quay lại', [], ['class' => 'btn btn-info pull-right'])])

  <div class="row col-lg-12 thuoc_info">
    <div class="col-md-6 thuoc_info1">
      <p><b>Mã thuốc: </b> {{ $post->code }}</p>
      <p><b>Tên thuốc: </b> {{ $post->name }}</p>
      <p><b>Nhóm thuốc: </b>
        <?php foreach($groupdrug as $gd) { ?>
        <?php if(isset($post->group_drug_id) && $post->group_drug_id == $gd['id']){ ?>
        {!! link_to('groupdrug/' . $gd['id'], $gd['full_name']) !!}
        <?php
          }else{echo '';} ?>
        <?php   }  ?>
      </p>
      <p><b>Hoạt chất chính: </b>{{ $post->activeIngredient }}</p>
      <p><b>Hàm lượng: </b>{{ $post->content }}</p>
      <p><b>Dạng bào chế: </b>{{ $post->design }}</p>
      <p><b>Quy cách đóng gói: </b>{{ $post->package }}</p>
      <p><b>Đơn vị buôn: </b>{{ $post->donvibuon }}</p>
      <p><b>Đơn vị lẻ: </b>{{ $post->donvile }}</p>
      <p><b>Hệ số quy đổi: </b>{{ $post->hesoquydoi }}</p>
    </div>

    <div class="col-md-6 thuoc_info2">
      <p><b>Số đăng ký: </b>{{ $post->registerNumber }}</p>
      <p><b>Công ty sản xuất: </b>{{ $post->produceCompany }}</p>
      <p><b>Nước sản xuất: </b>{{ $post->produceCountry }}</p>
      <p><b>Công ty đăng ký: </b>{{ $post->registerCompany }}</p>
      <p><b>Nước đăng ký: </b>{{ $post->registerCountry }}</p>
      <p><b>Ghi chú: </b>{{ $post->note }}</p>
      <p><b>Ảnh thuốc: </b>
        <?php $stt=0; ?>
        <div class="row">
        <?php if (count($post->drug_img)) {?>
        @foreach($post->drug_img as $row)
        <?php $stt++; ?>
        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
          Ảnh cũ: {!!$stt!!}<br><img src="{!!url(\Config::get('constants.pathDrugImg').$row->url)!!}" height="65">
        </div>
        @endforeach
        <?php } else {  $url = 'images/product.png';?>
          <img width="150px" src="{!! url($url) !!}" alt="">
          <?php } ?>
        </div>
      </p>
      <p><b>Trạng thái: </b><?php if($post->status == '1') {echo 'Hoạt động';}else{echo 'Khóa';}?></p>
    </div>
  </div>

@stop

@section('scripts')
@stop
