<?php
// check login or not
if ( !Auth::check() ) {
    $url = 'auth/login';
    header( "Location: $url" );
    die();
}
?>
@extends('front.template')

@section('main')

    <div class="row checkout_step1">
        <div class="col-md-8 col-xs-8"><h2 class="title-main gray-color"><img src="{!!url('/images/bill_1_07.png')!!}" alt=""> Thông tin đơn hàng </h2></div>
        <div class="col-md-4 col-xs-4"><a class="btn-buy pull-right" href="{!!url('/')!!}">< Trở lại</a></div>
    </div>

    <div class="row">
        <div class="box-green">
            <b class="green-color">Dự kiến: </b>
            <?php echo $mindMessage->note; ?>
        </div>
    </div>
    <?php
    $qtyTotal = 0;
    $priceTotal = 0;
    if ($data) {
        // get qty total and price total
        $qtyTotal = $data['countQty'];
        $priceTotal = $data['countRootTotalPrice'];
    }
    ?>
    <form action="{!!url('/process-buy')!!}" method="POST"  class='buy-form' accept-charset="utf-8">
        <div class="checkout_step2">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="row">
                <div class="col-md-6">
                    <div class="row-even">
                        <div class="row-label"><b class="normal">Tổng giá trị hàng hóa</b></div>
                        <div class="row-value"> <?php echo number_format($priceTotal);?></div>
                    </div>
                    <div class="row-old">
                        <div class="row-label">Phí mua hộ</div>
                        <div class="row-value">20.000</div>
                    </div>
                    <div class="row-even">
                        <div class="row-label">Vận chuyển</div>
                        <div class="row-value">40.000</div>
                    </div>
                    <div class="row-old">
                        <div class="row-label">Khuyến mãi</div>
                        <div class="row-value">

                            <?php echo number_format($khuyenmai);?>

                        </div>
                    </div>
                    <div class="row-even">
                        <div class="row-label"><b class="capt">Tổng</b></div>
                        <div class="row-value"><b class="red"><?php echo number_format($priceTotal);?></b></div>
                    </div>
                </div>
                <div class="col-md-6">

                    <!-- data post session or db -->

                    <div class="box-shiper">
                        <h3>Thông tin giao hàng:</h3>
                        <ul>
                            <li>Người nhận: <span class="value_name"><?php echo $dataUser['name']?></span> </li>
                            <li>Địa chỉ: <span class="value_address"><?php echo $dataUser['address']?></span></li>
                            <li>Điện thoại: <span class="value_phone"><?php echo $dataUser['phone']?></span></li>
                        </ul>
                        <button type="button" data-target="#btnEditInfo" class="btn-green" id="btnEditInfo">Thêm/Sửa thông tin nhận hàng</button>

                        <!-- modal edit customer info -->
                        <div class="modal fade btnEditInfo" id="btnEditInfo" role="dialog">
                            <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <button type="button" class="close closeInfo" data-dismiss="modal"><img src="{!!url('/images/close.png')!!}" alt=""></button>
                                    <div class="modal-body">
                                        <h3>Thông tin nhận hàng</h3>
                                        <div class="row">
                                            <p class="error-message">Vui lòng điền đủ thông tin người nhận.</p>
                                        </div>
                                        <div class="row">
                                            Người nhận: <br>
                                            <input type="text"  class="post_name" value="<?php echo $dataUser['name']?>" name="customer_name" placeholder="Tên người nhận">
                                        </div>
                                        <div class="row">
                                            Địa chỉ: <br>
                                            <input type="text"  class="post_address" value="<?php echo $dataUser['address']?>" name="customer_address" placeholder="Địa chỉ người nhận">
                                        </div>
                                        <div class="row">
                                            Điện thoại: <br>
                                            <input type="text"  class="post_phone"  value="<?php echo $dataUser['phone']?>" name="customer_phone" placeholder="Điện thoại người nhận">
                                        </div>

                                        <div class="row"><p class="update-message" style="display: none">Thông tin đã cập nhật</p></div>
                                        <div class="row">
                                            <span id="btnUpdateInfo">Cập nhật</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end modal edit customer info -->
                    </div>
                </div>
            </div>
        </div>
        <div class="row button_continue">
            <button type="submit" class="btn btn-continue pull-right">Mua hàng</button>
        </div>
    </form>

    <script>
        $(document).ready(function(){
            // show modal edit customer info
            $('#btnEditInfo').on('shown.bs.modal', function() {
                $(document).off('focusin.modal');
            });

            $('#btnEditInfo').click(function(){
                $('.update-message').hide();
                $('.error-message').hide();
                $('#btnEditInfo').modal('show');
            });

            $('.closeInfo').click(function(){
                $('#btnEditInfo').modal('hide');
                $('#btnEditInfo.btn-green').show();
            });

            // update btnUpdateInfo
            $('#btnUpdateInfo').click(function(){
                var  post_name = $('.post_name').val();
                var  post_address = $('.post_address').val();
                var  post_phone = $('.post_phone').val();
                if (post_name =='' || post_address =='' || post_phone == '') {
                    $('.error-message').show();
                    return false;
                }
                $('.value_name').text(post_name);
                $('.value_address').text(post_address);
                $('.value_phone').text(post_phone);
                $('.update-message').show();
                $('.error-message').hide();
                setTimeout(function(){$('#btnEditInfo').modal('hide');}, 2000);
            });
        });
    </script>
@stop
