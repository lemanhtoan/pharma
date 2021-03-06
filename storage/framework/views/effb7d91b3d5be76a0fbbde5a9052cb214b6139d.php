<footer>
    <div class="container">
        <div class="row">
            <div class="copy-right">
                &copy; 2017 by <a href="">5Pharma</a>
            </div>
        </div>
    </div>
</footer>

<!-- main js process -->
<?php echo HTML::script('js/main.js'); ?>


<script>

    function formatNumber (num) {
        return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,")
    }

    // show - hide qty box
    jQuery('.btn-cart').click(function(){
        var type_price = $(this).attr('data-type');
        jQuery('.'+type_price+'.qty-'+jQuery(this).attr('data-drug')).show();
        jQuery('.btn-cart-'+jQuery(this).attr('data-drug')).hide();
    });

    // load when exist old qty
    jQuery('.qty_discount.qty-count').each(function(index, elem) {
        if ($(elem).attr('data-isload') == 'isLoad') {
            // add new class to li.current-list
            $('.current-list').addClass('addHeight');
        }

        if ($(elem).val() != '0') {
            jQuery('.type_discount.qty-'+$(elem).attr('data-drug')).show();
            jQuery('.btn-cart-'+$(elem).attr('data-drug')).hide();

            // set value of qty
            jQuery('.qty_discount.qty-count-'+$(elem).attr('data-drug')).val(parseInt($(elem).val()));
        }
    });

    jQuery('.qty_root.qty-count').each(function(index, elem) {
        if ($(elem).attr('data-isload') == 'isLoad') {
            // add new class to li.current-list
            $('.current-list').addClass('addHeight');
        }

        if ($(elem).val() != '0') {
            jQuery('.type_root.qty-'+$(elem).attr('data-drug')).show();
            jQuery('.btn-cart-'+$(elem).attr('data-drug')).hide();

            // set value of qty
            jQuery('.qty_root.qty-count-'+$(elem).attr('data-drug')).val(parseInt($(elem).val()));
        }
    });

    // DISCOUNT ADD
    $('.qty_discount.qty-add').click(function(e){
        e.preventDefault();
        fieldName = $(this).attr('data-drug');
        var currentVal = parseInt($('.qty_discount.qty-count-'+fieldName).val());

        if (!isNaN(currentVal) || $('.qty_discount.qty-count-'+fieldName).val() == 0) {
            if ( $('.qty_discount.qty-count-'+fieldName).val() == 0) {
                currentVal = 0;
            }
            // ajax add qty
            var qty_post = currentVal + 1;
            var token = $('input[name="_token"]').val();
            var mind_id = $('input[name="mind_id"]').val();
            var user_id = $('input[name="user_id"]').val();
            var price = $('.price' +fieldName).val();
            var special_price = $('.special_price' +fieldName).val();
            var  dataType = $(this).attr('data-type');
            $.ajax({
                url: '<?php echo e(url('postProductCart')); ?>',
                type: 'PUT',
                data: "type_add=" + dataType + "&product_id=" + fieldName + "&qty=" + qty_post + "&mind_id=" + mind_id + "&user_id=" + user_id + "&price=" + price + "&special_price=" + special_price + "&_token=" + token
            })
            .done(function(response) {
                if(response.isRootPrice != '1' && response.isAddRoot == '0') {
                    $('.qty_discount.qty-count-'+fieldName).val(currentVal + 1);
                    $('.qty_discount.qty-minus').val("-").removeAttr('style');
                    $('.type_root.qty-'+fieldName).hide();
                } else if (response.isRootPrice == '1' && response.isAddRoot == '0') {
                    // qty > qty max discount
                    $('.qty_discount.qty-count-'+fieldName).val(currentVal);
                    $('.qty_discount.qty-minus').val("-").removeAttr('style');

                    $('.type_root.qty-'+fieldName).show();

                    // add new class to li.current-list
                    $('.current-list').addClass('addHeight');

                } else if(response.isRootPrice == '1' && response.isAddRoot == '1') {
                    // qty > qty max discount and is add root true
                    $('.type_root.qty-count-'+fieldName).val(response.cartData.qtyRoot);
                    $('.type_root.qty-minus').val("-").removeAttr('style');

                    $('.type_root.qty-'+fieldName).show();

                    // add new class to li.current-list
                    $('.current-list').addClass('addHeight');
                }
                $('.current-price').text(formatNumber(response.cartData.countRootTotalPrice));
                $('.discount-price').text(formatNumber(response.cartData.countDiscount));


                $('.total-price-cart').text(formatNumber(response.cartData.countRootTotalPrice));
                $('.total-qty-cart').text(formatNumber(response.cartData.countQty));
            });

        } else {
            // Otherwise put a 0 there
            $('.qty-count-'+fieldName).val(0);
            $('.qty-count-'+fieldName).html(0);

            $('.qty-'+$(this).attr('data-drug')).hide();
            $('.btn-cart-'+$(this).attr('data-drug')).show();

        }
    });


    // ROOT ADD
    $('.qty_root.qty-add').click(function(e){
        e.preventDefault();
        fieldName = $(this).attr('data-drug');
        var currentVal = parseInt($('.qty_root.qty-count-'+fieldName).val());
        if (!isNaN(currentVal) || $('.qty_root.qty-count-'+fieldName).val() == 0) {
            if ( $('.qty_root.qty-count-'+fieldName).val() == 0) {
                currentVal = 0;
            }
            // ajax add qty
            var qty_post = currentVal + 1;
            var token = $('input[name="_token"]').val();
            var mind_id = $('input[name="mind_id"]').val();
            var user_id = $('input[name="user_id"]').val();
            var price = $('.price' +fieldName).val();
            var special_price = $('.special_price' +fieldName).val();
            var  dataType = $(this).attr('data-type');
            $.ajax({
                url: '<?php echo e(url('postProductCart')); ?>',
                type: 'PUT',
                data: "type_add=" + dataType + "&product_id=" + fieldName + "&qty=" + qty_post + "&mind_id=" + mind_id + "&user_id=" + user_id + "&price=" + price + "&special_price=" + special_price + "&_token=" + token
            })
            .done(function(response) {
                if(response.isRootPrice == '1') {
                    $('.qty_root.qty-count-'+fieldName).val(currentVal + 1);
                    $('.qty_root.qty-minus').val("-").removeAttr('style');
                } else if (response.isRootPrice == '2') {
                    // qty > qty max discount
                    $('.qty_root.qty-count-'+fieldName).val(currentVal);
                    $('.qty_root.qty-minus').val("-").removeAttr('style');
                    if (response.message.errors) {
                        alert(response.message.errors);
                    }
                }
                $('.current-price').text(formatNumber(response.cartData.countRootTotalPrice));
                $('.discount-price').text(formatNumber(response.cartData.countDiscount));

                $('.total-price-cart').text(formatNumber(response.cartData.countRootTotalPrice));
                $('.total-qty-cart').text(formatNumber(response.cartData.countQty));
            });

        } else {
            // Otherwise put a 0 there
            $('.qty-count-'+fieldName).val(0);
            $('.qty-count-'+fieldName).html(0);

            $('.qty-'+$(this).attr('data-drug')).hide();
            $('.btn-cart-'+$(this).attr('data-drug')).show();

        }
    });


    // ROOT MINUS
    $(".qty_root.qty-minus").click(function(e) {
        e.preventDefault();
        fieldName = $(this).attr('data-drug');
        var currentVal = parseInt($('.qty_root.qty-count-'+fieldName).val());

        var token = $('input[name="_token"]').val();
        var mind_id = $('input[name="mind_id"]').val();
        var user_id = $('input[name="user_id"]').val();
        var price = $('.price' +fieldName).val();
        var special_price = $('.special_price' +fieldName).val();
        var  dataType = $(this).attr('data-type');

        if (!isNaN(currentVal) && currentVal > 1) {
            var qty_post = currentVal - 1;
            $.ajax({
                url: '<?php echo e(url('postProductCart')); ?>',
                type: 'PUT',
                data: "type_add=" + dataType + "&product_id=" + fieldName + "&qty=" + qty_post + "&mind_id=" + mind_id + "&user_id=" + user_id + "&price=" + price + "&special_price=" + special_price + "&_token=" + token
            })
            .done(function(response) {
                $('.current-price').text(formatNumber(response.cartData.countRootTotalPrice));
                $('.discount-price').text(formatNumber(response.cartData.countDiscount));

                $('.total-price-cart').text(formatNumber(response.cartData.countRootTotalPrice));
                $('.total-qty-cart').text(formatNumber(response.cartData.countQty));
            });

            $('.qty_root.qty-count-'+fieldName).val(currentVal - 1);
            $('.qty_root.qty-count-'+fieldName).html(currentVal - 1);
        } else {
            // delete product from cart when to - 0
            var qty_post = 0;
            $.ajax({
                url: '<?php echo e(url('postProductCart')); ?>',
                type: 'PUT',
                data: "type_add=" + dataType + "&product_id=" + fieldName + "&qty=" + qty_post + "&mind_id=" + mind_id + "&user_id=" + user_id + "&price=" + price + "&special_price=" + special_price + "&_token=" + token
            })
            .done(function(response) {
                $('.current-price').text(formatNumber(response.cartData.countRootTotalPrice));
                $('.discount-price').text(formatNumber(response.cartData.countDiscount));

                $('.total-price-cart').text(formatNumber(response.cartData.countRootTotalPrice));
                $('.total-qty-cart').text(formatNumber(response.cartData.countQty));

                $('.qty_root.qty-count-'+fieldName).val(0);
                $('.qty_root.qty-count-'+fieldName).html(0);

                $('.type_root.qty-'+fieldName).hide();

                $('.type_root.qty-box.qty-'+fieldName).hide();

                $('.type_root.btn-cart-'+fieldName).show();

                // remove new class to li.current-list

                $('.current-list').removeClass('addHeight');

                 // load when exist and show add class again
                jQuery('.qty_discount.qty-count').each(function(index, elem) {
                    if ($(elem).attr('data-isload') == 'isLoad') {
                        // add new class to li.current-list
                        $('.current-list').addClass('addHeight');
                    }
                });

                jQuery('.qty_root.qty-count').each(function(index, elem) {
                    if ($(elem).attr('data-isload') == 'isLoad') {
                        // add new class to li.current-list
                        $('.current-list').addClass('addHeight');
                    }
                });

            });
        }
    });

    // DISCOUNT MINUS
    $(".qty_discount.qty-minus").click(function(e) {
        e.preventDefault();
        fieldName = $(this).attr('data-drug');
        var currentVal = parseInt($('.qty_discount.qty-count-'+fieldName).val());

        var token = $('input[name="_token"]').val();
        var mind_id = $('input[name="mind_id"]').val();
        var user_id = $('input[name="user_id"]').val();
        var price = $('.price' +fieldName).val();
        var special_price = $('.special_price' +fieldName).val();
        var  dataType = $(this).attr('data-type');

        if (!isNaN(currentVal) && currentVal > 1) {
            var qty_post = currentVal - 1;
            $.ajax({
                url: '<?php echo e(url('postProductCart')); ?>',
                type: 'PUT',
                data: "type_add=" + dataType + "&product_id=" + fieldName + "&qty=" + qty_post + "&mind_id=" + mind_id + "&user_id=" + user_id + "&price=" + price + "&special_price=" + special_price + "&_token=" + token
            })
            .done(function(response) {
                $('.current-price').text(formatNumber(response.cartData.countRootTotalPrice));
                $('.discount-price').text(formatNumber(response.cartData.countDiscount));

                $('.total-price-cart').text(formatNumber(response.cartData.countRootTotalPrice));
                $('.total-qty-cart').text(formatNumber(response.cartData.countQty));
            });

            $('.qty_discount.qty-count-'+fieldName).val(currentVal - 1);
            $('.qty_discount.qty-count-'+fieldName).html(currentVal - 1);
        } else {
            // delete product from cart when to - 0
            var qty_post = 0;
            $.ajax({
                url: '<?php echo e(url('postProductCart')); ?>',
                type: 'PUT',
                data: "type_add=" + dataType + "&product_id=" + fieldName + "&qty=" + qty_post + "&mind_id=" + mind_id + "&user_id=" + user_id + "&price=" + price + "&special_price=" + special_price + "&_token=" + token
            })
            .done(function(response) {
                $('.current-price').text(formatNumber(response.cartData.countRootTotalPrice));
                $('.discount-price').text(formatNumber(response.cartData.countDiscount));

                $('.total-price-cart').text(formatNumber(response.cartData.countRootTotalPrice));
                $('.total-qty-cart').text(formatNumber(response.cartData.countQty));

                $('.qty_discount.qty-count-'+fieldName).val(0);
                $('.qty_discount.qty-count-'+fieldName).html(0);

                $('.qty_discount.qty-'+fieldName).hide();

                $('.qty-box.qty-'+fieldName).hide();

                $('.btn-cart-'+fieldName).show();
            });
        }
    });


    // ROOT DELETE
    $(".qty_root.qty-del, .qty_discount.qty-del").click(function(e) {
        var result = confirm("Bạn có chắc xóa sản phẩm?");
        if (result) {
            e.preventDefault();
            fieldName = $(this).attr('data-drug');

            var token = $('input[name="_token"]').val();
            var mind_id = $('input[name="mind_id"]').val();
            var user_id = $('input[name="user_id"]').val();
            var  dataType = $(this).attr('data-type');
            $.ajax({
                url: '<?php echo e(url('postProductCart')); ?>',
                type: 'PUT',
                data: "data_add=delete" +"&type_add=" + dataType + "&product_id=" + fieldName + "&mind_id=" + mind_id + "&user_id=" + user_id + "&_token=" + token
            })
            .done(function(response) {
               alert(response.message);
               window.location.href = window.location.href;
            });
       
        }
        
    });

    $(function () {
      $("input.qty-count").keydown(function () {
        // Save old value.
        $(this).data("old", $(this).val());
      });
      $("input.qty-count").keyup(function () {
        var maxValue = $(this).attr('max');
        // Check correct, else revert back to old value.
        if (parseInt($(this).val()) <= maxValue && parseInt($(this).val()) >= 0)
          ;
        else
          $(this).val($(this).data("old"));
      });
    });

</script>
<style type="text/css">
    .addHeight {
        min-height: 376px;
    }
</style>