<?php $__env->startSection('form'); ?>
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">
				Thêm phiên giao dịch
			</h1>
		</div>
	</div>
	<?php echo Form::open(['url' => 'mind', 'method' => 'post', 'class' => 'form-horizontal panel']); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('back.mind.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>