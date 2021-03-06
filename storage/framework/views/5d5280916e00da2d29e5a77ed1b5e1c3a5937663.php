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
        <div class="container bg-white">

            <?php echo $__env->yieldContent('main'); ?>

        </div>
    	<?php echo HTML::script('//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'); ?>

        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
    	<?php echo HTML::script('js/plugins.js'); ?>

    	<?php echo HTML::script('js/main.js'); ?>


        <?php echo $__env->yieldContent('scripts'); ?>

  </body>
</html>