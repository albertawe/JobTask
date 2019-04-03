<?php $__env->startSection('colorlib_mytask'); ?>
colorlib-active
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
		<div class="colorlib-contact">
			<div class="colorlib-narrow-content">
				<div class="row">
						<div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
							<span class="heading-meta">Your Task</span>
							<h2 class="colorlib-heading">Task Related to you</h2>
						</div>
				</div>
				<?php if(\Session::has('alert-failed')): ?>
					<div class="alert alert-failed">
						<div><?php echo e(Session::get('alert-failed')); ?></div>
					</div>
				<?php endif; ?>
				<?php if(\Session::has('alert-success')): ?>
					<div class="alert alert-success">
						<div><?php echo e(Session::get('alert-success')); ?></div>
					</div>
				<?php endif; ?>
				<div class="row">
						<div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
							<span class="heading-meta">Posted Job</span>
							<h2 class="colorlib-heading">Job that you posted</h2>
						</div>
				</div>
				<div class="row">
                <?php $__currentLoopData = $postedjobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<div class="col-md-4 col-sm-6 animate-box" data-animate-effect="fadeInLeft">
							<div class="blog-entry">
								<div class="desc">
								<h3><a href="viewtask/<?php echo e($job->id); ?>"><?php echo e($job->title); ?></a></h3>
									<span>Due Date: <small><?php echo e($job->due_date); ?></small></br>
									Category: <small><?php echo e($job->job_category); ?></small></br>
									Type: <small><?php echo e($job->job_type); ?></small></br>
									Description: <small><?php echo e($job->job_description); ?></small>
									<?php if($job->status == 'canceled'): ?>
										<small style="color:red">this task has been canceled</small>
									<?php elseif($job->status == 'finished'): ?>
										<small style="color:green">this task finished</small>
									<?php elseif($job->due_date < $today && $job->status == 'not assigned'): ?>
									<small style="color:red">this task has past its due date</small>
									<?php endif; ?>
									</span>
								</div>
                        </div>
				</div>
				
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
				</div>
				<div class="row">
						<div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
							<span class="heading-meta">Received Job</span>
							<h2 class="colorlib-heading">Job that you accepted as duty</h2>
						</div>
				</div>
				<div class="row">
                <?php $__currentLoopData = $acceptjobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jobb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<div class="col-md-4 col-sm-6 animate-box" data-animate-effect="fadeInLeft">
							<div class="blog-entry">
								<div class="desc">
								<h3><a href="viewtask/<?php echo e($jobb->id); ?>"><?php echo e($jobb->title); ?></a></h3>
									<span>Due Date: <small><?php echo e($jobb->due_date); ?></small></br>
									Category: <small><?php echo e($jobb->job_category); ?></small></br>
									Type: <small><?php echo e($jobb->job_type); ?></small></br>
									Description: <small><?php echo e($jobb->job_description); ?></small>
									<?php if($jobb->status == 'finished'): ?>
										<small style="color:green">this task finished</small>
									<?php elseif($jobb->status == 'canceled'): ?>
										<small style="color:red">this task has been canceled</small>
									<?php endif; ?>
									</span>
									
								</div>
                        </div>
				</div>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
				</div> 
			</div>
		</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>