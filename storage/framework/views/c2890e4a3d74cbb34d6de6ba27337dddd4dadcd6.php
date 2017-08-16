<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->

	<head>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>5Pharma - Trang quản trị</title>
		<meta name="description" content="">	
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<?php echo HTML::style('css/main_back.css'); ?>


		<!--[if (lt IE 9) & (!IEMobile)]>
			<?php echo HTML::script('js/vendor/respond.min.js'); ?>

		<![endif]-->
		<!--[if lt IE 9]>
			<?php echo e(HTML::style('https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js')); ?>

			<?php echo e(HTML::style('https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js')); ?>

		<![endif]-->

		<?php echo HTML::style('http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800'); ?>

		<?php echo HTML::style('http://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic'); ?>


        <?php echo $__env->yieldContent('head'); ?>

	</head>

  <body>
   <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <?php if(session('statut') == 'admin'): ?>
                    <?php echo link_to_route('admin', 'Trang quản trị', [], ['class' => 'navbar-brand']); ?>

                <?php else: ?>
                    <?php echo link_to_route('blog.index', trans('back/admin.redaction'), [], ['class' => 'navbar-brand']); ?>

                <?php endif; ?>
            </div>
            <!-- Menu  -->
            <ul class="nav navbar-right top-nav">
                <li><a href="<?php echo route('home'); ?>" target="_blank">Về trang chủ </a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-user"></span> Xin chào, <?php echo e(auth()->user()->name); ?><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="<?php echo url('administrator/logout'); ?>"><span class="fa fa-fw fa-power-off"></span> Đăng xuất</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Menu de la barre -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <?php if(session('statut') == 'admin'): ?>
                    <li <?php echo classActivePath('admin'); ?>>
                         <a href="<?php echo route('admin'); ?>"><span class="fa fa-fw fa-dashboard"></span> Quản trị</a>
                    </li>

                    <li <?php echo classActiveSegment(1, 'mind'); ?>>
                        <a href="<?php echo route('mind.index'); ?>"><span class="fa fa-fw fa-dashboard"></span> Phiên giao dịch</a>
                    </li>

                    <li <?php echo classActiveSegment(1, 'transactions'); ?>>
                        <a href="<?php echo route('transactions.index'); ?>"><span class="fa fa-fw fa-dashboard"></span> Giao dịch</a>
                    </li>

                    <li <?php echo classActiveSegment(1, 'groupdrug'); ?>>
                        <a href="<?php echo route('groupdrug.index'); ?>"><span class="fa fa-fw fa-dashboard"></span> Nhóm thuốc</a>
                    </li>

                    <li <?php echo classActiveSegment(1, 'drug'); ?>>
                        <a href="<?php echo route('drug.index'); ?>"><span class="fa fa-fw fa-dashboard"></span> Thuốc</a>
                    </li>

                    <li <?php echo classActiveSegment(1, 'pharmacies'); ?>>
                        <a href="<?php echo route('pharmacies.index'); ?>"><span class="fa fa-fw fa-dashboard"></span> Khách hàng</a>
                    </li>

                    <li <?php echo classActiveSegment(1, 'customer'); ?>>
                        <a href="<?php echo route('customer.index'); ?>"><span class="fa fa-fw fa-dashboard"></span> Người dùng</a>
                    </li>
                    <?php endif; ?>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <?php echo $__env->yieldContent('main'); ?>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /.page-wrapper -->

    </div>
    <!-- /.wrapper -->

    	<?php echo HTML::script('//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'); ?>

        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
    	<?php echo HTML::script('js/plugins.js'); ?>

    	<?php echo HTML::script('js/main.js'); ?>


        <?php echo $__env->yieldContent('scripts'); ?>

  </body>
</html>