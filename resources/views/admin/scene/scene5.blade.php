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

	.wrap-table{
		border: 1px solid #9A9A9A;
		width: 100%;
	}

	.wrap-table tr{
		border-width: 0px;
		width: 100%;
	}

	.wrap-table tr td{
		border-width: 0px;
		height: 40px;
		line-height: 40px;
		padding-left: 10px;
	}

	.modal.modal-wide .modal-dialog {
		  width: 80%;
		}
	.modal-wide .modal-body {
		  overflow-y: auto;
		  overflow-x: hidden;
	}

</style>
<a href="#" class="btn btn-default add-drug" style=""><span class="glyphicon glyphicon-plus" style=""></span></a>
@section('content')
<div class="modal modal-wide fade" id="modal-id">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<div class="container">
					<div class="row">
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

						<form action="#" method="post" class="form-horizontal"  enctype="multipart/form-data">
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
								<div class="col-md-12">
									<div class="form-group">
										<label class="control-label col-md-2">Tên nhà thuốc
										</label>

										<label class="control-label col-md-7" style="text-align: left">Số 4 Liễu Giai, Phường Cổng Vị, Quận Ba Đình, Hà Nội
										</label>
									</div>
								</div>

								<div class="col-md-12">
									<div class="col-md-7">
										<div class="form-group">
											<label class="control-label col-md-3">Giao hàng bằng
											</label>
											<div class="col-md-5">
												<div class="input-icon right">
													<i class="fa"></i>
													<select name="name_value" class="form-control" id="">
														<option value="0"> - Chọn nhà vận chuyển - </option>
														<option value="1">Giaohangnhanh</option>
														<option value="2">Shippro.vn</option>
													</select>
												</div>
											</div>
										</div>

										<div class="form-group">
											<label class="control-label col-md-3">SL thùng/hộp
											</label>
											<div class="col-md-3">
												<div class="input-icon right">
													<i class="fa"></i>
													<input type="number" class="form-control" name="name"/>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-5">
										<div class="form-group">
											<label class="control-label col-md-3">Mã vận đơn
											</label>
											<div class="col-md-5">
												<div class="input-icon right">
													<i class="fa"></i>
													<input type="text" class="form-control" name="name"/>
												</div>
											</div>
										</div>

										<div class="form-group">
											<label class="control-label col-md-3">Số tiển thu hộ
											</label>

											<label class="control-label col-md-7" style="text-align: left">3.355.000
											</label>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-2">Tên viết tắt
									</label>
									<div class="col-md-2">
										<div class="input-icon right">
											<i class="fa"></i>
											<input type="text" class="form-control" value="" name="name" placeholder=" - hh:mm- - dd/mm/yyyy-" />
										</div>
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-md-2">Ghi chú
									</label>
									<div class="col-md-4">
										<div class="input-icon right">
											<i class="fa"></i>
											<input type="text" class="form-control" value="" name="name" />
										</div>
									</div>
								</div>

							</div>

						</form>
					</div>
				</div>
				
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
				<button type="button" class="btn green">Hoàn thành</button>
			</div>
		</div>
	</div>
</div>

<h3 class="page-title">
Danh sách phiên giao dịch
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
			<a href="#">tạo phiên mới</a>
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
							<div class="col-md-7">
								<div class="form-group">
									<label class="control-label col-md-5">Tên nhà thuốc
									</label>

									<label class="control-label col-md-7" style="text-align: left">Nhà thuốc Liễu Giai
									</label>
								</div>

								<div class="form-group">
									<label class="control-label col-md-5">Địa chỉ
									</label>
									<div class="col-md-7">
										<div class="input-icon right">
											<i class="fa"></i>
											<input type="text" class="form-control" value="Số 4, Liễu Giai, Ba Đình, Hà Nội" name="name"/>
										</div>
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-md-5">SĐT
									</label>
									<div class="col-md-7">
										<div class="input-icon right">
											<i class="fa"></i>
											<input type="text" class="form-control" value="09x.xxx.xxxx" name="name"/>
										</div>
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-md-5">Phương thức thanh toán
									</label>

									<label class="control-label col-md-7" style="text-align: left">COD
									</label>
								</div>

								<div class="form-group">
									<label class="control-label col-md-5">Ghi chú
									</label>
									<div class="col-md-7">
										<div class="input-icon right">
											<i class="fa"></i>
											<input type="text" class="form-control" value="" name="name"/>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-5">
								<div class="form-group">
									<label class="control-label col-md-5">Ngày giao dịch
									</label>

									<label class="control-label col-md-7" style="text-align: left">20/07/2017 11:20 AM
									</label>
								</div>

								<div class="form-group">
									<label class="control-label col-md-5">Trạng thái hiện tại
									</label>

									<label class="control-label col-md-7" style="text-align: left">Đợi xác nhận
									</label>
								</div>

								<div class="form-group">
									<label class="control-label col-md-5">Cập nhật trạng thái
									</label>
									<div class="col-md-5">
										<div class="input-icon right">
											<i class="fa"></i>
											<select name="name_value" class="form-control" id="">
												<option value="0">Đợi xác nhận</option>
												<option value="1">Đợi gom hàng</option>
												<option value="2">Đợi chia hàng</option>
												<option value="3">Đợi giao hàng</option>
												<option value="4">Hủy</option>
											</select>
										</div>
									</div>
								</div>

								<div class="form-group">
									<div class="col-md-3 pull-right">
										<a href="#" class="btn green">In hóa đơn</a>
									</div>
									<div class="col-md-3 pull-right">
										<a data-toggle="modal" href='#modal-id' class="btn green">Giao hàng</a>
									</div>

									<div class="col-md-3 pull-right">
										<button type="submit" class="btn green">Cập nhật</button>
									</div>
									
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-7">
								<table class="table table-striped table-hover table-bordered wrap-table" id="sample_editable_1">
									<thead>
										<tr>
											<th>Thuốc</th>
											<th>SL</th>
											<th>Đơn giá</th>
											<th>Thành tiền</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>Paracetamol 1</td>
											<td>5</td>
											<td>95.000</td>
											<td>475.000</td>
										</tr>

										<tr>
											<td>Paracetamol 2</td>
											<td>5</td>
											<td>100.000</td>
											<td>500.000</td>
										</tr>

										<tr>
											<td>Paracetamol 2</td>
											<td>5</td>
											<td>95.000</td>
											<td>475.000</td>
										</tr>

										<tr>
											<td>Paracetamol 2</td>
											<td>5</td>
											<td>95.000</td>
											<td>475.000</td>
										</tr>

										<tr>
											<td>Paracetamol 2</td>
											<td>5</td>
											<td>95.000</td>
											<td>475.000</td>
										</tr>
										<tr style="background: lightblue;font-weight: bold">
											<td>Tổng</td>
											<td></td>
											<td>35</td>
											<td>3.350.000</td>
										</tr>
									</tbody>
								</table>
							</div>
							<div class="col-md-5">
								<table class="wrap-table">
									<tbody>
										<tr>
											<td>Tổng giá trị hàng hóa</td>
											<td>3.350.000</td>
										</tr>
										<tr>
											<td>Phí mua hộ + vận chuyển</td>
											<td>40.000</td>
										</tr>
										<tr>
											<td>KM vận chuyển</td>
											<td>-35.000</td>
										</tr>
										<tr class="bold">
											<td>TỔNG</td>
											<td>3.355.000</td>
										</tr>
										<tr>
											<td></td>
											<td></td>
										</tr>
										<tr>
											<td>Đã thanh toán</td>
											<td>0</td>
										</tr>
										<tr class="bold" style="background: lightblue">
											<td> CẦN THU </td>
											<td>3.355.000</td>
										</tr>

									</tbody>
								</table>
							</div>
						</div>
					</div>
				</form>							
			</div>
		</div>	
		<!-- End: life time stats -->
	</div>
</div>
@stop
@section('custom js')
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.2.20/angular.min.js"></script>
<script src="{{ asset('web/js/plugin/bootstrap-tagsinput.js') }}"></script>
<script src="{{ asset('web/js/plugin/bootstrap-tagsinput-angular.min.js') }}"></script>
<script src="{{ asset('web/js/plugin/app.js') }}"></script>
<script src="{{ asset('web/js/plugin/app_bs3.js') }}"></script> -->
@stop