@extends('back.template')

@section('head')

	{!! HTML::style('ckeditor/plugins/codesnippet/lib/highlight/styles/default.css') !!}

@stop

@section('main')

	@include('back.partials.entete', ['title' => 'Khuyến mãi', 'icone' => 'pencil', 'fil' => link_to('discount', 'Khuyến mãi') . ' / ' . 'Thêm mới'])

	<div class="col-sm-12">
		@yield('form')
		<div class="form-group">
			{!! Form::label('Tên khuyến mãi') !!}
			{!! Form::text('name', null, array('class'=>'form-control','placeholder'=>'Tên khuyến mãi')) !!}
		</div>

		<div class="form-group">
			{!! Form::label('Mức khuyến mãi') !!} <em>*</em>
			<select required class="form-control" name="level" id="level">
				<?php for ($i=1; $i<=10; $i++) {?>
				<option <?php if(isset($post->level) && ($post->level == $i)) {echo 'selected';}else{echo '';}?> value="<?php echo $i?>">Mức <?php echo $i?></option>
				<?php } ?>
			</select>
		</div>

		<div class="form-group">
			{!! Form::label('KM từ (triệu đồng)') !!}  <em>*</em>
			{!! Form::text('from', null, array('required', 'class'=>'form-control','placeholder'=>'KM từ (triệu đồng)')) !!}
		</div>

		<div class="form-group">
			{!! Form::label('KM đến (triệu đồng)') !!} <em>*</em>
			{!! Form::text('to', null, array('required', 'class'=>'form-control','placeholder'=>'KM đến (triệu đồng)')) !!}
		</div>

		<div class="form-group">
			{!! Form::label('Giá trị khuyến mãi (%)') !!} <em>*</em>
			{!! Form::text('percent', null, array('required', 'class'=>'form-control','placeholder'=>'Giá trị khuyến mãi (%)')) !!}
		</div>

		<div class="form-group">
			<div class="col-md-3">
				<div class="link-left">{!! Form::submit('Cập nhật') !!}</div>
				<div class="link-right"><a href="{!! route('discount.index') !!}" class="btn btn-default">Hủy</a></div>
			</div>
		</div>

		{!! Form::close() !!}
	</div>

@stop

@section('scripts')

@stop