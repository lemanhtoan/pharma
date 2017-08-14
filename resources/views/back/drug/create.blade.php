@extends('back.drug.template')

@section('form')
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">
				Thêm thuốc mới
			</h1>
		</div>
	</div>

	{!! Form::open(['url' => 'drug', 'method' => 'post', 'class' => 'form-horizontal panel', 'files' => true]) !!}
@stop
