@foreach ($posts as $post)
  <tr {!! !$post->status && session('statut') == 'admin'? 'class="warning"' : '' !!}>
    <td>{!! link_to('groupdrug/' . $post->id, $post->code) !!}</td>
    <td>{{ $post->short_name }}</td>
    <td>{{ $post->full_name }}</td>
    <th>
      <?php if(count($drugs)) : ?>
        <?php $i = 0; foreach($drugs as $item) { ?>
        <?php if ($item->group_drug_id == $post->id) {$i++;}?>

      <?php } echo $i; endif; ?>
    </th>
    <td>
      <div class="onoffswitch">
        <input type="checkbox" value="<?php echo $post->id?>" name="status" id="myonoffswitch-<?php echo $post->id?>" class="onoffswitch-checkbox" <?php if ($post->status == '1') {echo 'checked="checked"';} else {echo '';} ?>>
        <label class="onoffswitch-label" for="myonoffswitch-<?php echo $post->id?>">
          <span class="onoffswitch-inner"></span>
          <span class="onoffswitch-switch"></span>
        </label>
      </div>
    </td>
    <td class="change_info">

    {!! link_to_route('groupdrug.edit', 'Sửa', [$post->id], ['class' => 'btn btn-warning btn-block']) !!}
    
    {!! Form::open(['method' => 'DELETE', 'route' => ['groupdrug.destroy', $post->id]]) !!}
      {!! Form::destroy('Xóa', 'Xác nhận xóa?') !!}
    {!! Form::close() !!}
    </td>
  </tr>
@endforeach

