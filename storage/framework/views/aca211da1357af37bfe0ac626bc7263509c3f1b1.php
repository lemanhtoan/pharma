<?php $__env->startSection('form'); ?>
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Sửa thuốc
            </h1>
        </div>
    </div>

    <?php echo $__env->make('back.partials.back', ['title' => link_to_route('drug.index', 'Quay lại', [], ['class' => 'btn btn-info pull-right'])], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo Form::model($post, ['route' => ['drug.update', $post->id], 'method' => 'put', 'class' => 'form-horizontal panel', 'files' => true]); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('back.drug.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>