@foreach ($posts as $post)
  <tr {!! !$post->status && session('statut') == 'admin'? 'class="warning"' : '' !!}>
    <td>{!! link_to('drug/' . $post->id, $post->code) !!}</td>
    <td>{{ $post->name }}</td>
    <td>{{ $post->activeIngredient }}</td>
    <td>
      <?php foreach($groupdrug as $gd) { ?>
      <?php if(isset($post->group_drug_id) && $post->group_drug_id == $gd['id']){ ?>
      {!! link_to('groupdrug/' . $gd['id'], $gd['full_name']) !!}
      <?php
      }else{echo '';} ?>
      <?php   }  ?>
    </td>
    <td>{{ $post->content }}</td>
    <td>{{ $post->package }}</td>
    <td>{{ $post->produceCompany }}</td>
    <td>
      <div class="onoffswitch">
        <input type="checkbox" value="<?php echo $post->id?>" name="status" id="myonoffswitch-<?php echo $post->id?>" class="onoffswitch-checkbox" <?php if ($post->status == '1') {echo 'checked="checked"';} else {echo '';} ?>>
        <label class="onoffswitch-label" for="myonoffswitch-<?php echo $post->id?>">
          <span class="onoffswitch-inner"></span>
          <span class="onoffswitch-switch"></span>
        </label>
      </div>
    </td>
    <td class="change_info">{!! link_to_route('drug.edit', 'Sửa', [$post->id], ['class' => 'btn btn-warning btn-block']) !!}
    
      {!! Form::open(['method' => 'DELETE', 'route' => ['drug.destroy', $post->id]]) !!}
      {!! Form::destroy('Xóa', 'Xác nhận xóa?') !!}
      {!! Form::close() !!}
    </td>
  </tr>
@endforeach
