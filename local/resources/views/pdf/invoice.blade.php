<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>In hoá đơn</title>
    <link rel="icon" href="{!!url('/images/favicon.png')!!}" width="50" >
    <style>
        body {
            color: #535353;
        }
        .page-break {
            page-break-after: always;
        }
        table, td, th {
            border: 1px solid #f3f3f3;
            text-align: left;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            padding: 5px;
        }
        *{ font-family: DejaVu Sans; font-size: 11px;}

        header,
        .content{
            float: left;
            width: 660px;
            margin: 5px 20px;
        }
        .box-left {
            width: 300px;
            float: left;
        }
        .box-right {
            width: 300px;
            float: right;
            text-align: left;
        }
        .box-center {
            margin: 0 auto;
            width:225px;
        }
        .center-lign {
            text-align: center;
        }
        .main-wrap {
            width: 660px;
            margin: 0 auto;
        }
        .in-logo img {
            width: 60px;padding: 20px 50px;
        }
        .in-logo {
            width: 20%;
            float: left;
        }
        .text-center {
            float: right;
            width: 80%;
            margin-top: 4%;
        }
        .text-center h2 {
            margin-left: 25%;
            font-size: 20px;
        }

        .box-right p {
            text-align: right;
        }
        label.bold {
            font-weight: bold;
        }

        .box-left span {
            width: 100px !important;
            float: left;
        }

        .box-right label {
            width: 107px;
        }

        .box-right span {
            float: right;
            margin-left: 15px;
        }

        .box-center span {
            width: 140px;
            float: left;
        }
        .footer-top {
            float: left;
            width: 100%;
            margin: 70px 0;
        }
        .footer-bottom, .header-top, .header-begin {
            float: left;
            width: 100%;
        }
        .clear {
            clear: both;
        }
        p {
            line-height: 10px !important;
        }
    </style>
</head>
<body class="in-order">

    <?php $i=0; foreach ($orders as $item) : $i++;?>

    <div class="main-wrap">
        <div style="float: left !important; width: 660px!important; ">
            <div class="in-logo" style="width: 150px; float: left">
                <?php $dataLogoPc = DB::table('settings')->where('name', 'dataLogo')->select('content')->get()[0]; ?>
                <img class="logo" src="{!!url('/uploads/commons/'.$dataLogoPc->content )!!}" align="logo" />
            </div>
            <div class="text-center"  style="width: 510px; float: right">
                <h2>PHIẾU XUẤT HÀNG</h2>
            </div>
        </div>
        <div class="clear"></div>
        <div >
            <div class="box-left" style="width: 330px; float: left">
                <p>Nhà thuốc:<label class="bold" for=""><?php echo $item['parcies']?></label></p>
                <p>Địa chỉ:<label class="normal" for=""><?php echo $item['info']['address']?></label></p>
                <p>Người liên hệ:<label class="bold" for=""><?php echo $item['info']['owner']?></label></p>
                <p>SĐT:<label class="normal" for=""><?php echo $item['info']['phone']?></label></p>
            </div>
            <div class="box-right"  style="width: 330px; float: right">
                <p><b>Mã đơn hàng:</b> #<?php echo $item['info']['id']?> </p>
                <p><b>Ngày đặt hàng:</b> <?php echo $item['info']['created_date']?></p>
            </div>
        </div>
        <div class="clear"></div>
        <div class="row">
            <div class="box-center">
                <p><span><b>Tổng giá trị thuốc đặt</b></span><label class="bold" for=""><?php echo number_format($item['info']['sub_total'])?></label></p>
                <p><span><b>Chiết khấu</b></span><label class="normal" for=""><?php echo number_format($item['info']['cost_discount'])?></label></p>
                <p><span>Phí mua hàng</span><label class="bold" for=""><?php echo number_format($item['info']['buyer_cost'])?></label></p>
                <p><span>Phí vận chuyển</span><label class="normal" for=""><?php echo number_format($item['info']['shipping_cost'])?></label></p>
                <p><span>KM vận chuyển</span><label class="normal" for=""><?php echo number_format($item['kmvc'])?></label></p>
                <p><span><b>Tổng cần thanh toán</b></span><label class="bold bg-yellow" for=""><?php echo number_format($item['info']['end_total'])?></label></p>
            </div>
        </div>

        <div class="content">
            <table>
                <thead>
                <tr>
                    <th>#</th>
                    <th>ID Thuốc</th>
                    <th>Tên thuốc</th>
                    <th>Đvị buôn</th>
                    <th>SL đặt</th>
                    <th>Đơn giá</th>
                    <th>Thành tiền</th>
                    <th>Ghi chú</th>
                </tr>
                </thead>
                <tbody>
                <?php $j = 0; foreach($item['listDrug'] as $drug) { $j++;?>
                <tr>
                    <td><?php echo $j?></td>
                    <td><?php echo $drug['infoDrug']['code']?></td>
                    <td><?php echo $drug['infoDrug']['name']?></td>
                    <td><?php echo $drug['infoDrug']['donvibuon']?></td>
                    <td><?php echo $drug['info']['qty']?></td>
                    <td><?php echo number_format($drug['info']['price']/$drug['info']['qty'])?></td>
                    <td><?php echo number_format($drug['info']['price'])?></td>
                    <td><?php echo $drug['infoDrug']['note']?></td>
                </tr>
                <?php } ?>
                <tr>
                    <td colspan="3"><b>Tổng</b></td>
                    <td>&nbsp;</td>
                    <td><b><?php echo $item['info']['countQty']?></b></td>
                    <td>&nbsp;</td>
                    <td><b><?php echo number_format($item['info']['end_total'])?></b></td>
                    <td>&nbsp;</td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="clear"></div>
        <div class="row footer-top">
            <div class="box-left ">
                <div class="center-lign" style="margin: 30px 0 50px 0 !important;">
                    <b>Bên giao hàng</b>
                </div>
            </div>
            <div class="box-right">
                <div class="center-lign" style="margin: 30px 0 50px 0 !important;">
                    <b>Bên nhận hàng</b>
                </div>
            </div>
        </div>
        <div class="clear"></div>
        <div class="row footer-bottom">
            <div class="box-left" style="width: 400px !important;">
                <p style="font-size: 10px!important;"><i>Mọi thắc mắc, vui lòng liên hệ tới 5Pharma theo Hotline: <b>024.3237.3659</b></i></p>
            </div>
            <div class="box-right">
                <p>Trang <?php echo $i; ?></p>
            </div>

        </div>

        <?php if ($i < count($orders)) :?>
        <div class="page-break"></div> <!-- new page -->
        <?php endif;?>

    </div>

    <?php endforeach; ?>

</body>
<?php //die()?>
</html>