@extends('back.template')
@section('main')

  @include('back.partials.entete', ['title' => 'Danh sách giao dịch' . link_to_route('transactions.create', 'Thêm mới', [], ['class' => 'btn btn-info pull-right']), 'icone' => 'pencil', 'fil' => 'Khách hàng'])

	@if(session()->has('ok'))
    @include('partials/error', ['type' => 'success', 'message' => session('ok')])
	@endif

  <div class="row col-lg-12">
    <div class="search-bar pull-left" style="margin-left: -15px">
      <!--search bar-->
      {!! Form::open(array(
          'method' =>'GET',
          'url' => 'transactions/search',
          'class'=>'form navbar-form navbar-right searchform'
          )
      ) !!}
      <input  value="<?php if(isset($_GET['search'])) {echo $_GET['search'];} else {echo '';}?>" class="form-control" placeholder="Tìm theo tên nhà thuốc" name="search" type="text">
    {!! Form::submit('Tìm kiếm') !!}
      <a href="{!! route('transactions.index') !!}" class="btn btn-default">Hủy</a>

      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="fox-filter">
        <div class="row">
          <select class="form-control" name="s_mind_id">
            <option value="">Phiên giao dịch</option>
            <?php foreach($minds as $gd) { ?>
            <option <?php if(isset($_GET['s_mind_id']) && $_GET['s_mind_id'] == $gd){echo 'selected';}else{echo '';} ?> value="<?php echo $gd['id']?>"><?php echo $gd['name']?></option>
            <?php   }  ?>
          </select>

          <select class="form-control" name="s_status">
            <option value="">Trạng thái</option>
              <?php $status = Config::get('constants.transaction_status'); ?>
              <?php foreach ($status as $item) :?>
            <option <?php if(isset($_GET['s_customerGroup']) && $_GET['s_customerGroup'] == $item) {echo 'selected';} else {echo '';}?> value="<?php echo $item ?>"><?php echo $item ?></option>
              <?php endforeach; ?>
          </select>
        </div>

        <div class="row">
          <select class="form-control" name="s_customerGroup">
            <option value="">Nhóm khách hàng</option>
            <?php $customerType= Config::get('constants.customerType');?>
            <?php foreach($customerType as $gd) { ?>
            <option <?php if(isset($_GET['s_status']) && $_GET['s_status'] == $gd){echo 'selected';}else{echo '';} ?> value="<?php echo $gd?>"><?php echo $gd?></option>
            <?php   }  ?>
          </select>

          <select class="form-control" name="s_province" id="s_province">
            <option value="">Tỉnh /TP</option>
            <?php foreach($province as $gd) { ?>
            <option <?php if(isset($_GET['s_province']) && $_GET['s_province'] == $gd['name']){echo 'selected';}else{echo '';} ?> dataget="<?php echo $gd['id']?>"  value="<?php echo $gd['name']?>"><?php echo $gd['name']?></option>
            <?php   }  ?>
          </select>

          <select class="form-control" name="s_district" id="s_district">
            <option value="">Quận/Huyện</option>
            <?php foreach($district as $gd) { ?>
            <option <?php if(isset($_GET['s_district']) && $_GET['s_district'] == $gd['name']){echo 'selected';}else{echo '';} ?> value="<?php echo $gd['name']?>"><?php echo $gd['name']?></option>
            <?php   }  ?>
          </select>

        </div>


      </div>


    {!! Form::close() !!}
    <!--end search bar-->

    <!-- change status and print invoice -->
    <div class="row box-other">
      <button id="changeStatus" type="button" data-target="#btnChangeStatus">Đổi trạng thái</button>

      <!-- modal change order status -->
      <div class="modal fade btnChangeStatus" id="btnChangeStatus" role="dialog">
        <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">
            <button type="button" class="close closeInfo" data-dismiss="modal"><img src="{!!url('/images/close.png')!!}" alt=""></button>
            <div class="modal-body">

              <h3>Đổi trạng thái các giao dịch đã chọn</h3>
              <div class="row-item">

                <select class="form-control transaction_status" name="transaction_statusac">
                  <option value="">Trạng thái</option>
                  <?php $status = Config::get('constants.transaction_status'); ?>
                  <?php foreach ($status as $item) :?>
                  <option value="<?php echo $item ?>"><?php echo $item ?></option>
                  <?php endforeach; ?>
                </select>

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
      <!-- end modal change order status -->

      <button id="printOrder">In hóa đơn</button>
    </div>

    </div>
  </div>

  <div class="row col-lg-12">

    <?php if(count($posts)): ?>
    <div class="table-responsive">
      <table class="table">
        <thead>
          <tr>
            <th>
              <input type="checkbox" id="selectall"/>
            </th>
            <th>
              Mã giao dịch
              <a href="#" name="transactions.id" class="order">
                <span class="fa fa-fw fa-{{ $order->name == 'transactions.id' ? $order->sens : 'unsorted'}}"></span>
              </a>
            </th>
            <th>
              Thời gian giao dịch
              <a href="#" name="transactions.created_date" class="order">
                <span class="fa fa-fw fa-{{ $order->name == 'transactions.created_date' ? $order->sens : 'unsorted'}}"></span>
              </a>
            </th>
            <th>
              Tên Khách hàng
            </th>

            <th>
              Nhóm Khách hàng
              <a href="#" name="transactions.id" class="order">
                <span class="fa fa-fw fa-{{ $order->name == 'transactions.id' ? $order->sens : 'unsorted'}}"></span>
              </a>
            </th>

            <th>
              SL thuốc
              <a href="#" name="transactions.countQty" class="order">
                <span class="fa fa-fw fa-{{ $order->name == 'transactions.countQty' ? $order->sens : 'unsorted'}}"></span>
              </a>
            </th>

            <th>
              Giá trị GD
              <a href="#" name="transactions.end_total" class="order">
                <span class="fa fa-fw fa-{{ $order->name == 'transactions.end_total' ? $order->sens : 'unsorted'}}"></span>
              </a>
            </th>

            <th>
              Trạng thái
              <a href="#" name="transactions.status" class="order">
                <span class="fa fa-fw fa-{{ $order->name == 'transactions.status' ? $order->sens : 'unsorted'}}"></span>
              </a>
            </th>

            <th>
              Địa chỉ
            </th>

            <th>
              Nhà vận chuyển
            </th>

            <th>
              Thời gian giao dự kiến
            </th>

          </tr>
        </thead>
        <tbody>
          @include('back.transactions.table')
        </tbody>
      </table>
    </div>
  </div>

  <div class="row col-lg-12">
    <div class="pull-right link">{!! $links !!}</div>
  </div>

  <?php else: ?>
  <h4>Danh sách rỗng</h4>
  <?php endif;?>

@stop
<?php if(isset($_GET['search'])) {$search =  $_GET['search'];} else {$search = '';}?>
<?php if(isset($_GET['s_pharmacieType'])) {$spharmacieType =  $_GET['s_pharmacieType'];} else {$spharmacieType = '';}?>
<?php if(isset($_GET['s_status'])) {$sStatus =  $_GET['s_status'];} else {$sStatus = '';}?>
<?php if(isset($_GET['s_province'])) {$sProvince =  $_GET['s_province'];} else {$sProvince = '';}?>
<?php if(isset($_GET['s_district'])) {$sDistrict =  $_GET['s_district'];} else {$sDistrict = '';}?>
@section('scripts')

  <script>

    $(function() {

        $('#changeStatus').click(function(){

          $('.update-message').hide();

          // change status validation
          var checkboxValues = [];
          $('input[name="case[]"]:checked').each(function(index, elem) {
            checkboxValues.push($(elem).val());
          });

          if (checkboxValues.length < 1) {
            alert('Vui lòng chọn 1 hoặc nhiều giao dịch để đổi trạng thái');
          } else {
            var dataChoise = checkboxValues.join(',');
            $('.dataIds').val(dataChoise);

            $('#btnChangeStatus').modal('show');
          }

        });

        $('#btnUpdate').click(function(){
          var token = $('input[name="_token"]').val();
          var statusSelect = $('.transaction_status').val();
          var dataChoise = $('.dataIds').val();
          var dataChoiseArr = dataChoise.split(",");

          $.ajax({
            url: '{{ url('postActtransactions') }}',
            type: 'PUT',
            data: "status=" + statusSelect + "&_token=" + token +"&dataChoise=" + dataChoise
          })
          .done(function(response) {
            $('.update-message').show();
            $.each( dataChoiseArr, function( key, value ) {
              $('.status_'+value).text(statusSelect);
            });

            console.log(response);
          })
          .fail(function() {
            alert('Lỗi thay đổi trạng thái');
          });

          return false;
        });

        $('.closeInfo, #btnCancel').click(function(){
          $('#btnChangeStatus').modal('hide');
        });


        // checkbox function
        $("#selectall").click(function () {
          $('.case').prop('checked',  this.checked);
        });

        $(".case").click(function(){
          if($(".case").length == $(".case:checked").length) {
            $("#selectall").attr("checked", "true");
          } else {
            $("#selectall").removeAttr("checked");
          }
        });


        // change province load district
        $(document).on('change', '#s_province', function () {
            var token = $('input[name="_token"]').val();
            var provinceSelect = $('option:selected', this).attr('dataget');
            $.ajax({
                url: '{{ url('postChangeProvince') }}',
                type: 'POST',
                data: "province=" + provinceSelect + "&_token=" + token
            })
            .done(function (response) {
                // remove old data
                $('#s_district').find('option')
                    .remove()
                    .end();
                $('#s_district')
                    .append($("<option value=''> Quận/Huyện </option>"));
                // each and append new list
                jQuery.each(response, function(index, obj) {
                    $('#s_district')
                        .append($("<option></option>")
                            .attr("value",obj.name)
                            .text(obj.name));
                });
            })
            .fail(function () {
                console.log('Lỗi - lấy dữ liệu districts');
            });
        });


      // Sorting gestion
      $('a.order').click(function(e) {
        e.preventDefault();
        // Sorting direction
        var sens;
        if($('span', this).hasClass('fa-unsorted')) sens = 'aucun';
        else if ($('span', this).hasClass('fa-sort-desc')) sens = 'desc';
        else if ($('span', this).hasClass('fa-sort-asc')) sens = 'asc';
        // Set to zero
        $('a.order span').removeClass().addClass('fa fa-fw fa-unsorted');
        // Adjust selected
        $('span', this).removeClass();
        var tri;
        if(sens == 'aucun' || sens == 'asc') {
          $('span', this).addClass('fa fa-fw fa-sort-desc');
          tri = 'desc';
        } else if(sens == 'desc') {
          $('span', this).addClass('fa fa-fw fa-sort-asc');
          tri = 'asc';
        }
        var name = $(this).attr('name');
        // Wait icon
        $('.breadcrumb li').append('<span id="tempo" class="fa fa-refresh fa-spin"></span>');

        var search = '<?php echo $search; ?>';
        var spharmacieType = '<?php echo $spharmacieType; ?>';
        var sStatus = '<?php echo $sStatus; ?>';
        var sProvince = '<?php echo $sProvince; ?>';
        var sDistrict = '<?php echo $sDistrict; ?>';

        // Send ajax
        $.ajax({
          url: '{{ url('transactions/order') }}',
          type: 'GET',
          dataType: 'json',
          data: "name=" + name + "&sens=" + tri + "&search=" + search + "&s_pharmacieType=" + spharmacieType + "&s_status=" + sStatus + "&s_province=" + sProvince + "&s_district=" + sDistrict
        })
        .done(function(data) {
          $('tbody').html(data.view);
          $('.link').html(data.links.replace('transactions.(.+)&sens', name));
          $('#tempo').remove();
        })
        .fail(function() {
          $('#tempo').remove();
          alert('Lỗi sắp xếp');
        });
      })

    });

  </script>

  <style>
    .row-item {
      margin: 15px 0;
    }
    #btnChangeStatus .close img {
      width: 25px;
    }
    #btnChangeStatus .close {
      top: -7px;
      opacity: 1;
      position: absolute;
      right: -7px;
      z-index: 1000;
    }
    #btnChangeStatus .modal-content {
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
