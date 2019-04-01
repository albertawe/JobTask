<?php $__env->startSection('colorlib_helptask'); ?>
    colorlib-active
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="colorlib-contact">
        <div class="colorlib-narrow-content">
            <div class="row">
            <div class="col-md-12 col-md-offset-1 col-md-pull-1 animate-box" data-animate-effect="fadeInLeft">
			<span class="heading-meta">
        <?php $__currentLoopData = $conversations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $conversation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($conversation->role == 'admin'): ?>
            <p> Admin: <?php echo e($conversation->content); ?></p><br><br>
        <?php else: ?>
            <p> Pelapor: <?php echo e($conversation->content); ?> </p><br><br>
        <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </span>
        </div>
            </div>
                <div id="form">
                    <form action="/report_message/<?php echo e($message->id); ?>" method="post">
                        <input type="hidden" name="_token" class="btn btn-info" id="csrf-token" value="<?php echo e(Session::token()); ?>" /><br>
                        <textarea id="message" cols="30" rows="7" placeholder="type your message here" name="content"></textarea>
                        <!-- <input type="text" name="content" style="width:400px;height:200px;"><br><br> -->
                        <br><br>
                        <input type="submit" value="Send" class="btn-primary btn">
                        <br><u><a href="/reportmessage">🡐 Back</a></u>
                    </form>
                </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<script type="text/javascript">
setTimeout(() => {
    location.reload();
}, 100000);
</script>
</html>
<?php echo $__env->make('layouts/templates', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>