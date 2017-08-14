<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"/>
<title>Drug Store Manager</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<meta content="" name="description"/>
<meta content="" name="author"/>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
@include('admin.includes.css')
@yield('custom css')
<!-- END THEME STYLES -->
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="page-md page-header-fixed page-quick-sidebar-over-content ">
<!-- BEGIN HEADER -->
	@include('admin.includes.header')
<!-- END HEADER -->
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->

<div class="page-container">
	<!-- BEGIN SIDEBAR -->
	@include('admin.includes.side-menu')
	<!-- END SIDEBAR -->
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
			<!-- BEGIN PAGE CONTENT-->
			@yield('content')
			<!-- END PAGE CONTENT-->
		</div>
	</div>
	<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->

@include('admin.includes.footer')
<!-- END FOOTER -->
<!-- BEGIN CORE PLUGINS -->
@include('admin.includes.js')

<!-- END PAGE LEVEL SCRIPTS -->
 @yield('custom js')
</body>
<!-- END BODY -->
</html>