<!-- modal message product -->
<div class="modal fade" id="messageEmpty"
     role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal"><img src="{!!url('/images/close.png')!!}" alt=""></button>
            <div class="modal-body">
                <p&nbsp;</p><p>&nbsp;</p>
                <h4 style="text-align: center">Bạn chưa chọn sản phẩm nào, vui lòng chọn sản phẩm.</h4>
                <p>&nbsp;</p><p>&nbsp;</p>
            </div>
        </div>
    </div>
</div>
<!-- end modal message product -->

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
{!! HTML::script('js/main.js') !!}

<script>

    function formatNumber (num) {
        return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,")
    }

    // check alert before buy
    jQuery('#btn_checkout').click(function(){
       if (jQuery('.current-price').text() == '0') {
//           alert('Bạn chưa chọn sản phẩm nào, vui lòng chọn sản phẩm.');
           $('#messageEmpty').modal('show');
           return false;
       }
    });

    // show - hide qty box
    jQuery('.btn-cart').click(function(){
        //$("div#divLoading").addClass('show');
        var type_price = $(this).attr('data-type');
        if (type_price == 'type_discount') {
            // add to 1 and show input
            discountAdd(jQuery(this).attr('data-drug'), 'beginadd');

            jQuery('.'+type_price+'.qty-'+jQuery(this).attr('data-drug')).show();
            jQuery('.btn-cart-'+jQuery(this).attr('data-drug')).hide();

            jQuery('.box-spprice').show();
        } else {
            // root
            // add to 1 and show input
            rootAdd(jQuery(this).attr('data-drug'), 'beginadd');

            jQuery('.'+type_price+'.qty-'+jQuery(this).attr('data-drug')).show();
            jQuery('.btn-cart-'+jQuery(this).attr('data-drug')).hide();
        }

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
        //$("div#divLoading").addClass('show');
        e.preventDefault();
        discountAdd(jQuery(this).attr('data-drug'), '');
        jQuery('.box-spprice').show();
    });

    function discountAdd(fieldName, type) {
        if (type =='beginadd') {
            // click add to cart
            var currentVal = 0;
            // ajax add qty
            var qty_post = currentVal + 1;
            var token = $('input[name="_token"]').val();
            var mind_id = $('input[name="mind_id"]').val();
            var user_id = $('input[name="user_id"]').val();
            var price = $('.price' +fieldName).val();
            var special_price = $('.special_price' +fieldName).val();
            var  dataType = $('.btn-cart-' +fieldName).attr('data-type');
            $.ajax({
                url: '{{ url('postProductCart') }}',
                type: 'PUT',
                data: "type_add=" + dataType + "&product_id=" + fieldName + "&qty=" + qty_post + "&mind_id=" + mind_id + "&user_id=" + user_id + "&price=" + price + "&special_price=" + special_price + "&_token=" + token
            })
            .done(function(response) {
                $('.qty_discount.qty-count-'+fieldName).val(currentVal + 1);
                $('.qty_discount.qty-minus').val("-").removeAttr('style');
                $('.type_discount.btn-cart-'+fieldName).hide();
                $('.type_discount.qty-'+fieldName).show();

                $('.current-price').text(formatNumber(response.cartData.countRootTotalPrice));
                $('.discount-price').text(formatNumber(response.cartData.countDiscount));


                $('.total-price-cart').text(formatNumber(response.cartData.countRootTotalPrice));
                $('.total-qty-cart').text(formatNumber(response.cartData.countQty));

                //setTimeout(function(){$("div#divLoading").removeClass('show');}, 2000);
            });

        } else {
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
                var  dataType = 'type_discount';//$(this).attr('data-type');
                $.ajax({
                    url: '{{ url('postProductCart') }}',
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

                    //setTimeout(function(){$("div#divLoading").removeClass('show');}, 2000);
                });

            } else {
                // Otherwise put a 0 there
                $('.qty-count-'+fieldName).val(0);
                $('.qty-count-'+fieldName).html(0);

                $('.qty-'+$(this).attr('data-drug')).hide();
                $('.btn-cart-'+$(this).attr('data-drug')).show();

                //setTimeout(function(){$("div#divLoading").removeClass('show');}, 2000);

            }
        }

    }

    function rootAdd(fieldName, type) {
        if (type =='beginadd') {
            var currentVal = 0;
            // ajax add qty
            var qty_post = currentVal + 1;
            var token = $('input[name="_token"]').val();
            var mind_id = $('input[name="mind_id"]').val();
            var user_id = $('input[name="user_id"]').val();
            var price = $('.price' +fieldName).val();
            var special_price = $('.special_price' +fieldName).val();
            var  dataType = 'type_root';
            $.ajax({
                url: '{{ url('postProductCart') }}',
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

                //setTimeout(function(){$("div#divLoading").removeClass('show');}, 2000);
                if(response.cartData.countDiscount> 0){
                    jQuery('.box-spprice').show();
                }

            });

        } else {
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
                var  dataType = 'type_root';
                $.ajax({
                    url: '{{ url('postProductCart') }}',
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

                    //setTimeout(function(){$("div#divLoading").removeClass('show');}, 2000);
                });

            } else {
                // Otherwise put a 0 there
                $('.qty-count-'+fieldName).val(0);
                $('.qty-count-'+fieldName).html(0);

                $('.qty-'+$(this).attr('data-drug')).hide();
                $('.btn-cart-'+$(this).attr('data-drug')).show();

                //setTimeout(function(){$("div#divLoading").removeClass('show');}, 2000);

            }

        }
    }

    $(".qty-count").change(function(e) {
        //$("div#divLoading").addClass('show');
        onchangeAdd($(this).attr('data-drug'), $(this).attr('data-type'));
    });
    // on change input qty
    function onchangeAdd(fieldName, type) {
        var currentVal = parseInt($('.'+type+'.qty-count-'+fieldName).val());
        var qty_post = currentVal ;
        var token = $('input[name="_token"]').val();
        var mind_id = $('input[name="mind_id"]').val();
        var user_id = $('input[name="user_id"]').val();
        var price = $('.price' +fieldName).val();
        var special_price = $('.special_price' +fieldName).val();
        var  dataType = type;//$(this).attr('data-type');
        $.ajax({
            url: '{{ url('postProductCart') }}',
            type: 'PUT',
            data: "type_add=" + dataType + "&product_id=" + fieldName + "&qty=" + qty_post + "&mind_id=" + mind_id + "&user_id=" + user_id + "&price=" + price + "&special_price=" + special_price + "&_token=" + token
        })
        .done(function(response) {
            // hide button continue cart checkout
            if(response.cartData.countQty == '0') {
                $('.btn-sumit').hide();
            }else {
                $('.btn-sumit').show();
            }

            if (response.isRootPrice == '2') {
                // qty > qty max discount
                $('.qty_root.qty-count-'+fieldName).val(currentVal);
                $('.qty_root.qty-minus').val("-").removeAttr('style');
                if (response.message.errors) {
                    alert(response.message.errors);
                }

            }
            if(response.isRootPrice != '1' && response.isAddRoot == '0') {
                if (response.isRootPrice != '2') {
                    $('.qty_discount.qty-count-' + fieldName).val(parseInt($('.type_discount.qty-count-' + fieldName).val()));
                    $('.qty_discount.qty-minus').val("-").removeAttr('style');
                    $('.type_root.qty-' + fieldName).hide();
                } else {
                    $('.type_root.qty-count-' + fieldName).val(response.cartData.countQty);
                }

            } else if (response.isRootPrice == '1' && response.isAddRoot == '0') {
                // qty > qty max discount
                $('.qty_discount.qty-count-'+fieldName).val(parseInt($('.type_discount.qty-count-'+fieldName).val()));
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

            //setTimeout(function(){$("div#divLoading").removeClass('show');}, 2000);
        });
    }


    // ROOT ADD
    $('.qty_root.qty-add').click(function(e){
        //$("div#divLoading").addClass('show');
        e.preventDefault();
        rootAdd(jQuery(this).attr('data-drug'), '');

    });


    // ROOT MINUS
    $(".qty_root.qty-minus").click(function(e) {
        //$("div#divLoading").addClass('show');
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
                url: '{{ url('postProductCart') }}',
                type: 'PUT',
                data: "type_add=" + dataType + "&product_id=" + fieldName + "&qty=" + qty_post + "&mind_id=" + mind_id + "&user_id=" + user_id + "&price=" + price + "&special_price=" + special_price + "&_token=" + token
            })
            .done(function(response) {

                // hide button continue cart checkout
                if(response.cartData.countQty == '0') {
                    $('.btn-sumit').hide();
                }else {
                    $('.btn-sumit').show();
                }

                $('.current-price').text(formatNumber(response.cartData.countRootTotalPrice));
                $('.discount-price').text(formatNumber(response.cartData.countDiscount));

                $('.total-price-cart').text(formatNumber(response.cartData.countRootTotalPrice));
                $('.total-qty-cart').text(formatNumber(response.cartData.countQty));

                //setTimeout(function(){$("div#divLoading").removeClass('show');}, 2000);
            });

            $('.qty_root.qty-count-'+fieldName).val(currentVal - 1);
            $('.qty_root.qty-count-'+fieldName).html(currentVal - 1);
        } else {
            // delete product from cart when to - 0
            var qty_post = 0;
            $.ajax({
                url: '{{ url('postProductCart') }}',
                type: 'PUT',
                data: "type_add=" + dataType + "&product_id=" + fieldName + "&qty=" + qty_post + "&mind_id=" + mind_id + "&user_id=" + user_id + "&price=" + price + "&special_price=" + special_price + "&_token=" + token
            })
            .done(function(response) {

                // hide button continue cart checkout
                if(response.cartData.countQty == '0') {
                    $('.btn-sumit').hide();
                }else {
                    $('.btn-sumit').show();
                }

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

                jQuery('.tr-row-'+fieldName).remove();

                jQuery('.box-spprice').hide();

                //setTimeout(function(){$("div#divLoading").removeClass('show');}, 2000);
            });
        }
    });

    // DISCOUNT MINUS
    $(".qty_discount.qty-minus").click(function(e) {
        //$("div#divLoading").addClass('show');
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
                url: '{{ url('postProductCart') }}',
                type: 'PUT',
                data: "type_add=" + dataType + "&product_id=" + fieldName + "&qty=" + qty_post + "&mind_id=" + mind_id + "&user_id=" + user_id + "&price=" + price + "&special_price=" + special_price + "&_token=" + token
            })
            .done(function(response) {

                // hide button continue cart checkout
                if(response.cartData.countQty == '0') {
                    $('.btn-sumit').hide();
                }else {
                    $('.btn-sumit').show();
                }

                $('.current-price').text(formatNumber(response.cartData.countRootTotalPrice));
                $('.discount-price').text(formatNumber(response.cartData.countDiscount));

                $('.total-price-cart').text(formatNumber(response.cartData.countRootTotalPrice));
                $('.total-qty-cart').text(formatNumber(response.cartData.countQty));

                //setTimeout(function(){$("div#divLoading").removeClass('show');}, 2000);
            });

            $('.qty_discount.qty-count-'+fieldName).val(currentVal - 1);
            $('.qty_discount.qty-count-'+fieldName).html(currentVal - 1);
        } else {
            // delete product from cart when to - 0
            var qty_post = 0;
            $.ajax({
                url: '{{ url('postProductCart') }}',
                type: 'PUT',
                data: "type_add=" + dataType + "&product_id=" + fieldName + "&qty=" + qty_post + "&mind_id=" + mind_id + "&user_id=" + user_id + "&price=" + price + "&special_price=" + special_price + "&_token=" + token
            })
            .done(function(response) {

                // hide button continue cart checkout
                if(response.cartData.countQty == '0') {
                    $('.btn-sumit').hide();
                }else {
                    $('.btn-sumit').show();
                }

                $('.current-price').text(formatNumber(response.cartData.countRootTotalPrice));
                $('.discount-price').text(formatNumber(response.cartData.countDiscount));

                $('.total-price-cart').text(formatNumber(response.cartData.countRootTotalPrice));
                $('.total-qty-cart').text(formatNumber(response.cartData.countQty));

                $('.qty_discount.qty-count-'+fieldName).val(0);
                $('.qty_discount.qty-count-'+fieldName).html(0);

                $('.qty_discount.qty-'+fieldName).hide();

                $('.qty-box.qty-'+fieldName).hide();

                $('.btn-cart-'+fieldName).show();

                jQuery('.tr-row-'+fieldName).remove();

                jQuery('.box-spprice').hide();

                //setTimeout(function(){$("div#divLoading").removeClass('show');}, 2000);
            });
        }
    });


    // ROOT DELETE
    $(".qty_root.qty-del, .qty_discount.qty-del").click(function(e) {

        var result = confirm("Bạn có chắc xóa sản phẩm?");
        if (result) {

            //$("div#divLoading").addClass('show');
            e.preventDefault();
            fieldName = $(this).attr('data-drug');

            var token = $('input[name="_token"]').val();
            var mind_id = $('input[name="mind_id"]').val();
            var user_id = $('input[name="user_id"]').val();
            var  dataType = $(this).attr('data-type');
            $.ajax({
                url: '{{ url('postProductCart') }}',
                type: 'PUT',
                data: "data_add=delete" +"&type_add=" + dataType + "&product_id=" + fieldName + "&mind_id=" + mind_id + "&user_id=" + user_id + "&_token=" + token
            })
            .done(function(response) {
                //alert(response.message);
                $('.current-price').text(formatNumber(response.cartData.countRootTotalPrice));
                $('.discount-price').text(formatNumber(response.cartData.countDiscount));

                $('.total-price-cart').text(formatNumber(response.cartData.countRootTotalPrice));
                $('.total-qty-cart').text(formatNumber(response.cartData.countQty));

                // hide root qty box
//                if (dataType == 'type_root') {
//                    jQuery('.'+dataType+'.qty-'+fieldName).remove();
//                    if (jQuery('.type_discount.qty-'+fieldName).is(":visible") == false) {
//                        jQuery('.type_discount.tr-row-'+fieldName).remove();
//                        jQuery('.type_root.tr-row-'+fieldName).remove();
//                    } else {
//                        jQuery('.type_root.tr-row-'+fieldName).remove();
//                    }
                    window.location.href = window.location.href;
//                }

//                if (dataType == 'type_discount') {
//                    jQuery('.'+dataType+'.qty-'+fieldName).remove();
//                    //if ()
//                    if (jQuery('.type_root.qty-'+fieldName).is(":visible") == false) {
//                        jQuery('.'+dataType+'.tr-row-'+fieldName).remove();
//                    }
//                    window.location.href = window.location.href;
//                }

                //setTimeout(function(){$("div#divLoading").removeClass('show');}, 2000);
            });
       
        }
        
    });

    /*
    $(function () {
      $("input.qty-count").keydown(function () {
        // Save old value.
        $(this).data("old", $(this).val());
      });
      $("input.qty-count").keyup(function () {
        var maxValue = $(this).attr('max');
        console.log(maxValue);
        if (maxValue != 0) {
            // Check correct, else revert back to old value.
            if (parseInt($(this).val()) <= maxValue && parseInt($(this).val()) >= 0)
                ;
            else
                $(this).val($(this).data("old"));
        }

      });
    });
    */

</script>
<style type="text/css">
    .addHeight {
        min-height: 394px;
    }

    .pag-nav .pagination {
        float: right;
    }
    .pag-nav .pagination li a, .pag-nav .pagination li.disabled span {
        margin: 0 5px;
        border-radius: 4px;
        background: #17be9b;
        color: #fff;
        border-color: #17be9b
    }
    .pag-nav .pagination .active a, .pag-nav .pagination .active span {
        color: #17be9b !important;
        background: #fff;
        border-color: #17be9b;
        border-radius: 4px;
    }
    .pag-nav .pagination li a:hover,
    .pag-nav .pagination .active a:hover {
        color: #17be9b !important;
        background: #fff;
        border-color: #17be9b
    }
    .pag-nav li:last-child a {
        margin-right: 0;
    }
    .pag-nav .pagination li span, pag-nav .pagination li a {
        cursor: pointer;
    }
    h3.title-product {
        min-height: 35px;
        max-height: 35px;
        overflow: hidden;
    }
    h4.modal-title {
        margin-bottom: 10px;
    }

    footer {
        position: absolute;
        left: 0;
        bottom: 0;
        height: 70px;
        width: 100%;
    }

    body {
        margin: 0 0 70px !important;
    }

    html {
        position: relative;
        min-height: 100%;
    }
</style>