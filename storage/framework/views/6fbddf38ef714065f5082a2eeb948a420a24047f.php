<?php $__env->startSection('content'); ?>
		<div class="colorlib-contact">
			<div class="colorlib-narrow-content">
				<div class="row">
						<div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
							<span class="heading-meta">Top up your credit</span>
                            <?php if(\Session::has('alert-failed')): ?>
                                <div class="alert alert-failed">
                                    <div style="color:red"><?php echo e(Session::get('alert-failed')); ?></div>
                                </div>
                            <?php endif; ?>
                            <?php if(\Session::has('alert-success')): ?>
                                <div class="alert alert-success">
                                    <div><?php echo e(Session::get('alert-success')); ?></div>
                                </div>
                            <?php endif; ?>
						</div>
				</div>
					<div class="col-md-7 col-md-push-1">
						<div class="colorlib-narrow-content">
							<div class="row">

								<div class="col-md-10 col-md-offset-1 col-md-pull-1 animate-box" data-animate-effect="fadeInLeft">
									<form method="post" action="<?php echo e(url('posttopup')); ?>" enctype="multipart/form-data">
									<?php echo csrf_field(); ?>
										<div class="form-group">
										<span class="heading-meta">Add the nominal of credit you want to topup<br></span>
										<?php if($errors->has('price')): ?>

											<span class="text-danger"><?php echo e($errors->first('price')); ?></span>

										<?php endif; ?>
											<input type="number" value="" id="number" min="0" max="2000000" oninput="validity.valid||(value=value.replace(/\D+/g, ''))" class="form-control" placeholder="offer your price" name="price">
										</div>
										<div class="form-group">
											<input type="submit" class="btn btn-primary btn-send-message" value="topup">
										</div>
									</form>
								</div>
							</div>		
							</div>
					</div>
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