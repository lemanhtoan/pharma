<?php $__env->startSection('head'); ?>

	<?php echo HTML::style('ckeditor/plugins/codesnippet/lib/highlight/styles/default.css'); ?>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>

	<?php echo $__env->make('back.partials.entete', ['title' => 'Nhóm thuốc', 'icone' => 'pencil', 'fil' => link_to('groupdrug', 'Nhóm thuốc') . ' / ' . 'Thêm mới'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

	<div class="col-sm-12">
		<?php echo $__env->yieldContent('form'); ?>
		<div class="form-group">
			<?php echo Form::label('Tên viết tắt'); ?> <em>*</em>
			<?php echo Form::text('short_name', null, array('required', 'class'=>'form-control','placeholder'=>'Tên viết tắt')); ?>

		</div>

		<div class="form-group">
			<?php echo Form::label('Tên đầy đủ'); ?> <em>*</em>
			<?php echo Form::text('full_name', null, array('required', 'class'=>'form-control','placeholder'=>'Tên đầy đủ')); ?>

		</div>

		<div class="form-group">
			<?php echo Form::label('Ghi chú'); ?>

			<?php echo Form::text('note', null, array('class'=>'form-control','placeholder'=>'Ghi chú')); ?>

		</div>

		<div class="form-group">
			<?php echo Form::label('Trạng thái'); ?> <br>
			<?php echo Form::radio('status', '1'); ?> Hoạt động<br>
			<?php echo Form::radio('status', '0'); ?> Khóa
		</div>

		<?php echo Form::submit('Cập nhật'); ?>


		<?php echo Form::close(); ?>

	</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('back.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>