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
    <td>{!! link_to('customer/' . $post->id, $post->code) !!}</td>
    <td>{{ $post->name }}</td>
    <td>{{ $post->phone }}</td>
    <td><?php foreach($pharmacies as $gd) { ?>
      <?php if(isset($post->pharmacieId) && $post->pharmacieId == $gd['id']){ ?>
      {!! link_to('pharmacies/' . $gd['id'], $gd['name']) !!}
      <?php
      }else{echo '';} ?>
      <?php   }  ?></td>
    <td>
      <?php echo getLastLog($dataLog,$post->id); ?>
    </td>
    <td>{!! Form::checkbox('status', $post->id, $post->status) !!}</td>
    <td>
    {!! Form::open(['method' => 'DELETE', 'route' => ['customer.destroy', $post->id]]) !!}
      {!! Form::destroy('Xóa', 'Xác nhận xóa?') !!}
    {!! Form::close() !!}
    </td>
  </tr>
@endforeach

