@extends('back.template')
@section('main')

  @include('back.partials.entete', ['icone' => 'pencil', 'fil' => 'Thuốc', 'title' => 'Thuốc'. link_to_route('drug.index', 'Quay lại', [], ['class' => 'btn btn-info pull-right'])])

  <div class="row col-lg-12">
    <div class="col-md-6">
      <p>Mã thuốc: {{ $post->code }}</p>
      <p>Tên thuốc: {{ $post->name }}</p>
      <p>Nhóm thuốc:
        <?php foreach($groupdrug as $gd) { ?>
        <?php if(isset($post->group_drug_id) && $post->group_drug_id == $gd['id']){ ?>
        {!! link_to('groupdrug/' . $gd['id'], $gd['full_name']) !!}
        <?php
          }else{echo '';} ?>
        <?php   }  ?>
      </p>
      <p>Hoạt chất chính: {{ $post->activeIngredient }}</p>
      <p>Hàm lượng: {{ $post->content }}</p>
      <p>Dạng bào chế: {{ $post->design }}</p>
      <p>Quy cách đóng gói: {{ $post->package }}</p>
      <p>Đơn vị buôn: {{ $post->donvibuon }}</p>
      <p>Đơn vị lẻ: {{ $post->donvile }}</p>
      <p>Hệ số quy đổi: {{ $post->hesoquydoi }}</p>
    </div>

    <div class="col-md-6">
      <p>Số đăng ký: {{ $post->registerNumber }}</p>
      <p>Công ty sản xuất: {{ $post->produceCompany }}</p>
      <p>Nước sản xuất: {{ $post->produceCountry }}</p>
      <p>Công ty đăng ký: {{ $post->registerCompany }}</p>
      <p>Nước đăng ký: {{ $post->registerCountry }}</p>
      <p>Ghi chú: {{ $post->note }}</p>
      <p>Ảnh thuốc:
        <?php $stt=0; ?>
        <div class="row">
        @foreach($post->drug_img as $row)
        <?php $stt++; ?>
        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
          Ảnh cũ: {!!$stt!!}<br><img src="{!!url(\Config::get('constants.pathDrugImg').$row->url)!!}" height="65">
        </div>
        @endforeach
        </div>
      </p>
      <p>Trạng thái: <?php if($post->status == '1') {echo 'Hoạt động';}else{echo 'Khóa';}?></p>
    </div>
  </div>

@stop

@section('scripts')
@stop
