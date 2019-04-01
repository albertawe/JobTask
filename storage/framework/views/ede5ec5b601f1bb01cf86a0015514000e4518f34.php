<?php $__env->startSection('colorlib_message'); ?>
    colorlib-active
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="colorlib-contact">
        <div class="colorlib-narrow-content">
            <!-- <div class="row" align="center"> -->
                <div id="chatList" align="center" data='<?php echo e($message->id); ?>' datauser='<?php echo e(Auth::user()->id); ?>'>
                <script src="<?php echo e(mix('/js/MainMessage.js')); ?>" ></script>
        <!-- <?php $__currentLoopData = $conversations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $conversation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <p><?php echo e($conversation->user->user_profile->first_name); ?> <?php echo e($conversation->user->user_profile->last_name); ?> : <?php echo e($conversation->content); ?></p>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> -->
                </div>
                <!-- <div id="form">
                    <form action="send_message/<?php echo e($message->id); ?>" method="post">
                        <input type="hidden" name="_token" class="btn btn-info" id="csrf-token" value="<?php echo e(Session::token()); ?>" /><br>
                        <input type="text" name="content"><br><br>
                        <input type="submit" value="Send" class="btn-primary btn">
                        <br><u><a href="/message">🡐 Back</a></u>
                    </form>
                </div> -->
            <!-- </div> -->
        </div>
    </div>
<?php $__env->stopSection(); ?>
</html>
<?php echo $__env->make('layouts/template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>