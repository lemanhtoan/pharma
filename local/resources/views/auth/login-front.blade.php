@extends('front.template')
<?php
if ( Auth::check() ) {
    $url = url('/');
    header( "Location: $url" );
    die();
}
?>

@section('main')
	<div class="row">
		<div class="box-login">
			<h2 class="intro-text"><span class="glyphicon glyphicon-user"></span>  Đăng nhập</h2>
			<div class="box-wrap">
				<div class="box-wrap-border">
					{!! Form::open(['url' => 'auth/login', 'method' => 'post', 'role' => 'form']) !!}

					@if(session()->has('error'))
						@include('partials/error', ['type' => 'danger', 'message' => session('error')])
					@endif

					<div class="item-row">
						<label for="log" class="control-label">Tài khoản</label>
						<input class="form-control inp-username" placeholder="0123456789" name="log" type="text" id="log">
						<img class="icon-clear clr-username" src="{!!url('/images/login_03.png')!!}" alt="">
					</div>

					<div class="item-row">
						<label for="log" class="control-label">Mật khẩu</label>
						<input class="form-control inp-password" placeholder="********" name="password" type="password" id="password">
						<img class="icon-clear clr-password" src="{!!url('/images/login_03.png')!!}" alt="">
					</div>

					<input class="btn btn-default" type="submit" value="Đăng nhập">

					<p class="notes">
						<?php $dataHotline = DB::table('settings')->where('name', 'dataHotline')->select('content')->get()[0]; ?>
						Vui lòng gọi <?php echo $dataHotline->content;?> nếu quý khách không thể đăng nhập hoặc quên mật khẩu.
					</p>
					{!! Form::close() !!}
				</div>
			</div>
		</div>

	</div>
@stop

