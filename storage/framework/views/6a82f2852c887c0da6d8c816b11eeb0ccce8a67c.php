<?php $__env->startSection('content'); ?>
		<div class="colorlib-contact">
			<div class="colorlib-narrow-content">
				<div class="row">
						<div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
							<span class="heading-meta">View Task Info</span>
							<h2 class="colorlib-heading">All you need to know about this task</h2>
							<?php if( $uid == $taskdetails->posted_by_id && $taskdetails->status == 'not assigned'): ?>
							<?php if($taskdetails->due_date < $today): ?>
								<h4 style="margin-bottom:10px;color:red;">you cannot see and choose any offer when the duedate has past, <Br>change it at the edit task button to accept offer</h4>
							<?php endif; ?>
							<h4 style="margin-bottom:0px"><a href="/posttasks/<?php echo e($taskdetails->id); ?>" style="margin-bottom:10px">Edit this task's information </a></h4><Br>
							<?php if($taskdetails->status != 'assigned' && $taskdetails->status != 'finished'): ?>
							<h4 style="color:red"><a style="color:red" href="/canceltasks/<?php echo e($taskdetails->id); ?>">cancel this task</a></h4>
							<?php endif; ?>
							<?php endif; ?>
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
								<div class="col-md-12 col-md-offset-1 col-md-pull-1 animate-box" data-animate-effect="fadeInLeft">
									<span class="heading-meta">
										<h4>Task: <?php echo e($taskdetails->title); ?></h4>
										<p>Budget: IDR <?php echo e($taskdetails->price); ?></p>
										<p>Job Type: <?php echo e($taskdetails->job_type); ?></p>
										<p>Job Category: <?php echo e($taskdetails->job_category); ?></p>
										<p>status: <?php echo e($taskdetails->status); ?></p>
										<p>Due Date: <?php echo e($taskdetails->due_date); ?></p>
										<p>Address: <?php echo e($taskdetails->address); ?></p>
										<p>Job Description: <?php echo e($taskdetails->job_description); ?></p>
								<?php if($taskdetails->images): ?>
								<?php $__currentLoopData = json_decode($taskdetails->images, true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<div class="itm" style="width: 300px; 
									height: 500px; white-space: nowrap; overflow-x:scroll;  overflow-y:scroll; 
									">
									<img src="<?php echo e(URL::to('/images/'.$image)); ?>" >
									</div>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								<?php endif; ?>
								<br>
							<?php if( $uid == $taskdetails->posted_by_id && $taskdetails->status != 'canceled'): ?>
							<h4>Upload new image ?</h4>
							<form method="post" action="/uploadpic/<?php echo e($taskdetails->id); ?>" enctype="multipart/form-data">
									<?php echo csrf_field(); ?>
									<div class="input-group control-group increment">
											<div class="form-group">
												<span class="heading-meta">upload new image</span>
												<input type="file" name="pic[]" class="form-control" multiple>
											</div>
									</div>
									<div class="form-group">
											<input type="submit" class="btn btn-primary btn-send-message" value="Upload image">
									</div>
							</form>
							<?php endif; ?>
								</span>
							<?php if($taskdetails->posted_by_id == $uid && $taskdetails->status == 'not assigned' && $taskdetails->due_date > $today): ?>
								<?php if($offers->isEmpty()): ?>
									<p>Currently no offer</p>
								<?php endif; ?>
								<?php $__currentLoopData = $offers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									</br>
									<span class="heading-meta">
									<p>Nego Description: <?php echo e($offer->description); ?></p>
									<p>Nego Price: <?php echo e($offer->nego); ?></p></br>
									</span>
									<input type="button" onclick="location.href='<?php echo e(URL::route('create-message-job',[$offer->user_offer_id,$taskdetails->id])); ?>'" class="btn btn-info col-md-10" value="send this tasker a message">
									<input type="button" onclick="location.href='viewprofile/<?php echo e($offer->user_offer_id); ?>';" target="_blank" class="btn btn-info col-md-10" value="see this tasker's profile">
									<input type="button" onclick="location.href='accept_offer/<?php echo e($offer->id); ?>';" class="btn btn-info col-md-10" value="choose this offer">
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							<?php elseif($taskdetails->posted_by_id == $uid && $taskdetails->status == 'assigned'): ?>
								<a href="finish_offer/<?php echo e($taskdetails->id); ?>"><p>Click this when the task is finished</p></a>
							<?php elseif($taskdetails->status == 'finished'): ?>
								<p>this task is finished, poster is paid</p>
							<?php elseif($taskdetails->posted_by_id !== $uid): ?>
							<?php if($taskdetails->status == 'not assigned'): ?>
								<div class="row" style=>
								<div class="col-md-10 col-md-offset-1 col-md-pull-1 animate-box" data-animate-effect="fadeInLeft">
										<form method="post" action="<?php echo e(url('postoffer')); ?>" enctype="multipart/form-data">
										<?php echo csrf_field(); ?>
											<span class="heading-meta"><h5>interested? show the poster that you deserve this task</h5></span>
											<input type="button" onclick="location.href='<?php echo e(URL::route('create-message-job',[$taskdetails->posted_by_id,$taskdetails->id])); ?>'" class="btn btn-info col-md-10" value="send this poster a message">
											<div class="form-group">
											<span class="heading-meta">Send few words to describe why you are the perfect person</span>
											<?php if($errors->has('description')): ?>

												<span class="text-danger"><?php echo e($errors->first('description')); ?></span>

											<?php endif; ?>
												<input type="text" value="" class="form-control" placeholder="i am a computer science program student..." name="description">
											</div>
											<div class="form-group">
											<span class="heading-meta">offer new price!! you can let it be if you are satisfied with the price</span>
											<?php if($errors->has('price')): ?>

												<span class="text-danger"><?php echo e($errors->first('price')); ?></span>

											<?php endif; ?>
												<input type="number" oninput="validity.valid||(value=value.replace(/\D+/g, ''))" min="0" id="number" value="<?php echo e($taskdetails->price); ?>" class="form-control" placeholder="offer your price" name="price">
											</div>
											<div class="form-group">
											<input type="hidden" value="<?php echo e($taskdetails->id); ?>" class="form-control" name="job_id">
											<input type="hidden" value="<?php echo e($taskdetails->title); ?>" class="form-control" name="job_title">
											<input type="submit" class="btn btn-primary btn-send-message" value="send your offer">
											</div>
										</form>
									</div>
								</div>
							<?php endif; ?>	
							<?php endif; ?>
							</div>
							</div>		
						</div>
					</div>
			</div>	
		</div>
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
<?php echo $__env->make('/layouts/template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>