@extends('front.template')

@section('main')

<?php 
// check login or not
if ( !Auth::check() ) {
    $url = 'auth/login';
    header( "Location: $url" );
    die();
} else {
	$user = Auth::user()->id;
}
?>
	<?php if ($content != 'Không được phép truy cập') {
		?>
   
   <form action="{!!url('/updateProfile')!!}" method="POST"  class='profile-form' accept-charset="utf-8">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <input type="hidden" name="user_id" value="<?php echo $user?>">

        <h2 class="intro-text"><span class="glyphicon glyphicon-user"></span>  Tài khoản</h2>
        
        <?php if (isset($message)) : ?>
		    <div class="row">
		        <div class="alert alert-success alert-dismissable">
		          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		          <strong>{!! $message !!}</strong>
		        </div>
		    </div>
	    <?php endif;?>

        <div class="item-row">
			<label for="log" class="control-label">Tài khoản</label>
			<input readonly="readonly
			" class="form-control inp-username" placeholder="Tài khoản" name="username" type="text" id="username" value="<?php if(isset($content)) {echo $content->phone;}else{echo '';}?>">
		</div>

		<div class="item-row">
			<label for="log" class="control-label">Mật khẩu</label>
			<input class="form-control inp-password" placeholder="********" name="password" type="password" id="password">
			<img class="icon-clear clr-password" src="{!!url('/images/thong_tin_user_03.png')!!}" alt="">
		</div>

		<div class="item-row">
			<label for="log" class="control-label">Địa chỉ </label>
			<input class="form-control" readonly="readonly
			" placeholder="Địa chỉ" name="address" type="text" id="address" value="<?php if(isset($content)) {echo $content->address;}else{echo '';}?>">
		</div>

		<div class="item-row">
			<label for="log" class="control-label">Điện thoại</label>
			<input value="<?php if(isset($content)) {echo $content->phone;}else{echo '';}?>" class="form-control inp-password" placeholder="0123456789" name="phone" type="text" id="phone">
			<img class="icon-clear clr-phone" src="{!!url('/images/thong_tin_user_03.png')!!}" alt="">
		</div>

		<div class="item-row">
			<label for="log" class="control-label">Email</label>
			<input value="<?php if(isset($content)) {echo $content->email;}else{echo '';}?>" class="form-control inp-password" placeholder="Email" name="email" type="email" id="email">
			<img class="icon-clear clr-email" src="{!!url('/images/thong_tin_user_03.png')!!}" alt="">
		</div>

        <div class="row">
            <button type="submit" class="btn btn-continue pull-left">Cập nhật</button>
        </div>
    </form>
    <?php } else { echo $content;} ?>

<style type="text/css">
	.profile-form {
		width: 60%;
	}
	.profile-form .btn-continue {
		margin-left: 10px;
	}
	.profile-form .inp-password {
	    padding-left: 25px;
	}
	.profile-form .form-control[readonly] {
	    background-color: #fff;
	}
</style>
@stop
