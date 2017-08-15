<?php
function getDataTrans($posts, $userId) {
  $data = 'KH 1';
  if(count($posts)) {
    $dataUser = array();
    foreach ($posts as $trans) {
      if ($trans->user_id = $userId) {
        $dataUser = $trans;
      }
    }
    if (count($dataUser)) {
      $i = 0;
      foreach ($dataUser as $dataTran) {
        if ($dataTran['status'] == 'Hoàn thành') {
          $i++;
        }
      }
      if ($i > 3) {
        $data = 'KH 2';
      }
    }
  }
  return $data;
}
?>
@foreach ($posts as $post)
  <tr {!! !$post->status && session('statut') == 'admin'? 'class="warning"' : '' !!}>
    <td align="center"><input type="checkbox" class="case" name="case[]" value="<?php echo $post->id;?>"/></td>
    <td>{!! link_to('transactions/' . $post->id, '#'.$post->id) !!}</td>
    <td><?php echo date("h:i:s d/m/Y", strtotime($post->created_date)); ?></td>
    <td>{{ $post->owner }}</td>
    <td>
      <?php echo getDataTrans($posts, $post->user_id);?>
    </td>
    <td>{{ $post->countQty }}</td>
    <td><?php echo number_format($post->end_total) ?></td>
    <td><span class="status_<?php echo $post->id?>">{{ $post->status }}</span></td>
    <td>{{ $post->address }}</td>
    <td><?php foreach ($transactionSend as $item) {?>
      <?php if ($item->transaction_id == $post->id) {echo $item->shipping_method;}?>
    <?php } ?></td>
    <td><?php foreach ($transactionSend as $item) {?>
      <?php if ($item->transaction_id == $post->id) {echo date("h:i:s d/m/Y", strtotime($item->date_send));}?>
    <?php } ?></td>
    {!! Form::close() !!}
  </tr>
@endforeach

