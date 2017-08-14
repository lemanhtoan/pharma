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

<div class="modal fade" id="modal-id">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Đổi trạng thái các giao dịch đã chọn</h4>
			</div>
			<div class="modal-body">
				<div class="container">
					<div class="row">
						<form class="form-horizontal" action="#">
							<div class="form-group">
								<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
									<select name="name_value" class="form-control" id="">
										<option value="0">Chờ xác nhận</option>
										<option value="0">Đợi gom hàng</option>
										<option value="0">Đợi chia hàng</option>
										<option value="0">Đang giao hàng</option>
										<option value="0">Hủy</option>
									</select>
								</div>
								
							</div>
						</form>
					</div>
				</div>
				
				
			</div>
			<div class="modal-footer">
				<button type="button" class="btn default" data-dismiss="modal">Hủy</button>
				<button type="button" class="btn green">Cập nhật</button>
			</div>
		</div>
	</div>
</div>
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
								<span class="caption-subject font-green-sharp bold uppercase">Danh sách giao dịch</span>
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
														<select name="name_value" class="form-control" id="">
															<option value="value">-Phiên GD-</option>
															<option value="value">Phiên 1</option>
															<option value="value">Phiên 2</option>
															<option value="value">Phiên 3</option>
														</select>
													</div>

													<div class="col-md-3">
														<select name="name_value" class="form-control" id="">
															<option value="value">Trạng thái</option>
															<option value="value">Trạng thái 1</option>
															<option value="value">Trạng thái 2</option>
															<option value="value">Trạng thái 3</option>
														</select>
													</div>

													<div class="col-md-3">
														<select name="name_value" class="form-control" id="">
															<option value="value">-Nhóm KH-</option>
															<option value="value">Nhóm 1</option>
															<option value="value">Nhóm 2</option>
															<option value="value">Nhóm 3</option>
														</select>
													</div>


													<div class="col-md-3">
														<select name="name_value" class="form-control" id="">
															<option value="value">Tỉnh/T.Phố</option>
															<option value="value">Hà Nội</option>
															<option value="value">Nghệ An</option>
															<option value="value">Thái Binh</option>
														</select>
													</div>

													<div class="col-md-3" style="margin-top:10px">
														<select name="name_value" class="form-control" id="">
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
											<a  data-toggle="modal" href='#modal-id' class="btn green">Đổi trạng thái</a>
										</div>

										<div class="col-md-4">
											<a href="#" class="btn green">In hóa đơn</a>
										</div>

										<div class="col-md-4">
											<a href="#" class="btn green">Ẩn</a>
										</div>
									</div>
									
								</div>
							</div>

							<div class="row sub-content">
								<table class="table table-striped table-hover table-bordered" id="sample_editable_1"">
									<thead>
										<tr>
											<th><input type="checkbox" class="icheck" /></th>
											<th>Phiên GD</th>
											<th>Mã GD</th>
											<th>Tgian GD</th>
											<th>Tên khách hàng</th>
											<th>Nhóm KH</th>
											<th>SL thuốc</th>
											<th>Giá trị GD</th>
											<th>Trạng thái</th>
											<th>Địa chỉ giao dịch</th>
											<th>Nhà vận chuyển</th>
											<th>Tgian giao dự kiến</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td><input type="checkbox" name="" class="icheck" /></td>
											<td><a href="#">#123</a></td>
											<td><a href="#">#12345</a></td>
											<td>8:50:30 AM 20/07/2017</td>
											<td>Nhà thuốc Liễu Giai</td>
											<td>KH 1</td>
											<td>10</td>
											<td>1.500.000</td>
											<td>Đợi xác nhận</td>
											<td>Số 4 Liễu Giai Ba Đình - Hà Nội</td>
											<td></td>
											<td></td>
										</tr>

										<tr>
											<td><input type="checkbox" name="" class="icheck" /></td>
											<td><a href="#">#123</a></td>
											<td><a href="#">#12346</a></td>
											<td>9:00:25 AM 20/07/2017</td>
											<td>Nhà thuốc Liễu Giai</td>
											<td>KH 1</td>
											<td>10</td>
											<td>1.500.000</td>
											<td>Đợi gom</td>
											<td>Số 4 Liễu Giai Ba Đình - Hà Nội</td>
											<td></td>
											<td></td>
										</tr>

										<tr>
											<td><input type="checkbox" name="" class="icheck" /></td>
											<td><a href="#">#123</a></td>
											<td><a href="#">#12347</a></td>
											<td>9:00:25 AM 20/07/2017</td>
											<td>Nhà thuốc Liễu Giai</td>
											<td>KH 1</td>
											<td>10</td>
											<td>1.500.000</td>
											<td>Đợi chia</td>
											<td>Số 4 Liễu Giai Ba Đình - Hà Nội</td>
											<td></td>
											<td></td>
										</tr>

										<tr>
											<td><input type="checkbox" name="" class="icheck" /></td>
											<td><a href="#">#123</a></td>
											<td><a href="#">#12348</a></td>
											<td>9:00:25 AM 20/07/2017</td>
											<td>Nhà thuốc Liễu Giai</td>
											<td>KH 2</td>
											<td>10</td>
											<td>1.500.000</td>
											<td>Đợi gửi hàng</td>
											<td>Số 4 Liễu Giai Ba Đình - Hà Nội</td>
											<td></td>
											<td></td>
										</tr>

										<tr>
											<td><input type="checkbox" name="" class="icheck" /></td>
											<td><a href="#">#123</a></td>
											<td><a href="#">#12349</a></td>
											<td>9:00:25 AM 20/07/2017</td>
											<td>Nhà thuốc Liễu Giai</td>
											<td>KH 2</td>
											<td>10</td>
											<td>1.500.000</td>
											<td>Đang giao</td>
											<td>Số 4 Liễu Giai Ba Đình - Hà Nội</td>
											<td>Giaohangnhanh</td>
											<td>16:00 PM 22/07/2017</td>
										</tr>

										<tr>
											<td><input type="checkbox" name="" class="icheck" /></td>
											<td><a href="#">#123</a></td>
											<td><a href="#">#12350</a></td>
											<td>9:00:25 AM 20/07/2017</td>
											<td>Nhà thuốc Liễu Giai</td>
											<td>KH 2</td>
											<td>10</td>
											<td>1.500.000</td>
											<td>Hủy</td>
											<td>Số 4 Liễu Giai Ba Đình - Hà Nội</td>
											<td></td>
											<td></td>
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