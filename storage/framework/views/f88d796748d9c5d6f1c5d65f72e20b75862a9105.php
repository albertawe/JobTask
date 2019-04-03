<?php $__env->startSection('colorlib_helptask'); ?>
    colorlib-active
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="colorlib-contact">
        <div class="colorlib-narrow-content">
        <div class="row">
		<div class="col-md-10 col-md-offset-1 col-md-pull-1 animate-box" data-animate-effect="fadeInLeft">
			<form method="post" action="<?php echo e(action('root\Reportmessagecontroller@generate')); ?>" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
				<span class="heading-meta"><h5>let us know what's your problem and generate your waiting ticket</h5></span>
					<div class="form-group">
						<?php if($errors->has('title')): ?>
							<span class="text-danger"><?php echo e($errors->first('title')); ?></span>
						<?php endif; ?>
						    <input type="text" value="" class="form-control" placeholder="i have a problem with..." name="title">
					</div>
					<div class="form-group">
						<input type="submit" class="btn btn-primary btn-send-message" value="generate report">
					</div>
				</form>
			</div>
		</div>
            <div class="row">
            <span class="heading-meta"><h5>active report chat room</h5></span>
                <?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-10 col-sm-6 animate-box" data-animate-effect="fadeInLeft">
                        <div class="blog-entry">
                           <div class="desc">
                                <h3><a href="viewreport/<?php echo e($mes->id); ?>">
                                Title: <?php echo e($mes->title); ?></a></h3>
                                <span>Ticket number: <small><?php echo e($mes->ticket); ?></small></span>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div class="row">
            <span class="heading-meta"><h5>your completed report chat room</h5></span>
                <?php $__currentLoopData = $pastmessages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-10 col-sm-6 animate-box" data-animate-effect="fadeInLeft">
                        <div class="blog-entry">
                           <div class="desc">
                           <h3>
                           Title: <?php echo e($mes->title); ?></h3>
                                <span>Ticket number: <small><?php echo e($mes->ticket); ?></small></span>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>