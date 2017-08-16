<?php echo $__env->make('layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<section class="main-content">
	<div class="container">
		<div class="box-1-column">
			<?php echo $__env->yieldContent('main'); ?>
		</div>
	</div>
</section>

<?php echo $__env->make('layouts.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

</body>
</html>
