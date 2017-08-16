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
		padding-top: 40px;
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
								<span class="caption-subject font-green-sharp bold uppercase">Danh sách khách hàng</span>
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
															<option value="value">-Nhóm KH-</option>
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

													<div class="col-md-3">
														<select name="name_value" id="" class="form-control">
															<option value="value">Tỉnh/T.Phố</option>
															<option value="value">Hà Nội</option>
															<option value="value">Nghệ An</option>
															<option value="value">Thái Binh</option>
														</select>
													</div>

													<div class="col-md-3">
														<select name="name_value" id="" class="form-control">
															<option value="value">Quận/Huyện</option>
															<option value="value">Hai Bà Trưng</option>
															<option value="value">Đống Đa</option>
															<option value="value">Bà Triệu</option>
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
							</div>

							<div class="row sub-content">
								<table class="table table-striped table-hover table-bordered" id="sample_editable_1"">
									<thead>
										<tr>
											<th><input type="checkbox" checked /></th>
											<th>Ngày tạo TK</th>
											<th>Mã KH</th>
											<th>Tên KH</th>
											<th>Nhóm KH</th>
											<th>Địa chỉ</th>
											<th>Quận/Huyện</th>
											<th>Tỉnh/TP</th>
											<th>Điện thoại</th>
											<th>SL đơn h</th>
											<th>Tổng tiền đã mua</th>
											<th>Trạng thái</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td><input type="checkbox" checked name=""></td>
											<td>10/7/2017</td>
											<td><a href="#">#00001</a></td>
											<td>5Pharma 1</td>
											<td>Nhà thuốc lẻ</td>
											<td>4 Liễu Giai</td>
											<td>Ba Đình</td>
											<td>Hà Nội</td>
											<td>0123</td>
											<td>2</td>
											<td>10.000.000</td>
											<td>Hoạt động</td>
										</tr>

										<tr>
											<td><input type="checkbox" checked name=""></td>
											<td>10/7/2017</td>
											<td><a href="#">#00002</a></td>
											<td>5Pharma 2</td>
											<td>Nhà thuốc lẻ</td>
											<td>1 Đội Cấn</td>
											<td>Ba Đình</td>
											<td>Hà Nội</td>
											<td>0123</td>
											<td>5</td>
											<td>10.000.000</td>
											<td>Hoạt động</td>
										</tr>


										<tr>
											<td><input type="checkbox" checked name=""></td>
											<td>10/7/2017</td>
											<td><a href="#">#00003</a></td>
											<td>5Pharma 3</td>
											<td>Nhà thuốc buôn</td>
											<td>1 Hai Bà Trưng</td>
											<td>Hai Bà Trưng</td>
											<td>Hà Nội</td>
											<td>0123</td>
											<td>3</td>
											<td>10.000.000</td>
											<td>Hoạt động</td>
										</tr>


										<tr>
											<td><input type="checkbox" checked name=""></td>
											<td>11/7/2017</td>
											<td><a href="#">#00004</a></td>
											<td>5Pharma 1</td>
											<td>Nhà thuốc buôn</td>
											<td>10 Nguyễn Trãi</td>
											<td>Thanh Mai</td>
											<td>Hà Nội</td>
											<td>2345</td>
											<td>5</td>
											<td>10.000.000</td>
											<td>Hoạt động</td>
										</tr>


										<tr>
											<td><input type="checkbox" checked name=""></td>
											<td>10/7/2017</td>
											<td><a href="#">#00005</a></td>
											<td>5Pharma 1</td>
											<td>Nhà thuốc lẻ</td>
											<td>4 Liễu Giai</td>
											<td>Ba Đình</td>
											<td>Hà Nội</td>
											<td>0123</td>
											<td>2</td>
											<td>10.000.000</td>
											<td>Hoạt động</td>
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