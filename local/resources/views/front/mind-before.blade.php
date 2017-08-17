@extends('front.template-nob')

@section('main')

    <h2 class="title-main">Thông tin phiên trước</h2>
    <div class="list-products">
        <?php if (count($drugs)) { ?>
        <ul class="products">
            <?php foreach($drugs as $drug) { ?>
            <li>
                <?php $img = $drug['drugImage']; if ($img) {
                    $url = Config::get('constants.pathDrugImg') . $img[0]->url;
                } else {
                    $url = 'images/product.png';
                }; ?>
                <img class="show-detail" data-drug="<?php echo $drug['drug_id'];?>" src="{!! url($url) !!}" alt="">
                <div class="description-left">
                    <h3 class="title-product show-detail"
                        data-drug="<?php echo $drug['drug_id'];?>"><?php echo $drug['drugInfo']->name;?></h3>
                    <span class="price-product">Giá: <b><?php echo number_format($drug['drug_price']);?>đ</b></span>
                    <?php if ($drug['drug_special_price'] && $drug['drug_special_price'] > 0) :?>
                    <span class="special-product">Ưu đãi chỉ: <?php echo number_format($drug['drug_special_price']);?>
                        đ</span>
                    <?php else :?>
                    <span class="special-product">&nbsp;</span>
                    <?php endif;?>
                    <?php if ($drug['max_discount_qty']) :?>
                    <span class="limit-product">cho <b><?php echo $drug['max_discount_qty']?></b> sp đầu</span>
                    <?php else :?>
                    <span class="limit-product">&nbsp;</span>
                    <?php endif;?>
                </div>
                <!-- remove buy group button -->

                <!-- modal drug detail -->
                <div class="modal fade detailDrugModal-<?php echo $drug['drug_id'];?>" id="detailDrugModal"
                     role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <button type="button" class="close" data-dismiss="modal"><img
                                        src="{!!url('/images/close.png')!!}" alt=""></button>
                            <div class="modal-body">
                                <div class="modal-col-1">
                                    <!-- images drug -->
                                    <div id="drug-media" class="owl-carousel drug-media">
                                        <?php $imgs = $drug['drugImage']; ?>
                                        <?php if($imgs) { foreach ($imgs as $item) {?>
                                        <div class="item">
                                            <?php $url = Config::get('constants.pathDrugImg') . $item->url; ?>
                                            <img src="{!! url($url) !!}" alt="<?php echo $drug['drugInfo']->name; ?>">
                                        </div>
                                        <?php } } else { ?>
                                        <div class="item">
                                            <img src="{!! url('images/product.png') !!}"
                                                 alt="<?php echo $drug['drugInfo']->name; ?>">
                                        </div>
                                        <?php }?>
                                    </div>
                                </div>

                                <div class="modal-col-2">
                                    <h4><?php echo $drug['drugInfo']->name; ?></h4>
                                    <p class="p-bold">Thành phần:</p>
                                    <p>
                                        <?php echo $drug['drugInfo']->content; ?> <br>
                                        <?php echo $drug['drugInfo']->activeIngredient; ?>
                                    </p>
                                    <p><label class="p-bold" for="">Đơn vị
                                            buôn: </label> <?php echo $drug['drugInfo']->donvibuon; ?></p>
                                    <p><label class="p-bold" for="">Công ty sản
                                            xuất: </label> <?php echo $drug['drugInfo']->produceCompany; ?></p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- end modal drug detail -->

            </li>
            <?php } ?>
        </ul>

        {{--<ul class="pag-nav pagination">--}}
        {{--<li><a href="#">1</a></li>--}}
        {{--<li class="active"><a href="#">2</a></li>--}}
        {{--<li><a href="#">3</a></li>--}}
        {{--<li><a href="#">4</a></li>--}}
        {{--<li><a href="#">5</a></li>--}}
        {{--</ul>--}}

        <div class="pag-nav">
            {!! $drugs->appends(Input::except('page'))->render() !!}
        </div>

        <?php } else {?>
        <p>Danh sách rỗng</p>
        <?php } ?>
    </div>

    <?php if (count($nextMind)) { $valueTime = $nextMind[0]->start_time; ?>

    <!-- modal next-mind -->
    <div class="modal fade" id="mindModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><img src="{!!url('/images/close.png')!!}"
                                                                                  alt=""></button>
                    <h4 class="modal-title">Phiên tiếp theo sẽ mở vào:</h4>
                    <p><?php
                        $hour = date("h", strtotime($valueTime));
                        if ($hour < 12) {
                            $hour = date("h:s", strtotime($valueTime)) . ' AM';
                        } else {
                            $hour = date("h:s", strtotime($valueTime)) . ' PM';
                        }
                        $day = date("l", strtotime($valueTime));
                        $weekday = strtolower($day);
                        switch ($weekday) {
                            case 'monday':
                                $weekday = 'Thứ hai';
                                break;
                            case 'tuesday':
                                $weekday = 'Thứ ba';
                                break;
                            case 'wednesday':
                                $weekday = 'Thứ tư';
                                break;
                            case 'thursday':
                                $weekday = 'Thứ năm';
                                break;
                            case 'friday':
                                $weekday = 'Thứ sáu';
                                break;
                            case 'saturday':
                                $weekday = 'Thứ bảy';
                                break;
                            default:
                                $weekday = 'Chủ nhật';
                                break;
                        }
                        $date = date("d/m/Y", strtotime($valueTime));
                        $dayString = $hour . ', ' . $weekday . ', Ngày ' . $date;
                        echo $dayString;
                        ?></p>
                </div>
                <div class="modal-body">
                    <div class="modal-box">
                        <span class="left-time">Còn lại</span>
                        <div id="timeExpire"></div>

                        <script>
                            var countDownDate = new Date('<?php echo $valueTime;?>').getTime();

                            var x = setInterval(function () {

                                // Get todays date and time
                                var now = new Date().getTime();

                                // Find the distance between now an the count down date
                                var distance = countDownDate - now;

                                // Time calculations for days, hours, minutes and seconds
                                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                                var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                                if (seconds.toString().length == 1) {
                                    var second1 = '0';
                                    var second2 = seconds;
                                } else {
                                    var digits = ("" + seconds).split("");
                                    var second1 = digits[0];
                                    var second2 = digits[1];
                                }

                                var str = '';
                                str += '<div class="box-count">';
                                str += '<span class="top-span">';
                                str += days;
                                str += '</span>';
                                str += '<span class="bottom-span">';
                                str += "Ngày ";
                                str += '</span>';
                                str += '</div>';

                                str += '<div class="box-count">';
                                str += '<span class="top-span">';
                                str += hours;
                                str += '</span>';
                                str += '<span class="bottom-span">';
                                str += "giờ ";
                                str += '</span>';
                                str += '</div>';

                                str += '<div class="box-count">';
                                str += '<span class="top-span">';
                                str += minutes;
                                str += '</span>';
                                str += '<span class="bottom-span">';
                                str += "phút ";
                                str += '</span>';
                                str += '</div>';

                                str += '<span class="space-lb">';
                                str += ',';
                                str += '</span>';

                                str += '<div class="box-second">';
                                str += '<div class="top-second">';
                                str += '<span class="top-sp-1">';
                                str += second1;
                                str += '</span>';
                                str += '<span class="top-sp-1">';
                                str += second2;
                                str += '</span>';
                                str += '</div>';
                                str += '<span class="span no-bg">';
                                str += "giây ";
                                str += '</span>';
                                str += '</div>';

                                // Display the result
                                document.getElementById("timeExpire").innerHTML = str;

                                // If the count down is finished, write some text
                                if (distance < 0) {
                                    clearInterval(x);
                                    document.getElementById("timeExpire").innerHTML = "Hết hạn";
                                }
                            }, 1000);
                        </script>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- end modal next-mind -->

    <script type="text/javascript">
        // media drug
        $("#drug-media.drug-media").owlCarousel({
            items: 1,
            slideSpeed: 2000,
            paginationSpeed: 600,
            autoPlay: true,
            stopOnHover: false,
            navigation: false,
            navigationText: ["prev", "next"],
            pagination: false,
            responsive: true,
            responsiveRefreshRate: 200,
            responsiveBaseWidth: window,
            autoHeight: false,
            mouseDrag: true,
            touchDrag: true,
            transitionStyle: false
        });

        // show detail drug
        $('.show-detail').click(function () {
            var idDrug = $(this).attr('data-drug');
            $('#detailDrugModal.detailDrugModal-' + idDrug).modal('show');
        });

        // body load show mind modal
        $(window).on('load', function () {
            setTimeout(function () {
                $('#mindModal').modal('show');
            }, 2000);
        });
    </script>

    <?php } else { ?>


    <!-- modal next-mind -->
    <div class="modal fade" id="mindModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><img src="{!!url('/images/close.png')!!}"
                                                                                  alt=""></button>
                    <h4 class="modal-title">Phiên tiếp theo sẽ mở vào:</h4>
                    <div class="modal-body">
                        <div class="modal-box">
                            <span class="left-time">Không có dữ liệu phiên tiếp theo</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- end modal next-mind -->

        <!-- not have next mind -->
        <script type="text/javascript">
            // body load show mind modal
            $(window).on('load', function () {
                setTimeout(function () {
                    $('#mindModal').modal('show');
                }, 2000);
            });
        </script>
    <?php } ?>

@stop
