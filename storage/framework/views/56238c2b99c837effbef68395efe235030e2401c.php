<?php $__env->startSection('form'); ?>
	<?php echo Form::open(['url' => 'groupdrug', 'method' => 'post', 'class' => 'form-horizontal panel']); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('back.groupdrug.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>