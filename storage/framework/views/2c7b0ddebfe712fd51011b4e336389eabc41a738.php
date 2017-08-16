<?php $__env->startSection('form'); ?>
    <?php echo $__env->make('back.partials.back', ['title' => link_to_route('groupdrug.index', 'Quay lại', [], ['class' => 'btn btn-info pull-right'])], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo Form::model($post, ['route' => ['groupdrug.update', $post->id], 'method' => 'put', 'class' => 'form-horizontal panel']); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('back.groupdrug.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>