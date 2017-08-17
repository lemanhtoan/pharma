<?php foreach($posts as $post): ?>
  <tr <?php echo !$post->status && session('statut') == 'admin'? 'class="warning"' : ''; ?>>
    <td><?php echo e($post->code); ?></td>
    <td><?php echo e($post->short_name); ?></td>
    <td><?php echo e($post->full_name); ?></td>
    <td><?php echo Form::checkbox('status', $post->id, $post->status); ?></td>
    <td><?php echo link_to('groupdrug/' . $post->id, 'Chi tiết', ['class' => 'btn btn-success btn-block btn']); ?></td>
    <td><?php echo link_to_route('groupdrug.edit', 'Sửa', [$post->id], ['class' => 'btn btn-warning btn-block']); ?></td>
    <td>
    <?php echo Form::open(['method' => 'DELETE', 'route' => ['groupdrug.destroy', $post->id]]); ?>

      <?php echo Form::destroy('Xóa', 'Xác nhận xóa?'); ?>

    <?php echo Form::close(); ?>

    </td>
  </tr>
<?php endforeach; ?>

