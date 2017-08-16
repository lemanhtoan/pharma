<?php foreach($posts as $post): ?>
  <tr <?php echo !$post->status && session('statut') == 'admin'? 'class="warning"' : ''; ?>>
    <td><?php echo link_to('mind/' . $post->id, $post->code); ?></td>
    <td><?php echo e($post->name); ?></td>
    <td>
        <?php if (count($post->mind_drugs)) { }?>
        -20-
    </td>
    <td>
      <p>Nhóm KH 1: <?php echo $post->discount_cg1; ?></p>
      <p>Nhóm KH 2: <?php echo $post->discount_cg2; ?></p>
    </td>
    <td><?php echo e($post->start_time); ?></td>
    <td><?php echo e($post->end_time); ?></td>
    <td><?php echo Form::checkbox('status', $post->id, $post->status); ?></td>
    <td><?php echo link_to_route('mind.edit', 'Sửa', [$post->id], ['class' => 'btn btn-warning btn-block']); ?></td>
    <td>
    <?php echo Form::open(['method' => 'DELETE', 'route' => ['mind.destroy', $post->id]]); ?>

      <?php echo Form::destroy('Xóa', 'Xác nhận xóa?'); ?>

    <?php echo Form::close(); ?>

    </td>
  </tr>
<?php endforeach; ?>

