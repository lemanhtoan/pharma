@foreach ($posts as $post)
  <tr {!! !$post->status && session('statut') == 'admin'? 'class="warning"' : '' !!}>
    <td>{!! link_to('mind/' . $post->id, $post->code) !!}</td>
    <td>{{ $post->name }}</td>
    <td>
        <?php if (count($post->mind_drugs)) { echo count($post->mind_drugs); }?>
    </td>
    <td>
      <p>Nhóm KH 1: {!! $post->discount_cg1 !!}</p>
      <p>Nhóm KH 2: {!! $post->discount_cg2 !!}</p>
    </td>
    <td>{{ $post->start_time }}</td>
    <td>{{ $post->end_time }}</td>
    <td>
      <div class="onoffswitch">
        <input type="checkbox" value="<?php echo $post->id?>" name="status" id="myonoffswitch-<?php echo $post->id?>" class="onoffswitch-checkbox" <?php if ($post->status == '1') {echo 'checked="checked"';} else {echo '';} ?>>
        <label class="onoffswitch-label" for="myonoffswitch-<?php echo $post->id?>">
          <span class="onoffswitch-inner"></span>
          <span class="onoffswitch-switch"></span>
        </label>
      </div>
      </td>
    <td class="change_info">{!! link_to_route('mind.edit', 'Sửa', [$post->id], ['class' => 'btn btn-warning btn-block']) !!}
    {!! Form::open(['method' => 'DELETE', 'route' => ['mind.destroy', $post->id]]) !!}
      {!! Form::destroy('Xóa', 'Xác nhận xóa?') !!}
    {!! Form::close() !!}
    </td>
  </tr>
@endforeach
