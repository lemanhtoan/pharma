<?php $__env->startSection('main'); ?>

	<?php echo $__env->make('back.partials.entete', ['title' => trans('back/users.dashboard'), 'icone' => 'user', 'fil' => link_to('user', trans('back/users.Users')) . ' / ' . trans('back/users.card')], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

	<p><?php echo e(trans('back/users.name') . ' : ' .  $user->username); ?></p>
	<p><?php echo e(trans('back/users.email') . ' : ' .  $user->email); ?></p>
	<p><?php echo e(trans('back/users.role') . ' : ' .  $user->role->title); ?></p>
	<p><?php echo e($user->confirmed ? trans('back/users.confirmed') : trans('back/users.not-confirmed')); ?></p>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('back.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>