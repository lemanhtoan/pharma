@foreach ($posts as $post)
  <tr>
    <td>{!! link_to('discount/' . $post->id, $post->name) !!}</td>
    <td>Mức: {{ $post->level }}</td>
    <td><?php echo number_format($post->from) ?></td>
    <td><?php echo number_format($post->to) ?></td>
    <td><?php if ($post->type == 'Cố định') {echo number_format($post->value);}else {echo $post->value .' (%)';}?></td>
    <td>{{ $post->type }}</td>
    <td class="change_info">{!! link_to_route('discount.edit', 'Sửa', [$post->id], ['class' => 'btn btn-warning btn-block']) !!}
    
    {!! Form::open(['method' => 'DELETE', 'route' => ['discount.destroy', $post->id]]) !!}
      {!! Form::destroy('Xóa', 'Xác nhận xóa?') !!}
    {!! Form::close() !!}
    </td>
  </tr>
@endforeach

