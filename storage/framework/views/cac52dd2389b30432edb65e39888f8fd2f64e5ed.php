<?php $__env->startSection('main'); ?>

	<?php echo $__env->make('back.partials.entete', ['title' => trans('back/admin.dashboard'), 'icone' => 'dashboard', 'fil' => trans('back/admin.dashboard')], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

	<div class="row">

		<?php echo $__env->make('back/partials/pannel', ['color' => 'primary', 'icone' => 'envelope', 'nbr' => $nbrMessages, 'name' => trans('back/admin.new-messages'), 'url' => 'contact', 'total' => trans('back/admin.messages')], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

		<?php echo $__env->make('back/partials/pannel', ['color' => 'green', 'icone' => 'user', 'nbr' => $nbrUsers, 'name' => trans('back/admin.new-registers'), 'url' => 'user', 'total' => trans('back/admin.users')], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

		<?php echo $__env->make('back/partials/pannel', ['color' => 'yellow', 'icone' => 'pencil', 'nbr' => $nbrPosts, 'name' => trans('back/admin.new-posts'), 'url' => 'blog', 'total' => trans('back/admin.posts')], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

		<?php echo $__env->make('back/partials/pannel', ['color' => 'red', 'icone' => 'comment', 'nbr' => $nbrComments, 'name' => trans('back/admin.new-comments'), 'url' => 'comment', 'total' => trans('back/admin.comments')], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

	</div>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('back.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>