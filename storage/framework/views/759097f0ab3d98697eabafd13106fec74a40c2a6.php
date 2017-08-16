          <?php foreach($posts as $post): ?>
            <tr <?php echo !$post->seen && session('statut') == 'admin'? 'class="warning"' : ''; ?>>
              <td class="text-primary"><strong><?php echo e($post->title); ?></strong></td>
              <td><?php echo e($post->created_at); ?></td> 
              <td><?php echo Form::checkbox('active', $post->id, $post->active); ?></td>
              <?php if(session('statut') == 'admin'): ?>
                <td><?php echo e($post->username); ?></td>
                <td><?php echo Form::checkbox('seen', $post->id, $post->seen); ?></td>
              <?php endif; ?>
              <td><?php echo link_to('blog/' . $post->slug, trans('back/blog.see'), ['class' => 'btn btn-success btn-block btn']); ?></td>
              <td><?php echo link_to_route('blog.edit', trans('back/blog.edit'), [$post->id], ['class' => 'btn btn-warning btn-block']); ?></td>
              <td>
              <?php echo Form::open(['method' => 'DELETE', 'route' => ['blog.destroy', $post->id]]); ?>

                <?php echo Form::destroy(trans('back/blog.destroy'), trans('back/blog.destroy-warning')); ?>

              <?php echo Form::close(); ?>

              </td>
            </tr>
          <?php endforeach; ?>