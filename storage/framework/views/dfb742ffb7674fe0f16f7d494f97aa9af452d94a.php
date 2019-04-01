<?php $__env->startSection('colorlib_browsetask'); ?>
colorlib-active
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
		<div class="colorlib-contact">
			<div class="colorlib-narrow-content">
				<div class="row">
						<div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
							<span class="heading-meta">Browse available task</span>
							<h2 class="colorlib-heading">Tasks for you to work on</h2>
						</div>
				</div>
				<div class="row">
				<div id="root"></div>
				</div>
				<script src="<?php echo e(mix('/js/Main.js')); ?>" ></script>
			</div>
		</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>