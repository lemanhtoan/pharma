@foreach ($posts as $post)
  <tr {!! !$post->status && session('statut') == 'admin'? 'class="warning"' : '' !!}>
    <td>{{ $post->code }}</td>
    <td>{{ $post->short_name }}</td>
    <td>{{ $post->full_name }}</td>
    <th>
      <?php if(count($drugs)) : ?>
        <?php $i = 0; foreach($drugs as $item) { ?>
        <?php if ($item->group_drug_id == $post->id) {$i++;}?>

      <?php } echo $i; endif; ?>
    </th>
    <td>{!! Form::checkbox('status', $post->id, $post->status) !!}</td>
    <td>{!! link_to('groupdrug/' . $post->id, 'Chi tiết', ['class' => 'btn btn-success btn-block btn']) !!}</td>
    <td>{!! link_to_route('groupdrug.edit', 'Sửa', [$post->id], ['class' => 'btn btn-warning btn-block']) !!}</td>
    <td>
    {!! Form::open(['method' => 'DELETE', 'route' => ['groupdrug.destroy', $post->id]]) !!}
      {!! Form::destroy('Xóa', 'Xác nhận xóa?') !!}
    {!! Form::close() !!}
    </td>
  </tr>
@endforeach

