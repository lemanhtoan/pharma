<?php
function getLastLog($dataLog, $userID) {
  $data = '';
  $i=0;
  foreach($dataLog as $gd) {
     if($userID == $gd->user_id){
       if ($i++ == 1) break;
       $data = date("h:i d/m/Y", strtotime($gd->created_at));
     }

  }
  return $data;
}
?>

@foreach ($posts as $post)
  <tr {!! !$post->status && session('statut') == 'admin'? 'class="warning"' : '' !!}>
    <td><b>{!! link_to('customer/' . $post->id, $post->code) !!}</b></td>
    <td><b>{{ $post->name }}</b></td>
    <td><b>{{ $post->phone }}</b></td>
    <td><?php foreach($pharmacies as $gd) { ?>
      <?php if(isset($post->pharmacieId) && $post->pharmacieId == $gd['id']){ ?>
      {!! link_to('pharmacies/' . $gd['id'], $gd['name']) !!}
      <?php
      }else{echo '';} ?>
      <?php   }  ?></td>
    <td>
      <?php echo getLastLog($dataLog,$post->id); ?>
    </td>
    <td>
      <div class="onoffswitch">
        <input type="checkbox" value="<?php echo $post->id?>" name="status" id="myonoffswitch-<?php echo $post->id?>" class="onoffswitch-checkbox" <?php if ($post->status == '1') {echo 'checked="checked"';} else {echo '';} ?>>
        <label class="onoffswitch-label" for="myonoffswitch-<?php echo $post->id?>">
          <span class="onoffswitch-inner"></span>
          <span class="onoffswitch-switch"></span>
        </label>
      </div>
    </td>
    <td>
    {!! Form::open(['method' => 'DELETE', 'route' => ['customer.destroy', $post->id]]) !!}
      {!! Form::destroy('Xóa', 'Xác nhận xóa?') !!}
    {!! Form::close() !!}
    </td>
  </tr>
@endforeach

