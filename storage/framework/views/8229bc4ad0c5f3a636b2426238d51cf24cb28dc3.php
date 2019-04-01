<?php $__env->startSection('colorlib_offertask'); ?>
colorlib-active
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
		<div class="colorlib-contact">
			<div class="colorlib-narrow-content">
				<div class="row">
						<div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
							<span class="heading-meta">List of offer that you submit</span>
							<h2 class="colorlib-heading">Your offers</h2>
						</div>
				</div>
				<div class="row">
                <?php $__currentLoopData = $offers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<div class="col-md-4 col-sm-6 animate-box" data-animate-effect="fadeInLeft">
							<div class="blog-entry">
								<div class="desc">
								<h3><a href="viewtask/<?php echo e($offer->job_id); ?>"><?php echo e($offer->job_title); ?></a></h3>
									<span>Negotiation Price: <small><?php echo e($offer->nego); ?></small></br>
									Description: <small><?php echo e($offer->description); ?></small></br>
									<small><a href="/deleteoffer/<?php echo e($offer->id); ?>">cancel offer</a></small>
									</span></br>
								</div>
                        </div>
				</div>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
				</div> 
			</div>
		</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>