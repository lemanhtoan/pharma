@foreach ($posts as $post)
  <tr {!! !$post->status && session('statut') == 'admin'? 'class="warning"' : '' !!}>
    <td>{!! link_to('pharmacies/' . $post->id, $post->code) !!}</td>
    <td>{{ $post->name }}</td>
    <td>{{ $post->pharmacieType }}</td>
    <td>{{ $post->address }}</td>
    <td>{{ $post->district }}</td>
    <td>{{ $post->province }}</td>
    <td>{{ $post->phone }}</td>
    <td>{!! Form::checkbox('status', $post->id, $post->status) !!}</td>
    <td>{!! link_to_route('pharmacies.edit', 'Sửa', [$post->id], ['class' => 'btn btn-warning btn-block']) !!}</td>
    <td>
    {!! Form::open(['method' => 'DELETE', 'route' => ['pharmacies.destroy', $post->id]]) !!}
      {!! Form::destroy('Xóa', 'Xác nhận xóa?') !!}
    {!! Form::close() !!}
    </td>
  </tr>
@endforeach

