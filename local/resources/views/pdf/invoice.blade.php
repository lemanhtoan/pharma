<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>In hoá đơn</title>
    <link rel="icon" href="{!!url('/images/favicon.png')!!}" width="50" >
    <style>
        .page-break {
            page-break-after: always;
        }
        table, td, th {
            border: 1px solid #ddd;
            text-align: left;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            padding: 15px;
        }
        *{ font-family: DejaVu Sans; font-size: 11px;}
        .row,
        header,
        .content{
            float: left;
            width: 960px;
            margin: 20px;
        }
        .box-left {
            width: 480px;
            float: left;
        }
        .box-right {
            width: 480px;
            float: right;
            text-align: left;
        }
        .box-center {
            margin: 0 auto;
            text-align: center;
        }
        .center-lign {
            text-align: center;
        }
        .main-wrap {
            width: 1000px;
            margin: 0 auto;
        }

    </style>
</head>
<body>

    <?php $i=0; foreach ($orders as $item) : $i++;?>

    <div class="main-wrap">
        <div class="row">
            <div class="box-left">
                <p><span>Nhà thuốc:</span><label class="bold" for="">1</label></p>
                <p><span>Địa chỉ:</span><label class="normal" for="">2</label></p>
                <p><span>Người liên hệ:</span><label class="bold" for="">3</label></p>
                <p><span>SĐT:</span><label class="normal" for="">4</label></p>
            </div>
            <div class="box-right">
                <p><label class="bold" for="">Mã đơn hàng:</label><<span>N1</span>/p>
                <p><label class="bold" for="">1</label>Ngày đặt hàng:<span>N1</span>/p>
            </div>
        </div>
        <div class="row">
            <div class="box-center">
                <p><span><b>Tổng giá trị thuốc đặt</b></span><label class="bold" for="">1</label></p>
                <p><span><b>Chiết khấu</b></span><label class="normal" for="">2</label></p>
                <p><span>Phí mua hàng</span><label class="bold" for="">3</label></p>
                <p><span>Phí vận chuyển</span><label class="normal" for="">4</label></p>
                <p><span>Khuyến mại</span><label class="normal" for="">4</label></p>
                <p><span><b>Tổng cần thanh toán</b></span><label class="bold bg-yellow" for="">1</label></p>
            </div>
        </div>


        <div class="content">
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>ID Thuốc</th>
                        <th>Tên thuốc</th>
                        <th>Đvị buôn/th>
                        <th>SL đặt</th>
                        <th>Đơn giá</th>
                        <th>Thành tiền</th>
                        <th>Ghi chú</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $i?></td>
                        <td><?php echo $item->owner?></td>
                        <td><?php echo $item->phone?></td>
                        <td><?php echo $item->address?></td>
                        <td><?php echo $item->shipping_method?></td>
                        <td><?php echo $item->countQty?></td>
                        <td><?php echo number_format($item->end_total)?></td>
                        <td><?php echo $item->created_date?></td>
                    </tr>
                    <tr>
                        <td colspan="3"><b>Tổng</b></td>
                        <td>&nbsp;</td>
                        <td><b>1212</b></td>
                        <td>&nbsp;</td>
                        <td><b>rrrr</b></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="row">
            <div class="box-left ">
                <div class="center-lign">
                    <b>Bên giao hàng</b>
                </div>
            </div>
            <div class="box-right">
                <div class="center-lign">
                    <b>Bên nhận hàng</b>
                </div>
            </div>
        </div>

        <?php if ($i < count($orders)) :?>
        <div class="page-break"></div> <!-- new page -->
        <?php endif;?>


    </div>

    <?php endforeach; ?>
<?php die('ok')?>
</body>

</html>