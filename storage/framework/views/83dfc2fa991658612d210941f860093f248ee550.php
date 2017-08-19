<?php $__env->startSection('head'); ?>

<style type="text/css">
  
  .badge {
    padding: 1px 8px 1px;
    background-color: #aaa !important;
  }

</style>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>

  <?php echo $__env->make('back.partials.entete', ['title' => trans('back/users.dashboard') . link_to_route('user.create', trans('back/users.add'), [], ['class' => 'btn btn-info pull-right']), 'icone' => 'user', 'fil' => trans('back/users.users')], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
 
  <div id="tri" class="btn-group btn-group-sm">
    <a href="<?php echo url('user'); ?>" type="button" name="total" class="btn btn-default <?php echo e(classActiveOnlyPath('user')); ?>"><?php echo e(trans('back/users.all')); ?> 
      <span class="badge"><?php echo e($counts['total']); ?></span>
    </a>
    <?php foreach($roles as $role): ?>
      <a href="<?php echo url('user/sort/' . $role->slug); ?>" type="button" name="<?php echo $role->slug; ?>" class="btn btn-default <?php echo e(classActiveOnlySegment(3, $role->slug)); ?>"><?php echo e($role->title . 's'); ?> 
        <span class="badge"><?php echo e($counts[$role->slug]); ?></span>
      </a>
    <?php endforeach; ?>
  </div>

	<?php if(session()->has('ok')): ?>
    <?php echo $__env->make('partials/error', ['type' => 'success', 'message' => session('ok')], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php endif; ?>

  <div class="pull-right link"><?php echo $links; ?></div>

	<div class="table-responsive">
		<table class="table">
			<thead>
				<tr>
					<th><?php echo e(trans('back/users.name')); ?></th>
					<th><?php echo e(trans('back/users.role')); ?></th>
					<th><?php echo e(trans('back/users.seen')); ?></th>
					<th></th>
					<th></th>
				</tr>
			</thead>
			<tbody>
			  <?php echo $__env->make('back.users.table', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
      </tbody>
		</table>
	</div>

	<div class="pull-right link"><?php echo $links; ?></div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

  <script>
    
    $(function() {

      // Seen gestion
      $(document).on('change', ':checkbox', function() {    
        $(this).parents('tr').toggleClass('warning');
        // $(this).hide().parent().append('<i class="fa fa-refresh fa-spin"></i>');
        var token = $('input[name="_token"]').val();
        $.ajax({
          url: '<?php echo url('userseen'); ?>' + '/' + this.value,
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
          chk.show().prop('checked', chk.is(':checked') ? null:'checked').parents('tr').toggleClass('warning');
          alert('<?php echo e(trans('back/users.fail')); ?>');
        });
      });

    });

  </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('back.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>