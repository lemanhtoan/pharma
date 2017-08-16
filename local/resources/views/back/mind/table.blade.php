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
    <td>{!! Form::checkbox('status', $post->id, $post->status) !!}</td>
    <td>{!! link_to_route('mind.edit', 'Sửa', [$post->id], ['class' => 'btn btn-warning btn-block']) !!}</td>
    <td>
    {!! Form::open(['method' => 'DELETE', 'route' => ['mind.destroy', $post->id]]) !!}
      {!! Form::destroy('Xóa', 'Xác nhận xóa?') !!}
    {!! Form::close() !!}
    </td>
  </tr>
@endforeach

