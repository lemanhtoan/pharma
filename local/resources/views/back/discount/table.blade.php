@foreach ($posts as $post)
  <tr>
    <td>{!! $post->name !!}</td>
    <td>Mức: {{ $post->level }}</td>
    <td>{{ $post->from }}(triệu vnđ)</td>
    <td>{{ $post->to }}(triệu vnđ)</td>
    <td>{{ $post->percent }}%</td>
    <td>{!! link_to_route('discount.edit', 'Sửa', [$post->id], ['class' => 'btn btn-warning btn-block']) !!}</td>
    <td>
    {!! Form::open(['method' => 'DELETE', 'route' => ['customer.destroy', $post->id]]) !!}
      {!! Form::destroy('Xóa', 'Xác nhận xóa?') !!}
    {!! Form::close() !!}
    </td>
  </tr>
@endforeach

