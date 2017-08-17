	<?php foreach($users as $user): ?>
		<tr <?php echo !$user->seen? 'class="warning"' : ''; ?>>
			<td class="text-primary"><strong><?php echo e($user->username); ?></strong></td>
			<td><?php echo e($user->role->title); ?></td>
			<td><?php echo Form::checkbox('seen', $user->id, $user->seen); ?></td>
			<td><?php echo link_to_route('user.show', trans('back/users.see'), [$user->id], ['class' => 'btn btn-success btn-block btn']); ?></td>
			<td><?php echo link_to_route('user.edit', trans('back/users.edit'), [$user->id], ['class' => 'btn btn-warning btn-block']); ?></td>
			<td>
				<?php echo Form::open(['method' => 'DELETE', 'route' => ['user.destroy', $user->id]]); ?>

				<?php echo Form::destroy(trans('back/users.destroy'), trans('back/users.destroy-warning')); ?>

				<?php echo Form::close(); ?>

			</td>
		</tr>
	<?php endforeach; ?>