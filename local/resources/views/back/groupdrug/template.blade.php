@extends('back.template')

@section('head')

	{!! HTML::style('ckeditor/plugins/codesnippet/lib/highlight/styles/default.css') !!}

@stop

@section('main')

	@include('back.partials.entete', ['title' => 'Nhóm thuốc', 'icone' => 'pencil', 'fil' => link_to('groupdrug', 'Nhóm thuốc') . ' / ' . 'Thêm mới'])

	<div class="col-sm-12">
		@yield('form')
		<div class="form-group">
			{!! Form::label('Tên viết tắt') !!} <em>*</em>
			{!! Form::text('short_name', null, array('required', 'class'=>'form-control','placeholder'=>'Tên viết tắt')) !!}
		</div>

		<div class="form-group">
			{!! Form::label('Tên đầy đủ') !!} <em>*</em>
			{!! Form::text('full_name', null, array('required', 'class'=>'form-control','placeholder'=>'Tên đầy đủ')) !!}
		</div>

		<div class="form-group">
			{!! Form::label('Ghi chú') !!}
			{!! Form::text('note', null, array('class'=>'form-control','placeholder'=>'Ghi chú')) !!}
		</div>

		<div class="form-group">
			{!! Form::label('Trạng thái') !!} <br>
			<input id="1" type="radio" value="1" name="status" required <?php if(isset($post['status']) && $post['status'] == '1') {echo 'checked';} else {echo '';}?>>
			<label for="1">Hoạt động</label>
			<br>
			<input id="0" type="radio" value="0" name="status" required <?php if(isset($post['status']) && $post['status'] == '0') {echo 'checked';} else {echo '';}?>>
			<label for="0">Khóa</label>

		</div>

		<div class="form-group">
			<div class="col-md-1">
				{!! Form::submit('Cập nhật') !!}
			</div>
			<div class="col-md-1">
				<a href="{!! route('groupdrug.index') !!}" class="btn btn-default">Hủy</a>
			</div>
		</div>

		{!! Form::close() !!}
	</div>

@stop

@section('scripts')

@stop