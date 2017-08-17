<?php $__env->startSection('form'); ?>
	<?php echo Form::model($post, ['route' => ['blog.update', $post->id], 'method' => 'put', 'class' => 'form-horizontal panel']); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('back.blog.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>