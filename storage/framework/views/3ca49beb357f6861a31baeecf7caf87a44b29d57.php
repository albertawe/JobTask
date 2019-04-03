<?php $__env->startSection('colorlib_home'); ?>
colorlib-active
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
		<div class="colorlib-contact">
			<div class="colorlib-narrow-content">
				<?php if($errors->any()): ?>
				<h4><?php echo e($errors->first()); ?></h4>
				<?php endif; ?>
					<div class="row">
							<div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
								<span class="heading-meta">Receive more page</span>
							</div>
					</div>
					<div class="col-md-7 col-md-push-1">
							<div class="row">
								<div class="col-md-10 col-md-offset-1 col-md-pull-1 animate-box" data-animate-effect="fadeInLeft">
								<span class="heading-meta">put the differ amount and submit </span>
									<form method="post" action="/receivemore/<?php echo e($id); ?>" enctype="multipart/form-data">
									<?php echo csrf_field(); ?>
                                    <div class="form-group">
										<span class="heading-meta">Differ amount</span>
										<?php if($errors->has('price')): ?>

											<span class="text-danger"><?php echo e($errors->first('price')); ?></span>

										<?php endif; ?>
											<input type="number" value="" id="number" min="0" oninput="validity.valid||(value=value.replace(/\D+/g, ''))" class="form-control" placeholder="add the differ amount" name="price">
									</div>
										<div class="form-group">
											<input type="submit" class="btn btn-primary btn-send-message" value="submit amount">
										</div>
									</form>
								</div>
							
							</div>		
							<!-- </div> -->
					<!-- </div> -->
			</div>
			
		</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
		<script type="text/javascript">
		// Select your input element.
		var number = document.getElementById('number');

		// Listen for input event on numInput.
		number.onkeydown = function(e) {
			if(!((e.keyCode > 95 && e.keyCode < 106)
			|| (e.keyCode > 47 && e.keyCode < 58) 
			|| e.keyCode == 8)) {
				return false;
			}
		}
		</script>
	<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>