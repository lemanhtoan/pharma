<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>5Pharma</title>
	{!! HTML::style('css/bootstrap.min.css') !!}
	{!! HTML::style('css/styles.css') !!}
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
@include('layouts.header')

<section class="main-content">
	<div class="container">
		<div class="row">

			<!-- left bar -->
			<div class="col-md-3">

				@yield('sidebar')

			</div>

			<!-- righ bar -->
			<div class="col-md-9">

				@yield('main')

			</div>
		</div>
	</div>
</section>

@include('layouts.footer')

</body>
</html>
