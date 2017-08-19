<?php $__env->startSection('head'); ?>

	<style type="text/css">
		.table { margin-bottom: 0; }
		.panel-heading { padding: 0 15px; }
	</style>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>

 <!-- Entête de page -->
  <?php echo $__env->make('back.partials.entete', ['title' => trans('back/messages.dashboard'), 'icone' => 'envelope', 'fil' => trans('back/messages.messages')], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

  <?php foreach($messages as $message): ?>
		<div class="panel <?php echo $message->seen? 'panel-default' : 'panel-warning'; ?>">
		  <div class="panel-heading">
				<table class="table">
					<thead>
						<tr>
							<th class="col-lg-1"><?php echo e(trans('back/messages.name')); ?></th>
							<th class="col-lg-1"><?php echo e(trans('back/messages.email')); ?></th>
							<th class="col-lg-1"><?php echo e(trans('back/messages.date')); ?></th>
							<th class="col-lg-1"><?php echo e(trans('back/messages.seen')); ?></th>
							<th class="col-lg-1"></th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="text-primary"><strong><?php echo e($message->name); ?></strong></td>
							<td><?php echo HTML::mailto($message->email, $message->email); ?></a></td>
							<td><?php echo e($message->created_at); ?></td>
							<td><?php echo Form::checkbox('vu', $message->id, $message->seen); ?></td>
							<td>
							<?php echo Form::open(['method' => 'DELETE', 'route' => ['contact.destroy', $message->id]]); ?>

								<?php echo Form::destroy(trans('back/messages.destroy'), trans('back/messages.destroy-warning'), 'btn-xs'); ?>

							<?php echo Form::close(); ?>

							</td>
						</tr>
					</tbody>
				</table>	
			</div>
			<div class="panel-body">
				<?php echo e($message->text); ?>

			</div>
		</div>
	<?php endforeach; ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

	<script>
		
    $(function() {
			$(':checkbox').change(function() {     
				$(this).parents('.panel').toggleClass('panel-warning').toggleClass('panel-default');
				// $(this).hide().parent().append('<i class="fa fa-refresh fa-spin"></i>');
				var token = $('input[name="_token"]').val();
				$.ajax({
					url: 'contact/' + this.value,
					type: 'PUT',
					data: "seen=" + this.checked + "&_token=" + token
				})
				.done(function() {
					$('.fa-spin').remove();
					$('input[type="checkbox"]:hidden').show();
				})
				.fail(function() {
					$('.fa-spin').remove();
					var chk = $('input[type="checkbox"]:hidden');
					chk.parents('.panel').toggleClass('panel-warning').toggleClass('panel-default');
					chk.show().prop('checked', chk.is(':checked') ? null:'checked');
					alert('<?php echo e(trans('back/messages.fail')); ?>');
				});
			});
		});

	</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('back.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>