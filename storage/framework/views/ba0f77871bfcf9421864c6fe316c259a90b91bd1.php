<?php $__env->startSection('head'); ?>

	<?php echo HTML::style('ckeditor/plugins/codesnippet/lib/highlight/styles/default.css'); ?>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>

	<!-- Entête de page -->
	<?php echo $__env->make('back.partials.entete', ['title' => trans('back/blog.dashboard'), 'icone' => 'pencil', 'fil' => link_to('blog', trans('back/blog.posts')) . ' / ' . trans('back/blog.creation')], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

	<div class="col-sm-12">
		<?php echo $__env->yieldContent('form'); ?>

		<div class="form-group checkbox pull-right">
			<label>
				<?php echo Form::checkbox('active'); ?>

				<?php echo e(trans('back/blog.published')); ?>

			</label>
		</div>

		<?php echo Form::control('text', 0, 'title', $errors, trans('back/blog.title')); ?>


		<div class="form-group <?php echo $errors->has('slug') ? 'has-error' : ''; ?>">
			<?php echo Form::label('slug', trans('back/blog.permalink'), ['class' => 'control-label']); ?>

			<?php echo url('/') . '/blog/' . Form::text('slug', null, ['id' => 'permalien']); ?>

			<small class="text-danger"><?php echo $errors->first('slug'); ?></small>
		</div>

		<?php echo Form::control('textarea', 0, 'summary', $errors, trans('back/blog.summary')); ?>

		<?php echo Form::control('textarea', 0, 'content', $errors, trans('back/blog.content')); ?>

		<?php echo Form::control('text', 0, 'tags', $errors, trans('back/blog.tags'), isset($tags)? implode(',', $tags) : ''); ?>


		<?php echo Form::submit(trans('front/form.send')); ?>


		<?php echo Form::close(); ?>

	</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

	<?php echo HTML::script('ckeditor/ckeditor.js'); ?>

	
	<script>

	var config = {
		codeSnippet_theme: 'Monokai',
		language: '<?php echo e(config('app.locale')); ?>',
		height: 100,
		filebrowserBrowseUrl: '<?php echo url($url); ?>',
		toolbarGroups: [
			{ name: 'clipboard',   groups: [ 'clipboard', 'undo' ] },
			{ name: 'editing',     groups: [ 'find', 'selection', 'spellchecker' ] },
			{ name: 'links' },
			{ name: 'insert' },
			{ name: 'forms' },
			{ name: 'tools' },
			{ name: 'document',	   groups: [ 'mode', 'document', 'doctools' ] },
			{ name: 'others' },
			//'/',
			{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
			{ name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ] },
			{ name: 'styles' },
			{ name: 'colors' }
		]
	};

	CKEDITOR.replace( 'summary', config);

	config['height'] = 400;		

	CKEDITOR.replace( 'content', config);

	$("#title").keyup(function(){
			var str = sansAccent($(this).val());
			str = str.replace(/[^a-zA-Z0-9\s]/g,"");
			str = str.toLowerCase();
			str = str.replace(/\s/g,'-');
			$("#permalien").val(str);        
		});

  </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('back.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>