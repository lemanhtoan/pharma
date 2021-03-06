@foreach ($posts as $post)
  <tr  <?php if(!$post->status && session('statut')) { echo "class='row-change warning row-change-$post->id'";} else { echo "class='row-change row-change-$post->id'";} ?>>
    <td align="center"><input type="checkbox" class="case" name="case[]" value="<?php echo $post->id;?>"/></td>
    <td><b>{!! link_to('pharmacies/' . $post->id, $post->code) !!}</b></td>
    <td><b>{{ $post->name }}</b></td>
    <td>{{ $post->pharmacieType }}</td>
    <td>{{ $post->address }}</td>
    <td>{{ $post->district }}</td>
    <td>{{ $post->province }}</td>
    <td><b>{{ $post->phone }}</b></td>
    <td><span class="status_<?php echo $post->id?>">
      <div class="onoffswitch">
        <input type="checkbox" value="<?php echo $post->id?>" name="status" id="myonoffswitch-<?php echo $post->id?>" class="onoffswitch-checkbox" <?php if ($post->status == '1') {echo 'checked="checked"';} else {echo '';} ?>>
        <label class="onoffswitch-label" for="myonoffswitch-<?php echo $post->id?>">
          <span class="onoffswitch-inner"></span>
          <span class="onoffswitch-switch"></span>
        </label>
      </div>
      </span></td>
    <td class="change_info">{!! link_to_route('pharmacies.edit', 'Sửa', [$post->id], ['class' => 'btn btn-warning btn-block']) !!}

    {!! Form::open(['method' => 'DELETE', 'route' => ['pharmacies.destroy', $post->id]]) !!}
      {!! Form::destroy('Xóa', 'Xác nhận xóa?') !!}
    {!! Form::close() !!}
    </td>
  </tr>
@endforeach

