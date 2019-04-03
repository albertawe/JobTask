<?php $__env->startSection('content'); ?>
		<div class="colorlib-contact">
			<div class="colorlib-narrow-content">
				<div class="row">
						<div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
							<span class="heading-meta">View Poster Evidence</span>
						</div>
				</div>
					<div class="col-md-7 col-md-push-1">
						    <div class="colorlib-narrow-content">
							    <div class="row">
                                        <div class="row">
                                                <div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
                                                <Br>
                                                    <span class="heading-meta">Poster Explaination</span>
                                                    <h2 class="colorlib-heading"><?php echo e($report->poster_message); ?></h2>
                                                </div>
                                                <div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
                                                    <span class="heading-meta">right click->view image at new tab) for better experience</span>
                                                </div>
                                                    <?php $__currentLoopData = json_decode($report->poster_image, true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <div class="itm" style="width: 300px; 
                                                            height: 500px; white-space: nowrap; overflow-x:scroll;  overflow-y:scroll; 
                                                            ">
                                                            <img src="<?php echo e(URL::to('/images/report/'.$image)); ?>" >
                                                        </div>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
							    </div>
					        </div>
				    </div>
                    <div class="row">
						<div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
							<span class="heading-meta">View Worker Evidence</span>
						</div>
				</div>
					<div class="col-md-7 col-md-push-1">
						    <div class="colorlib-narrow-content">
							    <div class="row">
                                        <div class="row">
                                                <div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
                                                <Br>
                                                    <span class="heading-meta">Worker Explaination</span>
                                                    <h2 class="colorlib-heading"><?php echo e($report->worker_message); ?></h2>
                                                </div>
                                                <div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
                                                    <span class="heading-meta">right click->view image at new tab) for better experience</span>
                                                </div>
                                                    <?php $__currentLoopData = json_decode($report->worker_image, true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <div class="itm" style="width: 300px; 
                                                            height: 500px; white-space: nowrap; overflow-x:scroll;  overflow-y:scroll; 
                                                            ">
                                                            
                                                            <img src="<?php echo e(URL::to('/images/report/'.$image)); ?>" >
                                                        </div>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php echo $__env->make('/layouts/template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>