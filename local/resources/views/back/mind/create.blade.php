@extends('back.mind.template')

@section('form')
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">
				Thêm phiên giao dịch
			</h1>
		</div>
	</div>

	{!! Form::open(['url' => 'mind', 'method' => 'post', 'class' => 'form-horizontal panel', 'enctype' => 'multipart/form-data']) !!}
@stop
