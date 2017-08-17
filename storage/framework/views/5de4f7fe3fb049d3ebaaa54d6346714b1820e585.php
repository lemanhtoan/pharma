<?php $__env->startSection('main'); ?>

	<!-- Entête de page -->
	<?php echo $__env->make('back.partials.entete', ['title' => trans('back/users.dashboard'), 'icone' => 'user', 'fil' => link_to('user', trans('back/users.Users')) . ' / ' . trans('back/users.edition')], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

	<div class="col-sm-12">
		<?php echo Form::model($user, ['route' => ['user.update', $user->id], 'method' => 'put', 'class' => 'form-horizontal panel']); ?>

			<?php echo Form::control('text', 0, 'username', $errors, trans('back/users.name')); ?>

			<?php echo Form::control('email', 0, 'email', $errors, trans('back/users.email')); ?>

			<?php echo Form::selection('role', $select, $user->role_id, trans('back/users.role')); ?>

			<?php echo Form::checkHorizontal('confirmed', trans('back/users.confirmed'), $user->confirmed); ?>

			<?php echo Form::submit(trans('front/form.send')); ?>

		<?php echo Form::close(); ?>

	</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('back.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>