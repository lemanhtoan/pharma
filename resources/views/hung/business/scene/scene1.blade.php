@extends('hung.business.index')

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

	.switch{  
        width:45px;  
        height:18px;  
        background:#E5E5E5;  
        z-index:0;  
        margin:0;  
        padding:0;  
        appearance:none;  
        border:none;  
        cursor:pointer;  
        position:relative;  
        border-radius:100px;  
   }  
   .switch:before{  
        content: ' ';  
        position:absolute;  
        left:3px;  
        top:3px;  
        width:45px;  
        height:18px;  
        background:#4cd964;  
        z-index:1;  
        border-radius:95px;  
   }  
   .switch:after{  
        content:' ';  
        width:18px;  
        height:18px;  
        border-radius:86px;
        z-index:2;  
        background:#FFFFFF;  
        position:absolute;  
        transition-duration:500ms;  
        top:1px;  
        left:3px;  
        box-shadow:0 2px 5px #999999;  
   }  
   .switchOn:before{  
        background:#de4141; !important;  
   }  
   .switchOn:after{  
        left:30px;   
   }
   .checker{
   		display: none;
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
								<span class="caption-subject font-green-sharp bold uppercase">Danh sách phiên giao dịch</span>
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
											<a href="#"  class="btn green">Thêm mới</a>
										</div>

										<div class="col-md-4">
											<a href="#" class="btn green">Nhân bản</a>
										</div>
									</div>
									
								</div>
							</div>

							<div class="row sub-content">
								<table class="table table-striped table-hover table-bordered" id="sample_editable_1"">
									<thead>
										<tr>
											<th><input type="checkbox" name="" class="icheck"  /></th>
											<th>Phiền giao dịch</th>
											<th>SL thuốc</th>
											<th>Giá trị tối đa</th>
											<th>Bắt đầu</th>
											<th>Kết thúc</th>
											<th>Trạng thái</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td><input type="checkbox" name="" class="icheck" /></td>
											<td>#1234</td>
											<td>Phiên 1 ngày 20/2/2017</td>
											<td>20</td>
											<td>Nhóm KH1: 500.000<br />Nhóm KH2: 300.000</td>
											<td>20/07/2017</td>
											<td>20/07/2017</td>
											<td><input type="checkbox" name="switch" style="display: none;" class="checkbox" />  
							                     <div class="switch" id="switch"></div> </td>
										</tr>
										<tr>
											<td><input type="checkbox" name="" class="icheck" /></td>
											<td>#1234</td>
											<td>Phiên 1 ngày 20/2/2017</td>
											<td>25</td>
											<td>Nhóm KH1: 500.000<br />Nhóm KH2: 300.000</td>
											<td>20/07/2017</td>
											<td>20/07/2017</td>
											<td>
												<label>
													<input type="checkbox" name="switch" style="display: none;" class="checkbox" />  
								                     <div class="switch switchOn" id="switch"></div>  
							                	</label>
							                </td>
										</tr>
										<tr>
											<td><input type="checkbox" name="" class="icheck" /></td>
											<td>#1234</td>
											<td>Phiên 1 ngày 20/2/2017</td>
											<td>30</td>
											<td>Nhóm KH1: 500.000<br />Nhóm KH2: 300.000</td>
											<td>20/07/2017</td>
											<td>20/07/2017</td>
											<td>
												<label>
													<input type="checkbox" name="switch" style="display: none;" class="checkbox" />  
								                     <div class="switch switchOn" id="switch"></div>  
							                	</label>
							                </td>
										</tr>
										<tr>
											<td><input type="checkbox" name="" class="icheck" /></td>
											<td>#1234</td>
											<td>Phiên 1 ngày 20/2/2017</td>
											<td>35</td>
											<td>Nhóm KH1: 500.000<br />Nhóm KH2: 300.000</td>
											<td>20/07/2017</td>
											<td>20/07/2017</td>
											<td>
												<label>
													<input type="checkbox" name="switch" style="display: none;" class="checkbox" />  
								                     <div class="switch switchOn" id="switch"></div>  
							                	</label>
							                </td>
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