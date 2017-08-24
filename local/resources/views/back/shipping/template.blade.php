@extends('back.template')

@section('head')

	{!! HTML::style('ckeditor/plugins/codesnippet/lib/highlight/styles/default.css') !!}

@stop

@section('main')

	@include('back.partials.entete', ['title' => 'Nhà vận chuyển', 'icone' => 'pencil', 'fil' => link_to('shipping', 'Nhà vận chuyển') . ' / ' . 'Thêm mới'])

	<div class="col-sm-12">
		@yield('form')
		<div class="form-group">
			{!! Form::label('Tên nhà vận chuyển') !!} <em>*</em>
			{!! Form::text('name', null, array('required', 'class'=>'form-control','placeholder'=>'Tên nhà vận chuyển')) !!}
		</div>

		<div class="form-group">
			{!! Form::label('Ghi chú') !!}
			{!! Form::text('note', null, array('class'=>'form-control','placeholder'=>'Ghi chú')) !!}
		</div>

		<div class="form-group">
			<div class="col-md-3">
				<div class="link-left">{!! Form::submit('Cập nhật') !!}</div>
				<div class="link-right"><a href="{!! route('shipping.index') !!}" class="btn btn-default">Hủy</a></div>
			</div>
		</div>

		{!! Form::close() !!}
	</div>

@stop

@section('scripts')

@stop