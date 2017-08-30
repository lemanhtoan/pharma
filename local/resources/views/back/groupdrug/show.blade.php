@extends('back.template')
@section('main')

  @include('back.partials.entete', ['icone' => 'pencil', 'fil' => 'Nhóm thuốc', 'title' => 'Nhóm thuốc'. link_to_route('groupdrug.index', 'Quay lại', [], ['class' => 'btn btn-info pull-right'])])

  <div class="row col-lg-12 group_thuoc">
    <p>
      {!! link_to_route('groupdrug.edit', 'Sửa', [$post->id], ['class' => 'edit-link']) !!}
    </p>
    <p><b>Mã nhóm thuốc: </b>{{ $post->code }}</p>
    <p><b>Tên viết tắt: </b>{{ $post->short_name }}</p>
    <p><b>Tên đầy đủ: </b>{{ $post->full_name }}</p>
    <p><b>Ghi chú: </b>{{ $post->note }}</p>
    <p><b>Trạng thái: </b><?php if($post->status == '1') {echo 'Hoạt động';}else{echo 'Khóa';}?></p>
  </div>

@stop

@section('scripts')
@stop
