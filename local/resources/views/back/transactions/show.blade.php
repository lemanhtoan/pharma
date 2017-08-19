@extends('back.template')
@section('main')

  @include('back.partials.entete', ['icone' => 'pencil', 'fil' => 'Giao dịch' . "#{{ $post->id }}", 'title' => 'Chi tiết Giao dịch/'. " #$post->id " . link_to_route('transactions.index', 'Quay lại', [], ['class' => 'btn btn-info pull-right'])])
  {!! Form::model($post, ['route' => ['transactions.update', $post->id], 'method' => 'put', 'class' => 'transaction_update form-horizontal panel']) !!}

    <div class="row col-lg-12">
      <div class="col-md-6">
        <p><label for="">Địa chỉ:</label> <input type="text" required name="address" class="address" value="<?php if(isset($post->address)) {echo $post->address;}else{echo '';} ?>"></p>
        <p><label for="">SĐT:</label> <input type="text" required name="phone" class="phone" value="<?php if(isset($post->phone)) {echo $post->phone;}else{echo '';} ?>"></p>
        <p><label for="">Phương thức thanh toán:</label> COD</p>
        <p><label for="">Ghi chú:</label> <input type="text" name="note_trans" class="note_trans" value="<?php if(isset($post->note)) {echo $post->note;}else{echo '';} ?>"></p>
      </div>
      <div class="col-md-6">
        <p><label for="">Ngày giao dịch:</label> <?php echo date("h:i:s d/m/Y", strtotime($post->created_date))?></p>
        <p><label for="">Trạng thái hiện tại:</label> <b style="color: red; font-size: 15px;"><?php echo $post->status?></b></p>
        <p><label for="">Cập nhật trạng thái:</label>
          <select class="form-control transaction_status" name="transaction_status">
            <option value="">Trạng thái</option>
              <?php $status = Config::get('constants.transaction_status'); ?>
              <?php foreach ($status as $item) :?>
            <option <?php if ($post->status == $item) {echo 'selected';} else {echo '';}?> value="<?php echo $item ?>"><?php echo $item ?></option>
              <?php endforeach; ?>
          </select>
        </p>
        <p class="gr-btn">
          <span id="btnUpdateSend">Cập nhật</span>
          <span id="btnProcessSend">Giao hàng</span>
          <span id="btnPrintSend">In hóa đơn</span>
        </p>

        <!-- modal send invoice status -->
        <div class="modal fade btnProcessSendModal" id="btnProcessSendModal" role="dialog">
          <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
              <button type="button" class="close closeInfo" data-dismiss="modal"><img src="{!!url('/images/close.png')!!}" alt=""></button>
              <div class="modal-body">

                <h3>Tiến hành giao hàng</h3>
                <div class="row-item">
                  <div class="row-i">
                    <label for="">Địa chỉ: </label><?php echo $post->address; ?>
                    <input type="hidden" class="trans_id_send" name="trans_id_send" value="<?php echo $post->id?>">
                  </div>
                  <div class="row-i">
                    <div class="row-i2">
                      <label for="">Giao hàng bằng: </label>
                      <select class="form-control transaction_method_send" name="transaction_method">
                        <option value="">- Chọn nhà vận chuyển -</option>
                          <?php $shipping_owners = Config::get('constants.shipping_owners'); ?>
                          <?php foreach ($shipping_owners as $item) :?>
                        <option value="<?php echo $item ?>"><?php echo $item ?></option>
                          <?php endforeach; ?>
                      </select>
                    </div>

                    <div class="row-i2">
                      <label for="">Mã vận đơn: </label>
                      <input type="text" name="code_send" class="code_send">
                    </div>

                  </div>

                  <div class="row-i">
                    <div class="row-i2">
                      <label for="">Số lượng thùng/hộp: </label>
                      <input type="number" min="0" name="qty_box" class="qty_box_send">
                    </div>
                    <div class="row-i2">
                      <label for="">Số tiền thu hộ: </label><b><?php echo number_format($post->end_total); ?></b>
                    </div>
                  </div>

                  <div class="row-i">
                    <label for="">Dự kiến giao hàng: </label>
                    <div class="form-group">
                      <div id="time_send" class="input-group input-append date">
                        <span class="add-on" style="width: 100%">
                          <input class="form-control time_send" required data-format="yyyy-MM-dd hh:mm:ss" type="text" name="time_send"/>
                        </span>
                      </div>
                    </div>
                  </div>

                  <div class="row-i">
                    <label for="">Ghi chú: </label>
                    <input type="text" name="note" class="note_send">
                  </div>

                  <input type="hidden" name="_token" value="{{ csrf_token() }}">

                </div>

                <div class="row-item">
                    <p class="update-message" style="display: none">Thông tin đã cập nhật</p>
                   <p class="error-message" style="display: none">Thông tin cập nhật lỗi</p>
                </div>
                <div class="row-item">
                  <span id="btnCancel" class="btn-green btn">Hủy</span>
                  <span id="btnUpdate" class="btn-green btn">Cập nhật</span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- end modal send invoice status -->

      </div>
    </div>

    <div class="row col-lg-12">
      <div class="col-md-6">
        <h4>Chi tiết đơn hàng</h4>
        <table class="table table-backend">
          <thead>
          <tr>
            <th>Thuốc</th>
            <th>Số lượng</th>
            <th>Đơn giá</th>
            <th>Thành tiền</th>
          </tr>
          </thead>
          <tbody>
          <?php foreach($tran_drugs as $item) :?>
          <tr>
            <td>
                <?php foreach($drugs as $gd) { ?>
                  <?php if(isset($item->drug_id) && $item->drug_id == $gd['id']){echo $gd['name'];}else{echo '';} ?>
                <?php   }  ?>
            </td> <!-- max="<?php //echo $item->qty ?>" -->
            <td><input type="number" min="0"  name="qty_update[<?php echo $item->drug_id; ?>][<?php echo $item->type; ?>]" value="<?php echo $item->qty?>" data-drug="<?php echo $item->drug_id;?>"></td>
            <td><?php if($item->type=='discount') {echo number_format($item->price / $item->qty) , '<b style="color:red"> (KM)</b>'; } else {echo number_format($item->price / $item->qty);}?></td>
            <td><?php echo number_format($item->price)?></td>
          </tr>
          <?php endforeach; ?>

          <tr class="bg">
            <td>
                Tổng
            </td>
            <td><?php echo $post->countQty;?></td>
            <td>&nbsp;</td>
            <td><?php echo number_format($post->end_total)?></td>
          </tr>

          </tbody>
        </table>
      </div>
      <div class="col-md-6">
        <h4>Tóm tắt đơn hàng</h4>
        <div class="box-table">
          <p><label for="">Tổng giá trị hàng hóa</label><?php echo number_format($post->sub_total)?></p>
          <p><label for="">Phí mua hộ</label><?php echo number_format($phiMuaho)?></p>
          <p><label for="">Phí vận chuyển</label><?php echo number_format($phiVanchuyen)?></p>
          <p><label for="">Khuyến mãi</label><?php echo number_format($khuyenMai)?></p>
          <p><label for="">TỔNG</label><?php echo number_format($post->end_total)?></p>
          <p></p>
          <p><label for="">Đã thanh toán</label>0</p>
          <p class="bg"><label for="">CẦN THU</label><?php echo number_format($post->end_total)?></p>
        </div>
      </div>
    </div>

  {!! Form::close() !!}
@stop

@section('scripts')

{!! HTML::script('js/bootstrap-datetimepicker.min.js') !!}

<script type="text/javascript">
    // send transaction
    // update status => đang giao
    $('#btnUpdate').click(function(){
        $('.update-message, .error-message').hide();
        var trans_id_send=$('.trans_id_send').val();
        var transaction_method_send=$('.transaction_method_send').val();
        var code_send=$('.code_send').val();
        var qty_box_send=$('.qty_box_send').val();
        var time_send=$('.time_send').val();
        var note_send=$('.note_send').val();
        var token = $('input[name="_token"]').val();

        $.ajax({
            url: '{{ url('postTransactionSend') }}',
            type: 'POST',
            data: "transaction_id=" + trans_id_send + "&shipping_method=" + transaction_method_send + "&code_send=" + code_send + "&qty_box=" + qty_box_send + "&date_send=" + time_send + "&note=" + note_send + "&_token=" + token
        })
        .done(function (response) {
            $('.update-message').show();
            setTimeout(function(){
                  $('#btnProcessSendModal').modal('hide');
              },
            3000);
        })
        .fail(function () {
            console.log('Lỗi - giao hàng');
            $('.error-message').show();
        });
    });

    // update
    $('#btnUpdateSend').click(function(){
       $('.transaction_update').submit();
    });

    $('#time_send').datetimepicker({});

    $('#btnProcessSend').click(function() {
        $('#btnProcessSendModal').modal('show');
    });

    $('.closeInfo, #btnCancel').click(function(){
        $('#btnProcessSendModal').modal('hide');
    });
</script>

<style>
  #btnProcessSendModal .close img {
    width: 25px;
  }
  #btnProcessSendModal .close {
    top: -7px;
    opacity: 1;
    position: absolute;
    right: -7px;
    z-index: 1000;
  }
  #btnProcessSendModal .modal-content {
    border: 3px solid rgb(23, 190, 155);
    box-shadow: none;
    -webkit-box-shadow: none;
  }
  .btn-green {
    background: #17be9b;
    color: #fff;
    margin-right: 10px;
  }
  .btn-green:hover {
    color: #fff;
  }
</style>

@stop
