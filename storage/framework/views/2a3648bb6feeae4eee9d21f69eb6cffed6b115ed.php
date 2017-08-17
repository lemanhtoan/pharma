<?php $__env->startSection('form'); ?>
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">
				Thêm thuốc mới
			</h1>
		</div>
	</div>

	<?php echo Form::open(['url' => 'drug', 'method' => 'post', 'class' => 'form-horizontal panel', 'files' => true]); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('back.drug.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>