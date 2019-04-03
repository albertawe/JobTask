<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="container offset-md-1"><h2 style="margin-top:10px;">REGISTER</h2></div>

                <div class="card-body">
                    <form method="POST" action="<?php echo e(route('register')); ?>" aria-label="<?php echo e(__('Register')); ?>">
                        <?php echo csrf_field(); ?>

                        <!-- <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Name')); ?></label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>" name="name" value="<?php echo e(old('name')); ?>" required autofocus>

                                <?php if($errors->has('name')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('name')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div> -->

                        <div class="form-group row">
                            <!-- <label for="email" class="col-md-4 col-form-label text-md-right"><?php echo e(__('E-Mail Address')); ?></label> -->

                            <div class="col-md-10 offset-md-1">
                                <input id="email" placeholder="Email" type="email" class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" name="email" value="<?php echo e(old('email')); ?>" required>

                                <?php if($errors->has('email')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                          <div class="form-group row">
                            <!-- <label for="name" class="col-md-4 col-form-label text-md-right"><?php echo e(__('firstName')); ?></label> -->

                            <div class="col-md-10 offset-md-1">
                                <input id="firstname" placeholder="First Name" type="text" class="form-control<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>" name="firstname" value="<?php echo e(old('name')); ?>" required autofocus>

                                <?php if($errors->has('name')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('name')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                          <div class="form-group row">
                            <!-- <label for="name" class="col-md-4 col-form-label text-md-right"><?php echo e(__('lastName')); ?></label> -->

                            <div class="col-md-10 offset-md-1">
                                <input id="lastname" placeholder="Last Name" type="text" class="form-control<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>" name="lastname" value="<?php echo e(old('name')); ?>" required autofocus>

                                <?php if($errors->has('name')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('name')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <!-- <label for="password" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Password')); ?></label> -->

                            <div class="col-md-10 offset-md-1">
                                <input id="password" placeholder="Password" type="password" class="form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" name="password" required>

                                <?php if($errors->has('password')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <!-- <label for="password-confirm" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Confirm Password')); ?></label> -->

                            <div class="col-md-10 offset-md-1">
                                <input id="password-confirm" placeholder="Confirm Password" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-4 offset-md-7">
                                <input type="checkbox" onchange="document.getElementById('regi').disabled = !this.checked;">agreed with our <a style="color:blue" data-toggle="modal" data-target="#myModal">term and condition</a></a>
                                <Br>
                                <button type="submit" class="btn btn-primary" id="regi" disabled>
                                    <?php echo e(__('Register')); ?>

                                </button>
                            </div>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog">
                        
                            <!-- Modal content-->
                            <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Our term and conditions</h4>
                            </div>
                            <div class="modal-body">
                                <p>Some text in the modal.</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                            </div>
                            
                        </div>
                        </div>
                                                <div class="form-group row offset-md-8">
                            <a class="btn btn-link" href="<?php echo e(route('login')); ?>">
                                Already registered?
                            </a>
                            <br>
                            <a class="btn btn-link" href="/">
                                back to home
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>