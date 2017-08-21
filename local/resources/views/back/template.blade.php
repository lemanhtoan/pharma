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
        <link rel="icon" href="{!!url('/images/favicon.png')!!}" width="50" >

		{!! HTML::style('css/main_back.css') !!}

		<!--[if (lt IE 9) & (!IEMobile)]>
			{!! HTML::script('js/vendor/respond.min.js') !!}
		<![endif]-->
		<!--[if lt IE 9]>
			{{ HTML::style('https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js') }}
			{{ HTML::style('https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js') }}
		<![endif]-->

		{!! HTML::style('http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800') !!}
		{!! HTML::style('http://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic') !!}

        @yield('head')

        <script type="text/javascript" src="{!! url('plugin/ckeditor/ckeditor.js') !!}"></script>


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
                @if(session('statut') == 'admin')
                    {!! link_to_route('admin', 'Trang quản trị', [], ['class' => 'navbar-brand']) !!}
                @else
                    {!! link_to_route('blog.index', trans('back/admin.redaction'), [], ['class' => 'navbar-brand']) !!}
                @endif
            </div>
            <!-- Menu  -->
            <ul class="nav navbar-right top-nav">
                <li><a href="{!! route('home') !!}" target="_blank">Về trang chủ </a></li>
                <?php if ( Auth::check() ) {?>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-user"></span> Xin chào, {{ auth()->user()->name }}<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="{!! url('administrator/logout') !!}"><span class="fa fa-fw fa-power-off"></span> Đăng xuất</a>
                        </li>
                    </ul>
                </li>
                <?php } ?>
            </ul>

            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="col-md-2">
                <div class="">
                    <ul class="nav nav-back">
                        @if(session('statut') == 'admin')
                            <li {!! classActivePath('admin') !!}>
                                <a href="{!! route('admin') !!}"><span class="fa fa-fw fa-dashboard"></span> Quản trị</a>
                            </li>

                            <li {!! classActiveSegment(1, 'mind') !!}>
                                <a href="{!! route('mind.index') !!}"><span class="fa fa-fw fa-dashboard"></span> Phiên giao dịch</a>
                            </li>

                            <li {!! classActiveSegment(1, 'transactions') !!}>
                                <a href="{!! route('transactions.index') !!}"><span class="fa fa-fw fa-dashboard"></span> Giao dịch</a>
                            </li>

                            <li {!! classActiveSegment(1, 'groupdrug') !!}>
                                <a href="{!! route('groupdrug.index') !!}"><span class="fa fa-fw fa-dashboard"></span> Nhóm thuốc</a>
                            </li>

                            <li {!! classActiveSegment(1, 'drug') !!}>
                                <a href="{!! route('drug.index') !!}"><span class="fa fa-fw fa-dashboard"></span> Thuốc</a>
                            </li>

                            <li {!! classActiveSegment(1, 'pharmacies') !!}>
                                <a href="{!! route('pharmacies.index') !!}"><span class="fa fa-fw fa-dashboard"></span> Khách hàng</a>
                            </li>

                            <li {!! classActiveSegment(1, 'customer') !!}>
                                <a href="{!! route('customer.index') !!}"><span class="fa fa-fw fa-dashboard"></span> Người dùng</a>
                            </li>

                            <li {!! classActiveSegment(1, 'discount') !!}>
                                <a href="{!! route('discount.index') !!}"><span class="fa fa-fw fa-dashboard"></span> Khuyến mãi</a>
                            </li>

                            <li {!! classActiveSegment(1, 'getsettings') !!}>
                                <a href="{!! url('getsettings') !!}"><span class="fa fa-fw fa-dashboard"></span> Cấu hình khác</a>
                            </li>

                        @endif
                    </ul>
                </div>
            </div>

            <div class="col-md-10 box-content-back">

                @yield('main')

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /.page-wrapper -->

    </div>
    <!-- /.wrapper -->

    	{!! HTML::script('//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js') !!}
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
    	{!! HTML::script('js/plugins.js') !!}
    	{!! HTML::script('js/main.js') !!}

        @yield('scripts')

  </body>
</html>