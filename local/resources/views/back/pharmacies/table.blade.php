@foreach ($posts as $post)
  <tr  <?php if(!$post->status && session('statut')) { echo "class='row-change warning row-change-$post->id'";} else { echo "class='row-change row-change-$post->id'";} ?>>
    <td align="center"><input type="checkbox" class="case" name="case[]" value="<?php echo $post->id;?>"/></td>
    <td>{!! link_to('pharmacies/' . $post->id, $post->code) !!}</td>
    <td>{{ $post->name }}</td>
    <td>{{ $post->pharmacieType }}</td>
    <td>{{ $post->address }}</td>
    <td>{{ $post->district }}</td>
    <td>{{ $post->province }}</td>
    <td>{{ $post->phone }}</td>
    <td><span class="status_<?php echo $post->id?>">{!! Form::checkbox('status', $post->id, $post->status) !!}</span></td>
    <td>{!! link_to_route('pharmacies.edit', 'Sửa', [$post->id], ['class' => 'btn btn-warning btn-block']) !!}</td>
    <td>
    {!! Form::open(['method' => 'DELETE', 'route' => ['pharmacies.destroy', $post->id]]) !!}
      {!! Form::destroy('Xóa', 'Xác nhận xóa?') !!}
    {!! Form::close() !!}
    </td>
  </tr>
@endforeach

