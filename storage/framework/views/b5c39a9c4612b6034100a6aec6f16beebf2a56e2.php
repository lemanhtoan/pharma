<?php
// check login or not
if ( !Auth::check() ) {
    $url = 'auth/login';
    header( "Location: $url" );
    die();
}

if (Session::has('pharma.cartDataJson')) {
	$cartGetSessionJsonFront =  Session::get('pharma.cartDataJson');
}

function getQty($productId, $type) {
    $qty = 0;
    if (Session::has('pharma.cartData')) {
        if ($type == 'discount') {
            $cartCurrentDiscount = Session::get('pharma.cartData.productDiscount');
            if (count($cartCurrentDiscount) > 0) {
                foreach ($cartCurrentDiscount as $productCurrent) {
                    if ($productId == $productCurrent['product_id']) {
                        $qty = $productCurrent['qty'];
                    }
                }
            }
		}

        if ($type == 'root') {
            $cartCurrentRoot = Session::get('pharma.cartData.productRoot');
            if (count($cartCurrentRoot) > 0) {
                foreach ($cartCurrentRoot as $productCurrent) {
                    if ($productId == $productCurrent['product_id']) {
                        $qty = $productCurrent['qty'];
                    }
                }
            }
        }
    }
    return $qty;
}

?>


<?php $__env->startSection('sidebar'); ?>
	<div class="box-wd">
		<h4>Phiên giao dịch: Ngày <?php echo date('d/m/Y'); ?></h4>
		<div class="box-content">
			<p>
				<img class="icon-box" src="images/home_07.png" alt="">
				Tổng tạm tính: <b class="current-price"><?php if(isset($cartGetSessionJsonFront)) {echo number_format($cartGetSessionJsonFront['countRootTotalPrice']);} else {echo '0';}?></b><b>đ</b>
				<br>
				(được giảm: -<label for="" class="discount-price"><?php if(isset($cartGetSessionJsonFront)) {echo number_format($cartGetSessionJsonFront['countDiscount']);} else {echo '0';}?></label><b style="color: red">đ</b>)
			</p>
			<?php /*<button class="btn-buy">Đặt hàng</button>*/ ?>
			<a class="btn-buy" href="checkout">Đặt hàng</a>
		</div>
	</div>

    <?php if ($nextMind) : $valueTime = $nextMind[0]->start_time; ?>
	<div class="box-wd">
		<h4>Thông tin phiên mới nhất</h4>
		<div class="box-content">
			<h5>Phiên tiếp theo sẽ mở vào:</h5>
				<?php
                $hour = date("h", strtotime($valueTime));
                if ($hour < 12 ) { $hour = date("h:s", strtotime($valueTime)). ' AM';} else {$hour = date("h:s", strtotime($valueTime)). ' PM';}
                $day = date("l", strtotime($valueTime));
                $weekday = strtolower($day);
                switch($weekday) {
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
                $dayString = $hour. ', '. $weekday. ', Ngày ' . $date;
                echo '<p class="p-day">' . $dayString . '</p>';
                ?>

			<div class="modal-box">
				<span class="left-time">Còn lại</span>
				<div id="timeExpire"></div>
				<script>
                    var countDownDate = new Date('<?php echo $valueTime;?>').getTime();

                    var x = setInterval(function() {

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
                            var digits = (""+seconds).split("");
                            var second1 = digits[0];
                            var second2 = digits[1];
                        }

                        var str = '';
                        str += '<div class="box-count">';
                        str +='<span class="top-span">';
                        str += days;
                        str += '</span>';
                        str +='<span class="bottom-span">';
                        str += "Ngày ";
                        str += '</span>';
                        str += '</div>';

                        str += '<div class="box-count">';
                        str +='<span class="top-span">';
                        str += hours;
                        str += '</span>';
                        str +='<span class="bottom-span">';
                        str += "giờ ";
                        str += '</span>';
                        str += '</div>';

                        str += '<div class="box-count">';
                        str +='<span class="top-span">';
                        str += minutes;
                        str += '</span>';
                        str +='<span class="bottom-span">';
                        str += "phút ";
                        str += '</span>';
                        str += '</div>';

                        str += '<span class="space-lb">';
                        str += ',';
                        str += '</span>';

                        str += '<div class="box-second">';
                        str += '<div class="top-second">';
                        str +='<span class="top-sp-1">';
                        str += second1;
                        str += '</span>';
                        str +='<span class="top-sp-1">';
                        str += second2;
                        str += '</span>';
                        str += '</div>';
                        str +='<span class="span no-bg">';
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

			</p>
		</div>
	</div>
	<?php endif;?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>
	<h2 class="title-main">Phiên giao dịch: Ngày <?php echo date('d/m/Y'); ?></h2>
    	<?php
			$userId = 0;
        	if (Auth::check()) $userId = Auth::user()->id;
		?>
        <?php if (count($drugs)) { ?>
		<div class="list-products">
			<ul class="products list-data-products">
				<?php foreach($drugs as $drug) {  ?>
				<li class="current-list">
					<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
					<input type="hidden" name="mind_id" value="<?php echo $mind[0]->id ?>">
					<input type="hidden" name="user_id" value="<?php echo $userId ?>">
					<?php
						$price = $drug['drug_price'] ? $drug['drug_price'] : 0;
                    	$specialPrice = $drug['drug_special_price'] ? $drug['drug_special_price'] : 0;
					?>


					<input class="price<?php echo $drug['drug_id'];?>" type="hidden" name="price" value="<?php echo $price ?>">
					<input  class="special_price<?php echo $drug['drug_id'];?>" type="hidden" name="special_price" value="<?php echo $specialPrice ?>">


					<?php $img = $drug['drugImage']; if($img) { $url = Config::get('constants.pathDrugImg').$img[0]->url;} else {$url = 'images/product.png';}; ?>
					<img class="show-detail" data-drug="<?php echo $drug['drug_id'];?>" src="<?php echo url($url); ?>" alt="">
					<h3 class="title-product show-detail" data-drug="<?php echo $drug['drug_id'];?>"><?php echo  $drug['drugInfo']->name;?></h3>
					<span class="price-product">Giá: <b><?php echo number_format($drug['drug_price']);?>đ</b></span>
					<?php if ($drug['drug_special_price'] && $drug['drug_special_price'] > 0) :?>
					<span class="special-product">Ưu đãi chỉ: <?php echo number_format($drug['drug_special_price']);?>đ</span>
					<?php else :?>
					<span class="special-product">&nbsp;</span>
					<?php endif;?>
					<?php if ($drug['max_discount_qty']) :?>
					<span class="limit-product">cho <b><?php echo $drug['max_discount_qty']?></b> sp đầu</span>
					<?php else :?>
					<span class="limit-product">&nbsp;</span>
					<?php endif;?>
					<?php if ($drug['drugInfo']->status == '1') {?>

                    <?php if ($drug['max_discount_qty'] > 0) {$typePrice = 'type_discount';} else {$typePrice = 'type_root';}?>

					<button data-drug="<?php echo $drug['drug_id'];?>" data-type="<?php echo $typePrice ?>" class="<?php echo $typePrice ?> btn-buy btn-cart btn-cart-<?php echo $drug['drug_id'];?>">Đặt hàng</button>


					<?php if ( (getQty($drug['drug_id'], 'discount') > 0) && (getQty($drug['drug_id'], 'root') > 0) ) {$isLoad = 'isLoad';}?>

					<?php if ($drug['max_discount_qty'] > 0) :?>
						<div class="qty-box qty-<?php echo $drug['drug_id'];?> type_discount" data-type="type_discount">
							<span data-drug="<?php echo $drug['drug_id'];?>" data-type="type_discount" class="qty_discount qty-minus qty-minus-<?php echo $drug['drug_id'];?>">-</span>
							<input value="<?php echo getQty($drug['drug_id'], 'discount');?>" name="qty_discount" type="number" min="0" max="<?php echo $drug['max_discount_qty']; ?>" data-drug="<?php echo $drug['drug_id'];?>" data-type="type_discount" class="no-spinners qty_discount qty-count qty-count-<?php echo $drug['drug_id'];?>" data-isload="<?php echo $isLoad?>"/>
							<span data-drug="<?php echo $drug['drug_id'];?>" data-type="type_discount" class="qty_discount qty-add qty-add-<?php echo $drug['drug_id'];?>">+</span>
						</div>
					<?php endif;?>

					<div class="qty-box qty-<?php echo $drug['drug_id'];?> type_root" data-type="type_root">
						<span data-drug="<?php echo $drug['drug_id'];?>" data-type="type_root" class="qty_root qty-minus qty-minus-<?php echo $drug['drug_id'];?>">-</span>
						<input value="<?php echo getQty($drug['drug_id'], 'root');?>" name="qty_root" type="number" min="0" data-drug="<?php echo $drug['drug_id'];?>" data-type="type_root" class="no-spinners qty_root qty-count qty-count-<?php echo $drug['drug_id'];?>"  data-isload="<?php echo $isLoad?>"/>
						<span data-drug="<?php echo $drug['drug_id'];?>" data-type="type_root" class="qty_root qty-add qty-add-<?php echo $drug['drug_id'];?>">+</span>
					</div>

					<?php } else { ?>
					<button class="btn-empty">Hết hàng</button>
				<?php } ?>

				<!-- modal drug detail -->
				<div class="modal fade detailDrugModal-<?php echo $drug['drug_id'];?>" id="detailDrugModal" role="dialog">
					<div class="modal-dialog">
						<!-- Modal content-->
						<div class="modal-content">
							<button type="button" class="close" data-dismiss="modal"><img src="<?php echo url('/images/close.png'); ?>" alt=""></button>
							<div class="modal-body">
								<div class="modal-col-1">
									<!-- images drug -->
									<div id="drug-media" class="owl-carousel drug-media">
										<?php $imgs = $drug['drugImage']; ?>
										<?php if($imgs) { foreach ($imgs as $item) {?>
										<div class="item">
											<?php $url = Config::get('constants.pathDrugImg').$item->url; ?>
											<img src="<?php echo url($url); ?>" alt="<?php echo $drug['drugInfo']->name; ?>">
										</div>
										<?php } } else { ?>
										<div class="item">
											<img src="<?php echo url('images/product.png'); ?>" alt="<?php echo $drug['drugInfo']->name; ?>">
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
									<p><label  class="p-bold" for="">Đơn vị buôn: </label> <?php echo $drug['drugInfo']->donvibuon; ?></p>
									<p><label  class="p-bold" for="">Công ty sản xuất: </label> <?php echo $drug['drugInfo']->produceCompany; ?></p>
								</div>
							</div>
						</div>

					</div>
				</div>
				<!-- end modal drug detail -->

				</li>
			<?php } ?>
			</ul>

			<ul class="pag-nav pagination">
				<li><a href="#">1</a></li>
				<li class="active"><a href="#">2</a></li>
				<li><a href="#">3</a></li>
				<li><a href="#">4</a></li>
				<li><a href="#">5</a></li>
			</ul>
		</div>
		<?php } else {?>
			<p>Danh sách rỗng</p>
		<?php } ?>

		<script type="text/javascript">
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
<?php $__env->stopSection(); ?>



<?php echo $__env->make('front.template-bar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>