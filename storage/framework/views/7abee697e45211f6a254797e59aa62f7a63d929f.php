<?php $__env->startSection('head'); ?>

	<style type="text/css">
		.table { margin-bottom: 0; }
		.panel-heading { padding: 0 15px; }
		.border-red {
			border-style: solid;
			border-width: 5px;
			border-color: red !important;
		}
	</style>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>

  <?php echo $__env->make('back.partials.entete', ['title' => trans('back/comments.dashboard'), 'icone' => 'comment', 'fil' => trans('back/comments.comments')], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

	<div class="row col-lg-12">
		<div class="pull-right"><?php echo $links; ?></div>
	</div>

	<div class="row col-lg-12">
		<?php foreach($comments as $comment): ?>
			<div class="panel <?php echo $comment->seen? 'panel-default' : 'panel-warning'; ?>">
				<div class="panel-heading <?php echo $comment->user->valid? '' : 'border-red'; ?>">
					<table class="table">
						<thead>
							<tr>
								<th class="col-lg-3"><?php echo e(trans('back/comments.author')); ?></th>
								<th class="col-lg-3"><?php echo e(trans('back/comments.date')); ?></th>
								<th class="col-lg-3"><?php echo e(trans('back/comments.post')); ?></th>
								<th class="col-lg-1"><?php echo e(trans('back/comments.valid')); ?></th>
								<th class="col-lg-1"><?php echo e(trans('back/comments.seen')); ?></th>
								<th class="col-lg-1"></th>
							</tr>
						</thead>
						<tbody>
						<tr>
							<td class="text-primary"><strong><?php echo e($comment->user->username); ?></strong></td>
							<td><?php echo e($comment->created_at); ?></td>
							<td><?php echo e($comment->post->title); ?></td>
							<td><?php echo Form::checkbox('valide', $comment->user->id, $comment->user->valid); ?></td>
							<td><?php echo Form::checkbox('seen', $comment->id, $comment->seen); ?></td>
							<td>
									<?php echo Form::open(['method' => 'DELETE', 'route' => ['comment.destroy', $comment->id]]); ?>

										<?php echo Form::destroy(trans('back/comments.destroy'), trans('back/comments.destroy-warning'), 'btn-xs'); ?>

									<?php echo Form::close(); ?>

							</td>
						</tr>
			  		</tbody>
					</table>	
				</div>
				<div class="panel-body">
					<?php echo $comment->content; ?>

				</div> 
			</div>
		<?php endforeach; ?>
	</div>

  <div class="row col-lg-12">
    <div class="pull-right"><?php echo $links; ?></div>
  </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

	<script>
		
		
		$(function() {

			// Seen gestion
			$(":checkbox[name='seen']").change(function() {     
				$(this).parents('.panel').toggleClass('panel-warning').toggleClass('panel-default');
				$(this).hide().parent().append('<i class="fa fa-refresh fa-spin"></i>');
				var token = $('input[name="_token"]').val();
				$.ajax({
					url: 'commentseen/' + this.value,
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
					alert('<?php echo e(trans('back/comments.fail')); ?>');
				});
			});

			// Gestion de valide
			$(":checkbox[name='valide']").change(function() { 
				var cases = $(":checkbox[name='valide'][value='" + this.value + "']");
				cases.prop('checked', this.checked);
				cases.parents('.panel-heading').toggleClass('border-red');
				cases.hide().parent().append('<i class="fa fa-refresh fa-spin"></i>');
				var token = $('input[name="_token"]').val();
				$.ajax({
					url: '<?php echo url('uservalid'); ?>' + '/' + this.value,
					type: 'PUT',
					data: "valid=" + this.checked + "&_token=" + token
				})
				.done(function() {
					$('.fa-spin').remove();
					$('input[type="checkbox"]:hidden').show();
				})
				.fail(function() {
					$('.fa-spin').remove();
					var cases = $('input[type="checkbox"]:hidden');
					cases.parents('.panel-heading').toggleClass('border-red'); 
					cases.show().prop('checked', cases.is(':checked') ? null:'checked');
					alert('<?php echo e(trans('back/comments.fail')); ?>');
				});
			});

		});

	</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('back.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>