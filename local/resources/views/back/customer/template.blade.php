@extends('back.template')

@section('head')

	{!! HTML::style('ckeditor/plugins/codesnippet/lib/highlight/styles/default.css') !!}

@stop

@section('main')

	@include('back.partials.entete', ['title' => 'Người dùng', 'icone' => 'pencil', 'fil' => link_to('customer', 'Người dùng') . ' / ' . 'Thêm mới'])


	<div class="col-sm-12">

		@if(session()->has('message'))
			@include('partials/error', ['type' => 'danger', 'message' => session('message')])
		@endif

		@if(session()->has('success'))
			@include('partials/error', ['type' => 'success', 'message' => session('success')])
		@endif

		@yield('form')
		<div class="form-group">
			{!! Form::label('Tên người dùng') !!} <em>*</em>
			{!! Form::text('name', null, array('required', 'class'=>'form-control','placeholder'=>'Tên người dùng')) !!}
		</div>

		<div class="form-group">
			{!! Form::label('Số điện thoại') !!} <em>*</em>
			{!! Form::text('phone', null, array('required', 'class'=>'form-control','placeholder'=>'Số điện thoại')) !!}
		</div>

		<div class="form-group">
			{!! Form::label('Email') !!}
			{!! Form::text('email', null, array('class'=>'form-control','placeholder'=>'Email')) !!}
		</div>

		<div class="form-group">
			{!! Form::label('Mật khẩu') !!} <em>*</em>
			<input class="form-control" placeholder="Mật khẩu" name="password" type="password">
		</div>

		<div class="form-group">
			{!! Form::label('Nhà thuốc') !!} <em>*</em>
			<select class="form-control" name="pharmacieId" id="pharmacieId" required>
				<option value="">Chọn nhà thuốc</option>
                <?php foreach($pharmacieId as $gd) { ?>
				<option <?php if(isset($post['pharmacieId']) && $post['pharmacieId'] == $gd['id']){echo 'selected';}else{echo '';} ?> value="<?php echo $gd['id']?>"><?php echo $gd['name']?></option>
                <?php   }  ?>
			</select>
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
				<a href="{!! route('customer.index') !!}" class="btn btn-default">Hủy</a>
			</div>
		</div>

		{!! Form::close() !!}
	</div>

@stop

@section('scripts')

@stop