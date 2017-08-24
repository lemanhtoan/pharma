@foreach ($posts as $post)
  <tr>
    <td>{{ $post->name }}</td>
    <td>{{ $post->note }}</td>

    <td class="change_info">{!! link_to('shipping/' . $post->id, 'Chi tiết', ['class' => 'btn btn-success btn-block btn']) !!}

    {!! link_to_route('shipping.edit', 'Sửa', [$post->id], ['class' => 'btn btn-warning btn-block']) !!}
    
    {!! Form::open(['method' => 'DELETE', 'route' => ['shipping.destroy', $post->id]]) !!}
      {!! Form::destroy('Xóa', 'Xác nhận xóa?') !!}
    {!! Form::close() !!}
    </td>
  </tr>
@endforeach

