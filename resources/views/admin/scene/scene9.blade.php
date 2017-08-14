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
	.search{
		position: relative;
	}

	.search input{
		border-radius: 50px;
		padding-left: 30px;
	}

	.search span{
		position: absolute;
		color:#898989;
		top: 9px;
		left: 9px;
	}

	#state-search{
		position: absolute;
		top: 30px;
	}


	.sub-content{
		padding-top: 40px;
	}
</style>
@stop
@section('content')
<h3 class="page-title">
Quản lý thuốc
</h3>
<div class="page-bar">
	<ul class="page-breadcrumb">
		<li>
			<i class="fa fa-home"></i>
			<a href="index.html">Trang chủ</a>
			<i class="fa fa-angle-right"></i>
		</li>
		<li>
			<a href="#">thuốc</a>
			<i class="fa fa-angle-right"></i>
		</li>
		<li>
			<a href="#">danh sách</a>
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
					<span class="caption-subject font-green-sharp bold uppercase">Danh sách thuốc</span>
				</div>							
			</div>
			<div class="portlet-body">
				<div class="row">
					<form action="" method="POST" role="form">
						<div class="row">
							<div class="col-md-8 col-md-offset-1">
								<div class="form-group search">
									<input type="text" class="form-control" id="" placeholder="tìm kiếm theo tênNT, tên chủ, địa chỉ, SĐT">
									<span class="glyphicon glyphicon-search"></span>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-md-3">
											<select name="name_value" id="" class="form-control">
												<option value="value">-Nhóm thuốc-</option>
												<option value="value">Nhóm 1</option>
												<option value="value">Nhóm 2</option>
												<option value="value">Nhóm 3</option>
											</select>
										</div>

										<div class="col-md-3">
											<select name="name_value" id="" class="form-control">
												<option value="value">Trạng thái</option>
												<option value="value">Trạng thái 1</option>
												<option value="value">Trạng thái 2</option>
												<option value="value">Trạng thái 3</option>
											</select>
										</div>

									</div>
									
								</div>
							</div>
							<div class="col-md-2">
								<button type="submit" class="btn green pull-right">Tìm kiếm</button>
							</div>
						</div>
						
					</form>
				</div>
				<div class="row sub-content">
					<div class="col-md-6">
						<div class="col-md-10 col-md-offset-1">
							<div class="col-md-4">
								<a href="#" class="btn green">Thêm mới</a>
							</div>

							<div class="col-md-4">
								<a href="#" class="btn green">Kích hoạt</a>
							</div>

							<div class="col-md-4">
								<a href="#" class="btn green">Tắt kích hoạt</a>
							</div>
						</div>
						
					</div>
					<div class="col-md-6">
						<a href="#" class="btn btn-link pull-right" style="border-left: 1px solid #454545;">Nhập file</a>
						<a href="#" class="btn btn-link pull-right">Xuất file</a>
					</div>
				</div>

				<div class="row sub-content">
					<table class="table table-striped table-hover table-bordered" id="sample_editable_1"">
						<thead>
							<tr>
								<th><input type="checkbox" checked /></th>
								<th>Mã thuốc</th>
								<th>Tên thuốc</th>
								<th>Hoạt chất chính</th>
								<th>Nhóm thuốc</th>
								<th>Hàm lượng</th>
								<th>QC đóng gói</th>
								<th>Cty sản xuất</th>
								<th>Trạng thái</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><input type="checkbox" checked name=""></td>
								<td><a href="#">#00001</a></td>
								<td>Vitamin C 100mg</td>
								<td>Vitamin C</td>
								<td>TPCN</td>
								<td>100mg</td>
								<td>Hộp 10 vỉ x 10 vỉ</td>
								<td>Dược TM</td>
								<td>Hoạt động</td>
							</tr>
							<tr>
								<td><input type="checkbox" checked name=""></td>
								<td><a href="#">#00002</a></td>
								<td>Bogonic</td>
								<td>XACY</td>
								<td>TPCN</td>
								<td>100mg</td>
								<td>Hộp 10 vỉ x 10 vỉ</td>
								<td>Dược Traphaco</td>
								<td>Hoạt động</td>
							</tr>
							<tr>
								<td><input type="checkbox" checked name=""></td>
								<td><a href="#">#00003</a></td>
								<td>Bogonic</td>
								<td>XACY</td>
								<td>TPCN</td>
								<td>100mg</td>
								<td>Hộp 10 vỉ x 10 vỉ</td>
								<td>Dược Traphaco</td>
								<td>Hoạt động</td>
							</tr>
							<tr>
								<td><input type="checkbox" checked name=""></td>
								<td><a href="#">#00004</a></td>
								<td>Bogonic</td>
								<td>XACY</td>
								<td>TPCN</td>
								<td>100mg</td>
								<td>Hộp 10 vỉ x 10 vỉ</td>
								<td>Dược Traphaco</td>
								<td>Hoạt động</td>
							</tr>
							<tr>
								<td><input type="checkbox" checked name=""></td>
								<td><a href="#">#00005</a></td>
								<td>Bogonic</td>
								<td>XACY</td>
								<td>TPCN</td>
								<td>100mg</td>
								<td>Hộp 10 vỉ x 10 vỉ</td>
								<td>Dược Traphaco</td>
								<td>Hoạt động</td>
							</tr>


						</tbody>
					</table>
				</div>
			</div>
		</div>	
		<!-- End: life time stats -->
	</div>
</div>
@stop
@section('custom js')
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.2.20/angular.min.js"></script>
<script src="{{ asset('web/js/plugin/bootstrap-tagsinput.js') }}"></script>
<script src="{{ asset('web/js/plugin/bootstrap-tagsinput-angular.min.js') }}"></script> -->
<!-- <script src="{{ asset('web/js/plugin/app.js') }}"></script>
<script src="{{ asset('web/js/plugin/app_bs3.js') }}"></script> -->
@stop