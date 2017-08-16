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
<?php echo $__env->make('layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<section class="main-content">
	<div class="container">
		<div class="row">

			<!-- left bar -->
			<div class="col-md-3">

				<?php echo $__env->yieldContent('sidebar'); ?>

			</div>

			<!-- righ bar -->
			<div class="col-md-9">

				<?php echo $__env->yieldContent('main'); ?>

			</div>
		</div>
	</div>
</section>

<?php echo $__env->make('layouts.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

</body>
</html>
