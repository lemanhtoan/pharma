<?php
if ( Auth::check() ) {
    $url = url('/');
    header( "Location: $url" );
    die();
}
?>

<?php $__env->startSection('main'); ?>
	<div class="row">
		<div class="box-login">
			<h2 class="intro-text"><span class="glyphicon glyphicon-user"></span>  Đăng nhập</h2>
			<div class="box-wrap">
				<div class="box-wrap-border">
					<?php echo Form::open(['url' => 'auth/login', 'method' => 'post', 'role' => 'form']); ?>


					<?php if(session()->has('error')): ?>
						<?php echo $__env->make('partials/error', ['type' => 'danger', 'message' => session('error')], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
					<?php endif; ?>

					<div class="item-row">
						<label for="log" class="control-label">Tài khoản</label>
						<input class="form-control inp-username" placeholder="0123456789" name="log" type="text" id="log">
						<img class="icon-clear clr-username" src="<?php echo url('/images/login_03.png'); ?>" alt="">
					</div>

					<div class="item-row">
						<label for="log" class="control-label">Mật khẩu</label>
						<input class="form-control inp-password" placeholder="********" name="password" type="password" id="password">
						<img class="icon-clear clr-password" src="<?php echo url('/images/login_03.png'); ?>" alt="">
					</div>

					<input class="btn btn-default" type="submit" value="Đăng nhập">

					<p class="notes">
						Vui lòng gọi 090xxxxxxxx nếu quý khách không thể đăng nhập hoặc quên mật khẩu.
					</p>
					<?php echo Form::close(); ?>

				</div>
			</div>
		</div>

	</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('front.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>