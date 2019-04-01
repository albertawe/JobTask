<?php $__env->startSection('colorlib_message'); ?>
    colorlib-active
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="colorlib-contact">
        <div class="colorlib-narrow-content">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
                    <span class="heading-meta">Your list of message</span>
                    <h2 class="colorlib-heading">Messages between tasker and worker
                </div>
            </div>
            <div class="row">
                <?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-10 col-sm-6 animate-box" data-animate-effect="fadeInLeft">
                        <div class="blog-entry">
                           <div class="desc">
                                <h3 style="margin-bottom:10px;"><a href="viewcons/<?php echo e($mes->id); ?>" class="col-md-8">Pembahasan mengenai <?php echo e($mes->jobpost->title); ?></a></h3>
                                    <span class="col-md-8" style="margin-bottom:10px;"><small style="margin-bottom:10px;">messages between <?php echo e($mes->name1); ?>

                                        and <?php echo e($mes->name2); ?></small></br>
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