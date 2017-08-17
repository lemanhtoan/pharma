<?php $__env->startSection('head'); ?>

  <?php echo HTML::style('ckeditor/plugins/codesnippet/lib/highlight/styles/monokai.css'); ?>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>
	<div class="row">
		<div class="box">
			<div class="col-lg-12">
				<hr>
				<h2 class="text-center"><?php echo e($post->title); ?>

				<br>
				<small><?php echo e($post->user->username); ?> <?php echo e(trans('front/blog.on')); ?> <?php echo $post->created_at . ($post->created_at != $post->updated_at ? trans('front/blog.updated') . $post->updated_at : ''); ?></small>
				</h2>
				<hr>
				<?php echo $post->summary; ?><br>
				<?php echo $post->content; ?>

				<hr>
				<?php if($post->tags->count()): ?>
					<div class="text-center">
						<?php if($post->tags->count() > 0): ?>
							<small><?php echo e(trans('front/blog.tags')); ?></small> 
							<?php foreach($post->tags as $tag): ?>
								<?php echo link_to('blog/tag?tag=' . $tag->id, $tag->tag, ['class' => 'btn btn-default btn-xs']); ?>

							<?php endforeach; ?>
						<?php endif; ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="box">
			<div class="col-lg-12">
				<div class="col-lg-12">
					<hr>
					<h3 class="text-center"><?php echo e(trans('front/blog.comments')); ?></h3>
					<hr>

					<?php if($comments->count()): ?>
						<?php foreach($comments as $comment): ?>
							<div class="commentitem">
								<h3>
									<small><?php echo e($comment->user->username . ' ' . trans('front/blog.on') . ' ' . $comment->created_at); ?></small>
									<?php if($user && $user->username == $comment->user->username): ?> 
										<a id="deletecomment<?php echo $comment->id; ?>" href="#" class="deletecomment"><span class="fa fa-fw fa-trash pull-right" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('front/blog.delete')); ?>"></span></a>
										<a id="comment<?php echo $comment->id; ?>" href="#" class="editcomment"><span class="fa fa-fw fa-pencil pull-right" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('front/blog.edit')); ?>"></span></a>
									<?php endif; ?>
								</h3>
								<div id="contenu<?php echo $comment->id; ?>"><?php echo $comment->content; ?></div>
								<hr>
							</div>
						<?php endforeach; ?>
					<?php endif; ?>	

					<div class="row" id="formcreate"> 
						<?php if(session()->has('warning')): ?>
							<?php echo $__env->make('partials/error', ['type' => 'warning', 'message' => session('warning')], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
						<?php endif; ?>	
						<?php if(session('statut') != 'visitor'): ?>
							<?php echo Form::open(['url' => 'comment']); ?>	
								<?php echo Form::hidden('post_id', $post->id); ?>

								<?php echo Form::control('textarea', 12, 'comments', $errors, trans('front/blog.comment')); ?>

								<?php echo Form::submit(trans('front/form.send'), ['col-lg-12']); ?>

							<?php echo Form::close(); ?>

						<?php else: ?>
							<div class="text-center"><i class="text-center"><?php echo e(trans('front/blog.info-comment')); ?></i></div>
						<?php endif; ?>
					</div>

				</div>
			</div>
		</div>
	</div>

</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

	<?php echo HTML::script('ckeditor/plugins/codesnippet/lib/highlight/highlight.pack.js'); ?>


	<?php if(session('statut') != 'visitor'): ?>
		<?php echo HTML::script('ckeditor/ckeditor.js'); ?>

	<?php endif; ?>

	<script>	  

		<?php if(session('statut') != 'visitor'): ?>

			CKEDITOR.replace('comments', {
				language: '<?php echo e(config('app.locale')); ?>',
				height: 200,
				toolbarGroups: [
					{ name: 'basicstyles', groups: [ 'basicstyles'] }, 
					{ name: 'links' },
					{ name: 'insert' }
				],
				removeButtons: 'Table,SpecialChar,HorizontalRule,Anchor'
			});

			function buttons(i) {
				return "<input id='val" + i +"' class='btn btn-default' type='submit' value='<?php echo e(trans('front/blog.valid')); ?>'><input id='btn" + i + "' class='btn btn-default btnannuler' type='button' value='<?php echo e(trans('front/blog.undo')); ?>'></div>";
			}

			$(function() {

				$('a.editcomment span').tooltip();
				$('a.deletecomment span').tooltip();

				// Set comment edition
				$('a.editcomment').click(function(e) {   
					e.preventDefault();
					$(this).hide();
					var i = $(this).attr('id').substring(7);
					var existing = $('#contenu' + i).html();
					var url = $('#formcreate').find('form').attr('action');
					jQuery.data(document.body, 'comment' + i, existing);
					var html = "<div class='row'><form id='form" + i + "' method='POST' action='" + url + '/' + i + "' accept-charset='UTF-8' class='formajax'><input name='_token' type='hidden' value='" + $('input[name="_token"]').val() + "'><div class='form-group col-lg-12 '><label for='comments' class='control-label'><?php echo e(trans('front/blog.change')); ?></label><textarea id='cont" + i +"' class='form-control' name='comments" + i + "' cols='50' rows='10' id='comments" + i + "'>" + existing + "</textarea><small class='help-block'></small></div><div class='form-group col-lg-12'>" + buttons(i) + "</div>";
					$('#contenu' + i).html(html);
					CKEDITOR.replace('comments' + i, {
						language: '<?php echo e(config('app.locale')); ?>',
						height: 200,
						toolbarGroups: [
							{ name: 'basicstyles', groups: [ 'basicstyles'] }, 
							{ name: 'links' },
							{ name: 'insert' }
						],
						removeButtons: 'Table,SpecialChar,HorizontalRule,Anchor'
					});
				});

				// Escape edition
				$(document).on('click', '.btnannuler', function() {    
					var i = $(this).attr('id').substring(3);
					$('#comment' + i).show();
					$('#contenu' + i).html(jQuery.data(document.body, 'comment' + i));
				});

				// Validation 
				$(document).on('submit', '.formajax', function(e) {  
					e.preventDefault();
					var i = $(this).attr('id').substring(4);
					$('#val' + i).parent().html('<i class="fa fa-refresh fa-spin fa-2x"></i>').addClass('text-center');
					$.ajax({
						method: 'put',
						url: $(this).attr('action'),
						data: $(this).serialize()
					})
					.done(function(data) {
						$('#comment' + data.id).show();
						$('#contenu' + data.id).html(data.content);	
					})
					.fail(function(data) {
						var errors = data.responseJSON;
						$.each(errors, function(index, value) {
							$('textarea[name="' + index + '"]' + ' ~ small').text(value);
							$('textarea[name="' + index + '"]').parent().addClass('has-error');
							$('.fa-spin').parent().html(buttons(index.slice(-1))).removeClass('text-center');
						});
					});
				});

				// Delete comment
				$('a.deletecomment').click(function(e) {   
					e.preventDefault();		
					if (!confirm('<?php echo e(trans('front/blog.confirm')); ?>')) return;	
					var i = $(this).attr('id').substring(13);
					var token = $('input[name="_token"]').val();
					$(this).replaceWith('<i class="fa fa-refresh fa-spin pull-right"></i>');
					$.ajax({
						method: 'delete',
						url: '<?php echo url('comment'); ?>' + '/' + i,
						data: '_token=' + token
					})
					.done(function(data) {
						$('#comment' + data.id).parents('.commentitem').remove();
					})
					.fail(function() {
						alert('<?php echo e(trans('front/blog.fail-delete')); ?>');
					});					
				});

			});

		<?php endif; ?>

		hljs.initHighlightingOnLoad();

	</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>