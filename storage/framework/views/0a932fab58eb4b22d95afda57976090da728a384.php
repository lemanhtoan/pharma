<?php
function getLastLog($dataLog, $userID) {
  $data = '';
  $i=0;
  foreach($dataLog as $gd) {
     if($userID == $gd['user_id']){
       if ($i++ == 1) break;
       $data = date("d/m/Y", strtotime($gd['created_at']));
     }

  }
  return $data;
}
?>

<?php foreach($posts as $post): ?>
  <tr <?php echo !$post->status && session('statut') == 'admin'? 'class="warning"' : ''; ?>>
    <td><?php echo link_to('customer/' . $post->id, $post->code); ?></td>
    <td><?php echo e($post->name); ?></td>
    <td><?php echo e($post->phone); ?></td>
    <td><?php foreach($pharmacies as $gd) { ?>
      <?php if(isset($post->pharmacieId) && $post->pharmacieId == $gd['id']){ ?>
      <?php echo link_to('pharmacies/' . $gd['id'], $gd['name']); ?>

      <?php
      }else{echo '';} ?>
      <?php   }  ?></td>
    <td>
      <?php echo getLastLog($dataLog,$post->id); ?>
    </td>
    <td><?php echo Form::checkbox('status', $post->id, $post->status); ?></td>
    <td>
    <?php echo Form::open(['method' => 'DELETE', 'route' => ['customer.destroy', $post->id]]); ?>

      <?php echo Form::destroy('Xóa', 'Xác nhận xóa?'); ?>

    <?php echo Form::close(); ?>

    </td>
  </tr>
<?php endforeach; ?>

