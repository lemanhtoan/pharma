@extends('back.mind.template')

@section('form')
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">
				Thêm phiên giao dịch
			</h1>
		</div>
	</div>

	@if (\Session::has('errors'))
		<div class="alert alert-danger">
			{!! \Session::get('errors') !!}
		</div>
	@endif

	@if (\Session::has('success'))
		<div class="alert alert-success">
			{!! \Session::get('success') !!}
		</div>
	@endif


	{!! Form::open(['url' => 'mind', 'method' => 'post', 'class' => 'form-horizontal panel', 'enctype' => 'multipart/form-data']) !!}
@stop
