@extends('back.template')
@section('main')

  @include('back.partials.entete', ['icone' => 'pencil', 'fil' => 'Khuyến mãi', 'title' => 'Khuyến mãi'. link_to_route('discount.index', 'Quay lại', [], ['class' => 'btn btn-info pull-right'])])

  <div class="row col-lg-12">
    <p>
      {!! link_to_route('discount.edit', 'Sửa', [$post->id], ['class' => 'edit-link']) !!}
    </p>
    <p>Tên mức khuyến mãi: {{ $post->name }}</p>
    <p>Mức khuyến mãi: Mức {{ $post->level }}</p>
    <p>Khuyến mãi từ: <?php echo number_format($post->from) ?></p>
    <p>Khuyến mãi đến: <?php echo number_format($post->to) ?></p>
    <p>Giá trị KM: <?php if ($post->type == 'Cố định') {echo number_format($post->value);}else {echo $post->value .' (%)';}?></p>
	<p>Kiểu loại: {{ $post->type }}</p>
  </div>

@stop

@section('scripts')
@stop
