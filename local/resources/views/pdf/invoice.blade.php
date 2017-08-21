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
        *{ font-family: DejaVu Sans; font-size: 12px;}
    </style>
</head>
<body>
    <?php $i=0; foreach ($orders as $item) : $i++;?>
    <h1>{!! $title !!}<?php echo $item->id;?></h1>
    <div class="content">
        <table>
            <thead>
            <tr>
                <th>#</th>
                {{--<th>Name</th>--}}
                {{--<th>Phone</th>--}}
                {{--<th>Address</th>--}}
                {{--<th>Shiping method</th>--}}
                {{--<th>Quantity</th>--}}
                {{--<th>Total</th>--}}
                {{--<th>Date created</th>--}}
                {{--<th>Status</th>--}}
                <th>Tên người mua</th>
                <th>Số điện thoại</th>
                <th>Địa chỉ</th>
                <th>Phương thức vận chuyển</th>
                <th>Số lượng</th>
                <th>Thành tiền</th>
                <th>Ngày mua</th>
                <th>Trạng thái</th>
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
                <td><?php echo $item->status?></td>
            </tr>
            </tbody>
        </table>
    </div>

    <?php if ($i < count($orders)) :?>
        <div class="page-break"></div> <!-- new page -->
    <?php endif;?>

    <?php endforeach; ?>
</body>

</html>