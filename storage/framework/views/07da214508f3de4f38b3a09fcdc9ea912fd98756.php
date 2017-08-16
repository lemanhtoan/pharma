<?php foreach($posts as $post): ?>
  <tr <?php echo !$post->status && session('statut') == 'admin'? 'class="warning"' : ''; ?>>
    <td><?php echo link_to('drug/' . $post->id, $post->code); ?></td>
    <td><?php echo e($post->name); ?></td>
    <td><?php echo e($post->activeIngredient); ?></td>
    <td>
      <?php foreach($groupdrug as $gd) { ?>
      <?php if(isset($post->group_drug_id) && $post->group_drug_id == $gd['id']){ ?>
      <?php echo link_to('groupdrug/' . $gd['id'], $gd['full_name']); ?>

      <?php
      }else{echo '';} ?>
      <?php   }  ?>
    </td>
    <td><?php echo e($post->content); ?></td>
    <td><?php echo e($post->package); ?></td>
    <td><?php echo e($post->produceCompany); ?></td>
    <td><?php echo Form::checkbox('status', $post->id, $post->status); ?> </td>
    <td><?php echo link_to_route('drug.edit', 'Sửa', [$post->id], ['class' => 'btn btn-warning btn-block']); ?></td>
    <td>
      <?php echo Form::open(['method' => 'DELETE', 'route' => ['drug.destroy', $post->id]]); ?>

      <?php echo Form::destroy('Xóa', 'Xác nhận xóa?'); ?>

      <?php echo Form::close(); ?>

    </td>
  </tr>
<?php endforeach; ?>
