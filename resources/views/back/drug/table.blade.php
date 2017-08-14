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
    <td>{!! Form::checkbox('status', $post->id, $post->status) !!} </td>
    <td>{!! link_to_route('drug.edit', 'Sửa', [$post->id], ['class' => 'btn btn-warning btn-block']) !!}</td>
    <td>
      {!! Form::open(['method' => 'DELETE', 'route' => ['drug.destroy', $post->id]]) !!}
      {!! Form::destroy('Xóa', 'Xác nhận xóa?') !!}
      {!! Form::close() !!}
    </td>
  </tr>
@endforeach
