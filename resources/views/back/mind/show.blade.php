@extends('back.template')
@section('main')

  @include('back.partials.entete', ['icone' => 'pencil', 'fil' => 'Giao dịch', 'title' => 'Giao dịch'. link_to_route('mind.index', 'Quay lại', [], ['class' => 'btn btn-info pull-right']) ])

  <div class="row col-lg-12">
    <p>
      {!! link_to_route('mind.edit', 'Sửa', [$post->id], ['class' => 'edit-link']) !!}
    </p>
    <p>Mã phiên giao dịch: {{ $post->code }}</p>
    <p>Tên phiên giao dịch: {{ $post->name }}</p>
    <p>Bắt đầu: {{ $post->start_time }}</p>
    <p>Kết thúc: {{ $post->end_time }}</p>
    <p>KM tối đa nhóm KH 1: {{ $post->discount_cg1 }}</p>
    <p>KM tối đa nhóm KH 2: {{ $post->discount_cg2 }}</p>
    <p>Ghi chú: {{ $post->note }}</p>
    <p>Trạng thái: <?php if($post->status == '1') {echo 'Hoạt động';}else{echo 'Khóa';}?></p>
    <div>
      <h4>Danh sách thuốc trong phiên</h4>
      <?php if (count($post->mind_drugs)) { ?>
      <?php $stt=0; ?>
      <div class="row">
        <div class="col-md-12">
          <table class="table table-striped table-bordered">
            <tr>
              <th>#</th>
              <th>Tên thuốc</th>
              <th>Giá gốc</th>
              <th>Giá KM</th>
              <th>Giới hạn KM</th>
              <th>Giới hạn Đặt hàng</th>
              <th>Ghi chú</th>
            </tr>
            @foreach($post->mind_drugs as $row)
                <?php $stt++; ?>
                <tr>
                  <td>{!!$stt!!}</td>
                  <td>
                      <?php foreach($drugs as $gd) { ?>
                      <?php if(isset($row->drug_id) && $row->drug_id == $gd['id']){ ?>
                      {!! link_to('drug/' . $gd['id'], $gd['name']) !!}
                      <?php
                      }else{echo '';} ?>
                      <?php   }  ?>
                  </td>
                  <td>{!! $row->drug_price !!}</td>
                  <td>{!! $row->drug_special_price !!}</td>
                  <td>{!! $row->max_discount_qty !!}</td>
                  <td>{!! $row->max_qty !!}</td>
                  <td>{!! $row->note !!}</td>
                </tr>
              </p>
            @endforeach
          </table>
        </div>
      </div>
      <?php } else { ?>
      <p>Danh sách rỗng</p>
      <?php }?>
    </div>
  </div>

@stop

@section('scripts')
@stop
