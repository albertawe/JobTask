<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="container offset-md-1"><h2 style="margin-top:10px;">LOGIN</h2></div>

                <div class="card-body">
                    <form method="POST" action="<?php echo e(route('login')); ?>" aria-label="<?php echo e(__('Login')); ?>">
                        <?php echo csrf_field(); ?>

                        <div class="form-group row">
                            <div class="col-md-10 offset-md-1">
                                <input id="email" type="email"class="form-control<?php echo e($errors
                                ->has('email') ? ' is-invalid' : ''); ?>" name="email" 
                                value="<?php echo e(old('email')); ?>"  placeholder="Email" required autofocus>

                                <?php if($errors->has('email')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-10 offset-md-1">
                                <input id="password" type="password" class="form-control<?php echo e($errors->
                                has('password') ? ' is-invalid' : ''); ?>" placeholder="Password" name="password" required>

                                <?php if($errors->has('password')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-1">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>

                                    <label class="form-check-label" for="remember" style="margin-left:20px;margin-top:3px;">
                                        <?php echo e(__('Remember Me')); ?>

                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-4 offset-7">
                                <button type="submit" class="btn btn-primary">
                                    <?php echo e(__('Login')); ?>

                                </button>
                            </div>
                        </div>
                        <div class="form-group row offset-md-9">
                            <a class="btn btn-link" href="<?php echo e(route('register')); ?>">
                                No account?
                            </a>
                            <br>
                            <a class="btn btn-link" href="/">
                                back to home
                            </a>
                        </div>
                        <div class="card-footer">
                                <a class="btn btn-link" href="<?php echo e(route('password.request')); ?>">
                                    <?php echo e(__('Forgot Your Password?')); ?>

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