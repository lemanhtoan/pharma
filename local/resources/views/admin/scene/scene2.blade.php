@extends('admin.index')
@section('custom css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/css/bootstrap-theme.min.css">
<link href="{{ asset('web/css/plugins/bootstrap-tagsinput.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rainbow/1.2.0/themes/github.css">
<link href="{{ asset('web/css/plugins/app.css') }}" rel="stylesheet" type="text/css">

<style type="text/css">
	.error{
		color: #e35b5a;
	}

</style>
<a href="#" class="btn btn-default add-drug" style=""><span class="glyphicon glyphicon-plus" style=""></span></a>
@section('content')
<h3 class="page-title">
Tạo phiên mới
</h3>
<div class="page-bar">
	<ul class="page-breadcrumb">
		<li>
			<i class="fa fa-home"></i>
			<a href="index.html">Trang chủ</a>
			<i class="fa fa-angle-right"></i>
		</li>
		<li>
			<a href="#">phiên giao dịch</a>
			<i class="fa fa-angle-right"></i>
		</li>
		<li>
			<a href="#">tạo mới</a>
		</li>
	</ul>
	
</div>
<!-- END PAGE HEADER-->
<!-- BEGIN PAGE CONTENT-->
<div class="row">
	<div class="col-md-12">
		
		<!-- Begin: life time stats -->
		<div class="portlet light">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-cogs font-green-sharp"></i>
					<span class="caption-subject font-green-sharp bold uppercase">Tạo phiên mới</span>
				</div>							
			</div>
			<div class="portlet-body form">
				@if (isset($errors) && count($errors) > 0)
				<div class="alert alert-danger">
					<ul>
						@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
				@endif

				@if(session()->has('message'))
				<div class="alert alert-danger alert-dismissable">
				  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				  <strong>Error !</strong> {!! session()->get('message')  !!}
				</div>
				@endif

				@if(session()->has('success'))
				<div class="alert alert-success alert-dismissable">
				  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				  <strong>Success !</strong> {!! session()->get('success')  !!}
				</div>
				@endif
				<form action="#" method="post" id="form_sample_2" class="form-horizontal"  enctype="multipart/form-data">
				    {{ csrf_field() }}
					<div class="form-body">
						<div class="alert alert-danger display-hide">
							<button class="close" data-close="alert"></button>
							You have some form errors. Please check below.
						</div>
						<div class="alert alert-success display-hide">
							<button class="close" data-close="alert"></button>
							created successfully !
						</div>
						<div class="row">
							<div class="form-group">
								<div class="col-md-8 col-md-offset-1">
									<div class="input-icon right">
										<i class="fa"></i>
										<input type="text" class="form-control" value="{{ old('old_value') }}" name="name" placeholder="- Tên phiên giao dịch (bắt buộc) -" />
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-md-7">KM tối đa cho nhóm KH 1<span class="required">
									* </span>
									</label>
									<div class="col-md-5">
										<div class="input-icon right">
												<i class="fa"></i>
												<input type="text" class="form-control" value="{{ old('old_value') }}" name="name"/>
											</div>
									</div>

								</div>

								<div class="form-group">
									<label class="control-label col-md-7">KM tối đa cho nhóm KH 2<span class="required">
									* </span>
									</label>
									<div class="col-md-5">
										<div class="input-icon right">
												<i class="fa"></i>
												<input type="text" class="form-control" value="{{ old('old_value') }}" name="name"/>
											</div>
									</div>

								</div>


							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-md-3">Bắt đầu<span class="required">
									* </span>
									</label>
									<div class="col-md-4">
										<div class="input-icon right">
											<i class="fa"></i>
											<input type="date" class="form-control" value="{{ old('old_value') }}" name="name" />
										</div>
									</div>
									<div class="col-md-4">
										<div class="input-icon right">
											<i class="fa"></i>
											<input type="times" class="form-control" value="{{ old('old_value') }}" name="name" placeholder="hh:mm AM/PM" />
										</div>
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-md-3">Bắt đầu<span class="required">
									* </span>
									</label>
									<div class="col-md-4">
										<div class="input-icon right">
											<i class="fa"></i>
											<input type="date" class="form-control" value="{{ old('old_value') }}" name="name" />
										</div>
									</div>
									<div class="col-md-4">
										<div class="input-icon right">
											<i class="fa"></i>
											<input type="times" class="form-control" value="{{ old('old_value') }}" name="name" placeholder="hh:mm AM/PM" />
										</div>
									</div>
								</div>
							</div>

							<div class="form-group">
									<label class="control-label col-md-3">Thông báo của Phiên
									</label>
									<div class="col-md-6">
										<div class="input-icon right">
											<i class="fa"></i>
											<input type="times" class="form-control" value="{{ old('old_value') }}" name="name"/>
										</div>
									</div>
								</div>
							
						</div>
						<div class="row">
							<div class="col-md-12">
								<label for="" class="col-md-5 bold">DS thuốc trong phiên</label>
								<div class="col-md-7">
									<a class="btn btn-link pull-right" href="#">Xuất file</a>
									<a class="btn btn-link pull-right" href="#" style="border-right: 1px solid #454545 ">Nhập file</a>
								</div>
							</div>
							<div class="col-md-12">
								<table class="table table-bordered table-hover">
									<thead>
										<tr>
											<th>#</th>
											<th>Tên thuốc</th>
											<th>Giá gốc</th>
											<th>Giá KM</th>
											<th>Giới hạn KM</th>
											<th>Giới hạn đặt hàng</th>
											<th>Ghi chú</th>
											<th></th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>1</td>
											<td>Paracetamol 1</td>
											<td>100.000</td>
											<td>95.000</td>
											<td>10</td>
											<td>200</td>
											<td></td>
											<td><a href="#" style="color:red;font-size: 18px">X</a></td>
										</tr>

										<tr>
											<td>2</td>
											<td>Paracetamol 1</td>
											<td>100.000</td>
											<td>95.000</td>
											<td>10</td>
											<td>200</td>
											<td></td>
											<td><a href="#" style="color:red;font-size: 18px">X</a></td>
										</tr>

										<tr>
											<td>3</td>
											<td>Paracetamol 1</td>
											<td>100.000</td>
											<td>95.000</td>
											<td>10</td>
											<td>200</td>
											<td></td>
											<td><a href="#" style="color:red;font-size: 18px">X</a></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>

						<div class="row">
							<div class="col-md-12">
								<label for="" class="bold">Thêm thuốc mới</label>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label class="control-label col-md-2">Tên thuốc<span class="required">
									* </span>
									</label>
									<div class="col-md-7">
										<div class="input-icon right">
											<i class="fa"></i>
											<select name="name_value" class="form-control" id="">
												<option value="value0"> - Chọn tên thuốc - </option>
												<option value="value1">Thuốc 1</option>
												<option value="value2">Thuốc 2</option>
												<option value="value3">Thuốc 3</option>
											</select>
										</div>
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-md-2">Giá gốc<span class="required">
									* </span>
									</label>
									<div class="col-md-2">
										<div class="input-icon right">
											<i class="fa"></i>
											<input type="text" class="form-control" value="{{ old('old_value') }}" name="name"/>
										</div>
									</div>
								</div>

								<div class="form-group">
									<div class="col-md-9">
										<div class="col-md-6">
											<label class="control-label col-md-5">Giá KM
											</label>
											<div class="col-md-6">
												<div class="input-icon right">
													<i class="fa"></i>
													<input type="text" class="form-control" value="{{ old('old_value') }}" name="name"/>
												</div>
											</div>
										</div>

										<div class="col-md-6">
											<label class="control-label col-md-7">SLKM tối đa/KH
											</label>
											<div class="col-md-5">
												<div class="input-icon right">
													<i class="fa"></i>
													<input type="text" class="form-control" value="{{ old('old_value') }}" name="name"/>
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-md-2">SL tối đa trong phiên
									</label>
									<div class="col-md-2">
										<div class="input-icon right">
											<i class="fa"></i>
											<input type="text" class="form-control" value="{{ old('old_value') }}" name="name"/>
										</div>
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-md-2">Ghi chú
									</label>
									<div class="col-md-7">
										<div class="input-icon right">
											<i class="fa"></i>
											<input type="text" class="form-control" value="{{ old('old_value') }}" name="name"/>
										</div>
									</div>
									<div class="col-md-1">
										<a href="#" class="btn btn-default add-drug" style="border-radius: 50%;width: 36px;height:36px;border: 4px solid lightgreen;position: relative;"><span class="glyphicon glyphicon-plus" style="color: lightgreen;font-size: 28px;position: absolute;top: 7px;left: 1px"></span></a>
									</div>
								</div>
							</div>
						</div>
						

					</div>
					<div class="form-actions">
						<div class="row" >
							<div class="col-md-9">
								<div class="row">
									<div class="col-md-1 col-md-offset-10">
										<button type="submit" class="btn btn-default pull-right">Hủy</button>
									</div>
									<div class="col-md-1">
										<button type="submit" class="btn green pull-right">Lưu</button>
										
									</div>
								</div>
							</div>
							
						</div>
					</div>
				</form>	
			</div>
		</div>	
		<!-- End: life time stats -->
	</div>
</div>

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="https://code.jquery.com/jquery.js"></script>
<script src="http://code.jquery.com/jquery-3.1.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
<script type="text/javascript">		
	$("#form_sample_2").validate({
		rules:{			
			name : 'required',
			hash_tags : 'required',
			about_description : 'required',			
			phone : {
				required : true,
				maxlength : 11,
				minlength : 9
			},
			email : {
				required : true,
				email : true
			},
			website : {
				required : true,
				url: true
			},
			contact_description : 'required',
			photo :{
				required : true,
				extension: "jpg|jpeg|png|JPG|JPEG|PNG"
			}			
		}
	});

	$(document).ready(function () {
	    $("#select_demo").select2({
	    	maximumSelectionLength: 2
	    });

	    $('.checker').show();
	});
</script>


<style>
    #pac-input {
        background-color: #fff;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        margin-left: 12px;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        width: 300px;
        position: absolute;        
        z-index: 9999999;
      }

      #pac-input:focus {
        border-color: #4d90fe;
      }

      .pac-container {
        font-family: Roboto;
      }
      .controls {
        margin-top: 10px;
        border: 1px solid transparent;
        border-radius: 2px 0 0 2px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        height: 32px;
        outline: none;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
      }
      #type-selector {
        color: #fff;
        background-color: #4d90fe;
        padding: 5px 11px 0px 11px;
      }

      #type-selector label {
        font-family: Roboto;
        font-size: 13px;
        font-weight: 300;
      }
      #target {
        width: 345px;
      }
</style>
@stop
@section('custom js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.2.20/angular.min.js"></script>
<script src="{{ asset('web/js/plugin/bootstrap-tagsinput.js') }}"></script>
<script src="{{ asset('web/js/plugin/bootstrap-tagsinput-angular.min.js') }}"></script>
<script src="{{ asset('web/js/plugin/app.js') }}"></script>
<script src="{{ asset('web/js/plugin/app_bs3.js') }}"></script>
@stop