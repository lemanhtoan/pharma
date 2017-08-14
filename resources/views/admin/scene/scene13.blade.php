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
Quản lý người dùng
</h3>
<div class="page-bar">
	<ul class="page-breadcrumb">
		<li>
			<i class="fa fa-home"></i>
			<a href="index.html">Trang chủ</a>
			<i class="fa fa-angle-right"></i>
		</li>
		<li>
			<a href="#">người dùng</a>
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
					<span class="caption-subject font-green-sharp bold uppercase">Danh sách người dùng</span>
				</div>							
			</div>
			<div class="portlet-body">
				<div class="row">
					<form action="" method="POST" role="form">
						<div class="row">
							<div class="col-md-8 col-md-offset-1">
								<div class="form-group search">
									<input type="text" class="form-control" id="" placeholder="search Theo Tên người dùng, SĐT, Tên nhà thuốc">
									<span class="glyphicon glyphicon-search"></span>
									<span>
										<select name="name_value" class="form-control" id="state-search">
											<option value="0">Trạng thái</option>
											<option value="0">Trạng thái 1</option>
											<option value="0">Trạng thái 2</option>
										</select>
									</span>
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
				</div>

				<div class="row sub-content">
					<table class="table table-striped table-hover table-bordered" id="sample_editable_1"">
						<thead>
							<tr>
								<th>#</th>
								<th>ID Người dùng</th>
								<th>Tên Người dùng</th>
								<th>SĐT</th>
								<th>Nhà thuốc</th>
								<th>Trạng thái</th>
								<th>Lần đăng nhập gần nhất</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>1</td>
								<td><a href="#">#213</a></td>
								<td>Nguyễn Văn A</td>
								<td>09xxxxxxxx</td>
								<td>Nhà thuốc Liễu Giai 1</td>
								<td>Đang hoạt động</td>
								<td>18:00 20/08/2017</td>
							</tr>

							<tr>
								<td>1</td>
								<td><a href="#">#213</a></td>
								<td>Nguyễn Văn B</td>
								<td>09xxxxxxxx</td>
								<td>Nhà thuốc Liễu Giai 2</td>
								<td>Đang hoạt động</td>
								<td>18:00 20/08/2017</td>
							</tr>

							<tr>
								<td>1</td>
								<td><a href="#">#213</a></td>
								<td>Nguyễn Văn C</td>
								<td>09xxxxxxxx</td>
								<td>Nhà thuốc Liễu Giai 3</td>
								<td>Đang hoạt động</td>
								<td>18:00 20/08/2017</td>
							</tr>

							<tr>
								<td>1</td>
								<td><a href="#">#213</a></td>
								<td>Nguyễn Văn D</td>
								<td>09xxxxxxxx</td>
								<td>Nhà thuốc Liễu Giai 4</td>
								<td>Đang hoạt động</td>
								<td>18:00 20/08/2017</td>
							</tr>

							<tr>
								<td>1</td>
								<td><a href="#">#213</a></td>
								<td>Nguyễn Văn E</td>
								<td>09xxxxxxxx</td>
								<td>Nhà thuốc Liễu Giai 5</td>
								<td>Đang hoạt động</td>
								<td>18:00 20/08/2017</td>
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