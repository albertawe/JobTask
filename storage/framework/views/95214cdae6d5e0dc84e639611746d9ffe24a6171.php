<?php $__env->startSection('colorlib_posttask'); ?>
colorlib-active
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
		<div class="colorlib-contact">
			<div class="colorlib-narrow-content">
				<div class="row">
						<div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
							<span class="heading-meta">Post Your Task</span>
							<h2 class="colorlib-heading">*the more specific your description, the faster you get your tasker</h2>
						</div>
				</div>
				<?php if(\Session::has('alert-failed')): ?>
					<div class="alert alert-failed">
						<div style="color:red"><?php echo e(Session::get('alert-failed')); ?></div>
					</div>
				<?php endif; ?>
				<?php if(\Session::has('alert-success')): ?>
					<div class="alert alert-success">
						<div><?php echo e(Session::get('alert-success')); ?></div>
					</div>
				<?php endif; ?>
					<div class="col-md-7 col-md-push-1">
						<div class="colorlib-narrow-content">
							<div class="row">

								<div class="col-md-10 col-md-offset-1 col-md-pull-1 animate-box" data-animate-effect="fadeInLeft">
									<form method="post" action="<?php echo e(url('posttask')); ?>" enctype="multipart/form-data">
									<?php echo csrf_field(); ?>
										<div class="form-group">
										<span class="heading-meta">what type of tasker do you want?</span>
											<select name="category" >
											<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<option value="<?php echo e($category->category); ?>"><?php echo e($category->category); ?></option>  
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											</select>
											<?php if($errors->has('category')): ?>

												<span class="text-danger"><?php echo e($errors->first('category')); ?></span>

											<?php endif; ?>
										</div>
										<div class="form-group">
										<span class="heading-meta">How do you want it to be done?</span>
										<select name="type">
											<option value="remote">remote</option>
											<option value="directly">directly</option>    
										</select>
										<?php if($errors->has('type')): ?>

											<span class="text-danger"><?php echo e($errors->first('type')); ?></span>

										<?php endif; ?>
										</div>
										<div class="form-group">
										<span class="heading-meta">Title of your task</span>
										<?php if($errors->has('title')): ?>

											<span class="text-danger"><?php echo e($errors->first('title')); ?></span>

										<?php endif; ?>
											<input type="text" value="" class="form-control" placeholder="Bantuin pasang perabut meja IKEA saya" name="title">
										</div>
										<div class="form-group">
										<span class="heading-meta">Input the address your task will be held</span>
											<?php if($errors->has('address')): ?>

											<span class="text-danger"><?php echo e($errors->first('address')); ?></span>

											<?php endif; ?>
											<input type="text" value="" class="form-control" placeholder="task address detail" name="address">
										</div>
										<div class="form-group">
										<span class="heading-meta">Add your price (Idr)<br>(of course the more you add the happier the tasker)</span>
										<?php if($errors->has('price')): ?>

											<span class="text-danger"><?php echo e($errors->first('price')); ?></span>

										<?php endif; ?>
											<input type="number" value="" id="number" min="0" oninput="validity.valid||(value=value.replace(/\D+/g, ''))" class="form-control" placeholder="offer your price" name="price">
										</div>
										<div class="form-group">
										<span class="heading-meta">Tell us the duedate of your task</span>
										<?php if($errors->has('duedate')): ?>

											<span class="text-danger"><?php echo e($errors->first('duedate')); ?></span>

										<?php endif; ?>
											<input type="date" class="form-control" id="datepicker" placeholder="duedate" name="duedate">
										</div>
										<div class="form-group">
										<span class="heading-meta">Describe your task</span>
										<?php if($errors->has('jobdescription')): ?>

											<span class="text-danger"><?php echo e($errors->first('jobdescription')); ?></span>

										<?php endif; ?>
											<textarea name="jobdescription" value="" id="jobdescription" cols="30" rows="7" class="form-control" placeholder="describe your task specificly" name="jobdescription"></textarea>
										</div>
										<div class="input-group control-group increment">
										<div class="form-group">
										<span class="heading-meta">upload image (if necessary)</span>
										<input type="file" name="filename[]" class="form-control" multiple>
										</div>
										</div>
										<div class="form-group">
											<input type="submit" class="btn btn-primary btn-send-message" value="post your task">
										</div>
									</form>
								</div>
								<?php if(count($errors) > 0): ?>
								<div class="alert alert-danger">
									<strong>Whoops!</strong> There were some problems with your input.<br><br>
									<ul>
									<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<li><?php echo e($error); ?></li>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</ul>
								</div>
								<?php endif; ?>
							</div>		
							</div>
					</div>
			</div>
		</div>
		<script type="text/javascript">  
        $('#datepicker').datepicker({ 
            autoclose: true,   
            format: 'yyyy-mm-dd'  
         });  
		 </script>
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
<?php echo $__env->make('layouts/template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>