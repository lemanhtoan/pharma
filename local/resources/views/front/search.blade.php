@extends('front.template-nob')

@section('main')

    <h2 class="title-main">Kết quả tìm kiếm</h2>
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
                    <h3 class="title-product show-detail" data-drug="<?php echo $drug['drug_id'];?>"><?php echo $drug['drugInfo']->name;?></h3>
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

        <div class="pag-nav">
            {!! $drugs->appends(Input::except('page'))->render() !!}
        </div>

        <?php } else {?>
        <p>Danh sách rỗng</p>
        <?php } ?>
    </div>
    <script>

        // media drug
        $("#drug-media.drug-media").owlCarousel({
            items : 1,
            slideSpeed : 2000,
            paginationSpeed : 600,
            autoPlay : true,
            stopOnHover : false,
            navigation : false,
            navigationText : ["prev","next"],
            pagination: false,
            responsive: true,
            responsiveRefreshRate : 200,
            responsiveBaseWidth: window,
            autoHeight : false,
            mouseDrag : true,
            touchDrag : true,
            transitionStyle : false
        });

        // show detail drug
        $('.show-detail').click(function(){
            var idDrug = $(this).attr('data-drug');
            $('#detailDrugModal.detailDrugModal-'+idDrug).modal('show');
        });
    </script>
@stop
