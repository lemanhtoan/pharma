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
<section class="main-content">
	<div class="container">
		<div class="box-1-column">
			@yield('main')
		</div>
	</div>
</section>
{!! HTML::script('//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js') !!}
<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
{!! HTML::script('js/bootstrap.min.js') !!}
{!! HTML::script('js/main.js') !!}
</body>
</html>
