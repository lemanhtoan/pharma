<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>5Pharma</title>
	<?php echo HTML::style('css/bootstrap.min.css'); ?>

	<?php echo HTML::style('css/styles.css'); ?>

	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<section class="main-content">
	<div class="container">
		<div class="box-1-column">
			<?php echo $__env->yieldContent('main'); ?>
		</div>
	</div>
</section>
<?php echo HTML::script('//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'); ?>

<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
<?php echo HTML::script('js/bootstrap.min.js'); ?>

<?php echo HTML::script('js/main.js'); ?>

</body>
</html>
