@extends('back.template')

@section('head')

	{!! HTML::style('ckeditor/plugins/codesnippet/lib/highlight/styles/default.css') !!}

@stop

@section('main')

	@include('back.partials.entete', ['title' => 'Khách hàng', 'icone' => 'pencil', 'fil' => link_to('transactions', 'Khách hàng') . ' / ' . 'Thêm mới'])

	<div class="col-sm-12">
		@yield('form')
		<div class="form-group">
			{!! Form::label('Mã Khách hàng') !!} <em>*</em>
			{!! Form::text('code', null, array('required', 'class'=>'form-control','placeholder'=>'Mã Khách hàng')) !!}
		</div>

		<div class="form-group">
			{!! Form::label('Tên Khách hàng') !!} <em>*</em>
			{!! Form::text('name', null, array('required', 'class'=>'form-control','placeholder'=>'Tên Khách hàng')) !!}
		</div>

		<div class="form-group">
			{!! Form::label('Điện thoại') !!} <em>*</em>
			{!! Form::text('phone', null, array('required', 'class'=>'form-control','placeholder'=>'Điện thoại')) !!}
		</div>

		<div class="form-group">
			{!! Form::label('Email') !!}
			{!! Form::text('email', null, array('class'=>'form-control','placeholder'=>'email')) !!}
		</div>

		<div class="form-group">
			{!! Form::label('Địa chỉ') !!} <em>*</em>
			{!! Form::text('address', null, array('required', 'class'=>'form-control','placeholder'=>'Địa chỉ')) !!}
		</div>

		<div class="form-group">
			{!! Form::label('Tỉnh thành') !!} <em>*</em>
			<select class="form-control" name="province" id="province" required>
				<option value="">Chọn tỉnh thành</option>
                <?php foreach($province as $gd) { ?>
				<option <?php if(isset($post['province']) && $post['province'] == $gd['name']){echo 'selected';}else{echo '';} ?> value="<?php echo $gd['id']?>"><?php echo $gd['name']?></option>
                <?php   }  ?>
			</select>
		</div>

		<div class="form-group">
			{!! Form::label('Quận Huyện') !!} <em>*</em>
			<select class="form-control" name="district" id="district" required>
				<option value="">Chọn quận huyện</option>
                <?php foreach($district as $gd) { ?>
				<option <?php if(isset($post['district']) && $post['district'] == $gd['name']){echo 'selected';}else{echo '';} ?> value="<?php echo $gd['id']?>"><?php echo $gd['name']?></option>
                <?php   }  ?>
			</select>
		</div>

		<div class="form-group">
			{!! Form::label('Số ĐKKD') !!} <em>*</em>
			{!! Form::text('license', null, array('required', 'class'=>'form-control','placeholder'=>'Số ĐKKD')) !!}
		</div>

		<div class="form-group">
			{!! Form::label('Loại khách hàng') !!} <em>*</em>
			<select class="form-control" name="pharmacieType" required>
                <?php foreach($pharmacieType as $gd) { ?>
				<option <?php if(isset($post['pharmacieType']) && $post['pharmacieType'] == $gd){echo 'selected';}else{echo '';} ?> value="<?php echo $gd?>"><?php echo $gd?></option>
                <?php   }  ?>
			</select>
		</div>

		<div class="form-group">
			{!! Form::label('Chủ nhà thuốc') !!} <em>*</em>
			{!! Form::text('owner', null, array('required', 'class'=>'form-control','placeholder'=>'Chủ nhà thuốc')) !!}
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
				<a href="{!! route('transactions.index') !!}" class="btn btn-default">Hủy</a>
			</div>
		</div>

		{!! Form::close() !!}
	</div>

@stop

@section('scripts')
	<script>
        $(function() {
            // change province load district
            $(document).on('change', '#province', function () {
                var token = $('input[name="_token"]').val();
                var provinceSelect = $(this).val();
                $.ajax({
                    url: '{{ url('postChangeProvince') }}',
                    type: 'POST',
                    data: "province=" + provinceSelect + "&_token=" + token
                })
				.done(function (response) {
				    // remove old data
                    $('#district').find('option')
                        .remove()
                        .end();

                    // each and append new list
                    jQuery.each(response, function(index, obj) {
                        $('#district')
                            .append($("<option></option>")
                                .attr("value",obj.id)
                                .text(obj.name));
                    });
				})
				.fail(function () {
					console.log('Lỗi - lấy dữ liệu districts');
				});
            });
        });
	</script>
@stop