<?php $__env->startSection('colorlib_posttask'); ?>
colorlib-active
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
		<div class="colorlib-contact">
			<div class="colorlib-narrow-content">
				<div class="row">
						<div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
							<span class="heading-meta">Edit Your Task</span>
							<h2 class="colorlib-heading">*the more specific your description, the faster and better you get your tasker</h2>
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
						</div>
				</div>
					<div class="col-md-7 col-md-push-1">
						<div class="colorlib-narrow-content">
							<div class="row">

								<div class="col-md-10 col-md-offset-1 col-md-pull-1 animate-box" data-animate-effect="fadeInLeft">
									<form method="POST" action="/posttasks/<?php echo e($taskdetails->id); ?>">
									<?php echo csrf_field(); ?>
                                    <?php echo method_field('PATCH'); ?>
										<div class="form-group">
										<span class="heading-meta">type of tasker</span>
										<?php if($errors->has('category')): ?>

												<span class="text-danger"><?php echo e($errors->first('category')); ?></span>

										<?php endif; ?>
											<select name="category" >
											<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<option value="<?php echo e($category->category); ?>"><?php echo e($category->category); ?></option>  
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											</select>
										</div>
										<div class="form-group">
										<span class="heading-meta">remotely?</span>
										<?php if($errors->has('type')): ?>

										<span class="text-danger"><?php echo e($errors->first('type')); ?></span>

										<?php endif; ?>
										<select name="type">
											<option value="remote">remote</option>
											<option value="directly">directly</option>    
										</select>
										</div>
										<div class="form-group">
										<span class="heading-meta">Title</span>
										<?php if($errors->has('title')): ?>

										<span class="text-danger"><?php echo e($errors->first('title')); ?></span>

										<?php endif; ?>
											<input type="text" value="<?php echo e($taskdetails->title); ?>" class="form-control" placeholder="Bantuin pasang perabut meja IKEA saya" name="title">
										</div>
										<div class="form-group">
										<span class="heading-meta">Address</span>
										<?php if($errors->has('address')): ?>

										<span class="text-danger"><?php echo e($errors->first('address')); ?></span>

										<?php endif; ?>
											<input type="text" value="<?php echo e($taskdetails->address); ?>" class="form-control" placeholder="task address detail" name="address">
										</div>
										<div class="form-group">
										<span class="heading-meta">price (Idr)</span>
										<?php if($errors->has('price')): ?>

										<span class="text-danger"><?php echo e($errors->first('price')); ?></span>

										<?php endif; ?>
											<input type="number" oninput="validity.valid||(value=value.replace(/\D+/g, ''))" value="<?php echo e($taskdetails->price); ?>" min="0" id="number" class="form-control" placeholder="offer your price" name="price">
										</div>
										<div class="form-group">
										<span class="heading-meta">duedate</span>
										<?php if($errors->has('duedate')): ?>

										<span class="text-danger"><?php echo e($errors->first('duedate')); ?></span>

										<?php endif; ?>
											<input type="date" value="<?php echo e($date); ?>" id="datepicker" class="form-control" placeholder="duedate" name="duedate">
										</div>
										<div class="form-group">
										<span class="heading-meta">Description of your task</span>
										<?php if($errors->has('jobdescription')): ?>

										<span class="text-danger"><?php echo e($errors->first('jobdescription')); ?></span>

										<?php endif; ?>
											<textarea name="jobdescription" value="<?php echo e($taskdetails->job_description); ?>" id="jobdescription" cols="30" rows="7" class="form-control" placeholder="describe your task specificly" name="jobdescription"><?php echo e($taskdetails->job_description); ?></textarea>
										</div>
                                        <div class="form-group">
                                        <span class="heading-meta">image to keep</span>
                                        <?php if($taskdetails->images): ?>
								        <?php $__currentLoopData = json_decode($taskdetails->images, true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <input type="checkbox" name="image[]" value="<?php echo e($image); ?>" checked>
                                        <div class="itm" style="width: 300px; 
                                        height: 500px; white-space: nowrap; overflow-x:scroll;  overflow-y:scroll; 
                                        "><Br>
                                        <img src="<?php echo e(URL::to('/images/'.$image)); ?>" >
										</div><br>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                        </div>
										<div class="form-group">
											<input type="submit" class="btn btn-primary btn-send-message" value="Edit your task">
										</div>
									</form>
								</div>
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