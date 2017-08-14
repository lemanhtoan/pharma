@extends('business.index')

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
		padding-top: 20px;
	}
</style>
@section('custom js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.2.20/angular.min.js"></script>
<script src="{{ asset('web/js/plugin/bootstrap-tagsinput.js') }}"></script>
<script src="{{ asset('web/js/plugin/bootstrap-tagsinput-angular.min.js') }}"></script>
<script src="{{ asset('web/js/plugin/app.js') }}"></script>
<script src="{{ asset('web/js/plugin/app_bs3.js') }}"></script>
@stop

@section('content')
<div class="page-container">
	{{-- <div class="page-head">
		<div class="container">
			<div class="page-title">
				<h1>Business listing</h1>
			</div>			
		</div>
	</div> --}}
	<div class="page-content">
		<div class="container">						
			<div class="row">
				<div class="col-lg-12">
					<!-- BEGIN VALIDATION STATES-->
					<div class="portlet light">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-cogs font-green-sharp"></i>
								<span class="caption-subject font-green-sharp bold uppercase">Danh sách nhóm thuốc</span>
							</div>							
						</div>
						<div class="portlet-body">
							<div class="row">
								<form action="" method="POST" role="form">
									<div class="row">
										<div class="col-md-5 col-md-offset-1">
											<div class="form-group search">
												<input type="text" class="form-control" id="" placeholder="search Theo Tên người dùng, SĐT, Tên nhà thuốc">
												<span class="glyphicon glyphicon-search"></span>
											</div>
										</div>
										<div class="col-md-1">
											<button type="submit" class="btn green pull-right">Tìm kiếm</button>
										</div>
									</div>
									
								</form>
							</div>
							<div class="row sub-content">
								<div class="col-md-6">
									<div class="col-md-10 col-md-offset-1">
										<div class="col-md-4">
											<a href="#" class="btn green">Thêm nhóm mới</a>
										</div>

									</div>
									
								</div>
							</div>

							<div class="row sub-content">
								<table class="table table-striped table-hover table-bordered" id="sample_editable_1"">
									<thead>
										<tr>
											<th>Mã nhóm</th>
											<th>Tên viết tắt</th>
											<th>Tên đầy đủ</th>
											<th>Số lượng thuốc</th>
											<th>Trạng thái</th>
											<th>Sửa/xóa</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>#00001</td>
											<td>DPhẩm</td>
											<td><a href="3">Dược phẩm</a></td>
											<td>3.000</td>
											<td><input type="checkbox" checked class="icheck" /></td>
											<td><a href="#">sửa</a><a href="#"> xóa</a></td>
										</tr>
										<tr>
											<td>#00002</td>
											<td>TPCN</td>
											<td><a href="3">Thực phẩm chức năng</a></td>
											<td>1.200</td>
											<td><input type="checkbox" checked class="icheck" /></td>
											<td><a href="#">sửa</a><a href="#"> xóa</a></td>
										</tr>
										<tr>
											<td>#00003</td>
											<td>Mphẩm</td>
											<td><a href="3">Mỹ phẩm</a></td>
											<td>800</td>
											<td><input type="checkbox" checked class="icheck" /></td>
											<td><a href="#">sửa</a><a href="#"> xóa</a></td>
										</tr>


									</tbody>
								</table>
							</div>
						</div>
					</div>					
				</div>
			</div>
		</div>
	</div>
</div>



@stop