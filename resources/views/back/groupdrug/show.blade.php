@extends('back.template')
@section('main')

  @include('back.partials.entete', ['icone' => 'pencil', 'fil' => 'Nhóm thuốc', 'title' => 'Nhóm thuốc'. link_to_route('groupdrug.index', 'Quay lại', [], ['class' => 'btn btn-info pull-right'])])

  <div class="row col-lg-12">
    <p>Mã nhóm thuốc: {{ $post->code }}</p>
    <p>Tên viết tắt: {{ $post->short_name }}</p>
    <p>Tên đầy đủ: {{ $post->full_name }}</p>
    <p>Ghi chú: {{ $post->note }}</p>
    <p>Trạng thái: <?php if($post->status == '1') {echo 'Hoạt động';}else{echo 'Khóa';}?></p>
  </div>

@stop

@section('scripts')
@stop
