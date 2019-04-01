<?php $__env->startSection('content'); ?>
		<div class="colorlib-contact">
			<div class="colorlib-narrow-content">
				<div class="row">
						<div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
							<span class="heading-meta">View Tasker Info</span>
							<h2 class="colorlib-heading">All you need to know about this tasker</h2>
						</div>
				</div>
					<div class="col-md-7 col-md-push-1">
						<div class="colorlib-narrow-content">
							<div class="row">
                            		<img src="/images/profile/<?php echo e($user->user_profile->image); ?>" style="width:250px;height:250px;">
                            		<div class="row">
											<div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
											<Br>
												<span class="heading-meta">First Name</span>
												<h2 class="colorlib-heading"><?php echo e($user->user_profile->first_name); ?></h2>
											</div>
											<div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
											<Br>	<span class="heading-meta">Last Name</span>
												<h2 class="colorlib-heading"><?php echo e($user->user_profile->last_name); ?></h2>
											</div>
											<div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
												<span class="heading-meta">Phone Number</span>
												<h2 class="colorlib-heading"><?php echo e($user->user_profile->phone); ?></h2>
											</div>
											<div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
												<span class="heading-meta">Email</span>
												<h2 class="colorlib-heading"><?php echo e($user->user_profile->email); ?></h2>
											</div>
											<div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
												<span class="heading-meta">Location</span>
												<h2 class="colorlib-heading"><?php echo e($user->user_profile->location); ?></h2>
											</div>
											<div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
												<span class="heading-meta">Birth Date</span>
												<h2 class="colorlib-heading"><?php echo e($user->user_profile->birthdate); ?></h2>
											</div>
											<div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
												<span class="heading-meta">Little more about me</span>
												<h2 class="colorlib-heading"><?php echo e($user->user_profile->tagline); ?></h2>
												<div class="row">
											<div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
												<h2 class="colorlib-heading">Skill</h2>
											</div>
											</div>
											<div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
												<span class="heading-meta">CV</span>
												<img src="/images/cv/<?php echo e($user->user_skill->cv); ?>" style="width:300px;height:600px;">
											</div>
											<br>
											<div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
												<span class="heading-meta">Transportation</span>
												<h2 class="colorlib-heading"><?php echo e($user->user_skill->transportation); ?></h2>
											</div>
											<div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
												<span class="heading-meta">Language</span>
												<h2 class="colorlib-heading"><?php echo e($user->user_skill->language); ?></h2>
											</div>
											<div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
												<span class="heading-meta">qualification</span>
												<h2 class="colorlib-heading"><?php echo e($user->user_skill->qualification); ?></h2>
											</div>
											<div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
												<span class="heading-meta">work experience</span>
												<h2 class="colorlib-heading"><?php echo e($user->user_skill->workexperience); ?></h2>
											</div>
											<div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
												<span class="heading-meta">tagline</span>
												<h2 class="colorlib-heading"><?php echo e($user->user_skill->tagline); ?></h2>
											</div>
											<?php if($user->user_skill->images): ?>
											<div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
												<span class="heading-meta">right click->view image at new tab) for better experience</span>
											</div>
												<?php $__currentLoopData = json_decode($user->user_skill->images, true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
													<div class="itm" style="width: 300px; 
													height: 500px; white-space: nowrap; overflow-x:scroll;  overflow-y:scroll; 
													">
													(
													<img src="<?php echo e(URL::to('/images/quali/'.$image)); ?>" >
													</div>
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											<?php endif; ?>
									</div>
							</div>
					</div>
				</div>
			</div>
			<?php if($jobs): ?>
					<div class="colorlib-contact">
			            <div class="colorlib-narrow-content">
				            <div class="row">
                                <div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
                                    <h2 class="colorlib-heading">Pekerjaan yang telah diselesaikan worker ini</h2>
                                </div>
				            </div>
							<div class="col-md-7 col-md-push-1">
								<div class="colorlib-narrow-content">
									<div class="row">
						<?php $__currentLoopData = $jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
							<h2 class="colorlib-heading"><?php echo e($job->title); ?></h2>
							<span class="heading-meta"><?php echo e($job->job_category); ?></span>
						</div>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                       			 	</div>
                        		</div>
                        	</div>
                    </div>
			<?php endif; ?>

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