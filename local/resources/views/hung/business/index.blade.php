<!DOCTYPE html>
<html lang="en">
<head>
@include('hung.business.includes.header')
</head>
<body>
<div class="page-header" style="margin: 0;border: none;">	
	@include('hung.business.includes.slide-menu') 
</div>
@yield('content')
<div class="page-footer">
	<div class="container">
		 2017 &copy; DeliverMe
	</div>
</div>
<div class="scroll-to-top">
	<i class="icon-arrow-up"></i>
</div>
@include('hung.business.includes.js')
@yield('custom script')
</body>
</html>