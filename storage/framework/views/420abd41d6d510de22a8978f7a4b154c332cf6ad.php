<?php $__env->startSection('main'); ?>
	<div class="row">
		<div class="box">
			<div class="col-lg-12">
				<hr>	
				<h2 class="intro-text text-center"><?php echo e(trans('front/register.title')); ?></h2>
				<hr>
				<p><?php echo e(trans('front/register.infos')); ?></p>		

				<?php echo Form::open(['url' => 'auth/register', 'method' => 'post', 'role' => 'form']); ?>	

					<div class="row">
						<?php echo Form::control('text', 6, 'username', $errors, trans('front/register.pseudo'), null, [trans('front/register.warning'), trans('front/register.warning-name')]); ?>

						<?php echo Form::control('email', 6, 'email', $errors, trans('front/register.email')); ?>

					</div>
					<div class="row">	
						<?php echo Form::control('password', 6, 'password', $errors, trans('front/register.password'), null, [trans('front/register.warning'), trans('front/register.warning-password')]); ?>

						<?php echo Form::control('password', 6, 'password_confirmation', $errors, trans('front/register.confirm-password')); ?>

					</div>
					<?php echo Form::text('address', '', ['class' => 'hpet']); ?>	

					<div class="row">	
						<?php echo Form::submit(trans('front/form.send'), ['col-lg-12']); ?>

					</div>
					
				<?php echo Form::close(); ?>


			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

	<script>
		$(function() { $('.badge').popover();	});
	</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>