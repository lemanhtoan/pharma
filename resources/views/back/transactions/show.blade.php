@extends('back.template')
@section('main')

  @include('back.partials.entete', ['icone' => 'pencil', 'fil' => 'Giao dịch', 'title' => 'Giao dịch' . link_to_route('transactions.index', 'Quay lại', [], ['class' => 'btn btn-info pull-right'])])
  {!! Form::model($post, ['route' => ['transactions.update', $post->id], 'method' => 'put', 'class' => 'form-horizontal panel']) !!}

    <div class="row col-lg-12">
      <div class="col-md-6">
        <p><label for="">Mã giao dịch:</label> #{{ $post->id }}</p>
        <p><label for="">Địa chỉ:</label> <input type="text" name="address" class="address" value="<?php if(isset($post->address)) {echo $post->address;}else{echo '';} ?>"></p>
        <p><label for="">SĐT:</label> <input type="text" name="phone" class="phone" value="<?php if(isset($post->phone)) {echo $post->phone;}else{echo '';} ?>"></p>
        <p><label for="">Phương thức thanh toán:</label> COD</p>
        <p><label for="">Ghi chú:</label> <input type="text" name="note" class="note"></p>
      </div>
      <div class="col-md-6">
        <p><label for="">Ngày giao dịch:</label> <?php echo date("h:i:s d/m/Y", strtotime($post->created_date))?></p>
        <p><label for="">Trạng thái hiện tại:</label> <?php echo $post->status?></p>
        <p><label for="">Cập nhật trạng thái:</label>
          <select class="form-control transaction_status" name="transaction_statusac">
            <option value="">Trạng thái</option>
              <?php $status = Config::get('constants.transaction_status'); ?>
              <?php foreach ($status as $item) :?>
            <option value="<?php echo $item ?>"><?php echo $item ?></option>
              <?php endforeach; ?>
          </select>
        </p>
        <p>
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
                  </div>
                  <div class="row-i">
                    <div class="row-i2">
                      <label for="">Giao hàng bằng: </label>
                      <select class="form-control transaction_method" name="transaction_method">
                        <option value="">- Chọn nhà vận chuyển -</option>
                          <?php $status = Config::get('constants.transaction_status'); ?>
                          <?php foreach ($status as $item) :?>
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
                      <input type="number" min="0" name="qty_box" class="qty_box">
                    </div>
                    <div class="row-i2">
                      <label for="">Số tiền thu hộ: </label><?php echo $post->end_total; ?>
                    </div>
                  </div>

                  <div class="row-i">
                    <label for="">Dự kiến giao hàng: </label>
                    <div class="form-group">
                      <div id="time_send" class="input-group input-append date">
                        <input class="form-control" required data-format="yyyy-MM-dd hh:mm:ss" type="text" name="time_send"/>
                            <span class="add-on">
                          <i data-time-icon="icon-time" data-date-icon="icon-calendar">
                          </i>
                        </span>
                      </div>
                    </div>
                  </div>

                  <div class="row-i">
                    <label for="">Ghi chú: </label>
                    <input type="text" name="note" class="note">
                  </div>

                  <input type="hidden" name="dataIds" class="dataIds">

                </div>

                <div class="row-item"><p class="update-message" style="display: none">Thông tin đã cập nhật</p></div>
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
          <tr>
            <td>Name</td>
            <td>10</td>
            <td>100</td>
            <td>1000</td>
          </tr>
          <tr>
            <td>Name</td>
            <td>10</td>
            <td>100</td>
            <td>1000</td>
          </tr>
          <tr class="bg">
            <td>Tổng</td>
            <td>10</td>
            <td></td>
            <td>1000</td>
          </tr>
          </tbody>
        </table>
      </div>
      <div class="col-md-6">
        <h4>Tóm tắt đơn hàng</h4>
        <div class="box-table">
          <p><label for="">Tổng giá trị hàng hóa</label></p>
          <p><label for="">Phí mua hộ</label></p>
          <p><label for="">Phí vận chuyển</label></p>
          <p><label for="">Khuyến mãi</label></p>
          <p><label for="">TỔNG</label></p>
          <p></p>
          <p><label for="">Đã thanh toán</label></p>
          <p class="bg"><label for="">CẦN THU</label></p>
        </div>
      </div>
    </div>

  {!! Form::close() !!}
@stop

@section('scripts')

{!! HTML::script('js/bootstrap-datetimepicker.min.js') !!}

<script type="text/javascript">
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
