<?php foreach($posts as $post): ?>
  <tr <?php echo !$post->status && session('statut') == 'admin'? 'class="warning"' : ''; ?>>
    <td><?php echo link_to('pharmacies/' . $post->id, $post->code); ?></td>
    <td><?php echo e($post->name); ?></td>
    <td><?php echo e($post->pharmacieType); ?></td>
    <td><?php echo e($post->address); ?></td>
    <td><?php echo e($post->district); ?></td>
    <td><?php echo e($post->province); ?></td>
    <td><?php echo e($post->phone); ?></td>
    <td><?php echo Form::checkbox('status', $post->id, $post->status); ?></td>
    <td><?php echo link_to_route('pharmacies.edit', 'Sửa', [$post->id], ['class' => 'btn btn-warning btn-block']); ?></td>
    <td>
    <?php echo Form::open(['method' => 'DELETE', 'route' => ['pharmacies.destroy', $post->id]]); ?>

      <?php echo Form::destroy('Xóa', 'Xác nhận xóa?'); ?>

    <?php echo Form::close(); ?>

    </td>
  </tr>
<?php endforeach; ?>

