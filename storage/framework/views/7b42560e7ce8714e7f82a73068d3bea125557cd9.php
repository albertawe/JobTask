<?php $__env->startSection('colorlib_home'); ?>
colorlib-active
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
		<div class="colorlib-contact">
			<div class="colorlib-narrow-content">
				<?php if($errors->any()): ?>
				<h4><?php echo e($errors->first()); ?></h4>
				<?php endif; ?>
					<div class="row">
							<div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
								<span class="heading-meta">Dashboard</span>
								<h2 class="colorlib-heading" style="margin-bottom:10px">your wallet credit : Idr.<?php echo e($user->credit->credit); ?> 
								<a href="/topup" target="_blank">(<u>topup</u>)</a>
								<a href="/withdraw" target="_blank">(<u>withdrawal</u>)</a>
								<?php if($user->creditlogs->isNotEmpty()): ?>
								<a href="/log" target="_blank">(<u>detail</u>)</a>
								<?php endif; ?></h2>
								<h2 class="colorlib-heading" style="margin-bottom:10px">Announcement</h2>
								<?php if($blogs->isEmpty()): ?>
								<h5 style="margin-bottom:10px">belum ada pengumuman dari admin</h5>
								<?php endif; ?>
							</div>
					</div>
				<?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<div class="row">
							<div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
								<h5 style="margin-bottom:10px"><?php echo e($blog->berita); ?></h5>
							</div>
					</div>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					<div class="row">
							<div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
								<h2 class="colorlib-heading" style="margin-bottom:10px">Your Profile (user)</h2>
								<h2 class="colorlib-heading" style="margin-bottom:10px"><a href="/skill">Your Skill (worker)</a></h2>
							</div>
					</div>
					<div class="col-md-7 col-md-push-1">
						<!-- <div class="colorlib-narrow-content"> -->
							<div class="row">
								<div class="col-md-10 col-md-offset-1 col-md-pull-1 animate-box" data-animate-effect="fadeInLeft">
								<span class="heading-meta">Your profile picture</span>
									<img src="/images/profile/<?php echo e($user->user_profile->image); ?>" style="width:250px;height:250px;">
									<form method="post" action="<?php echo e(url('dashboard')); ?>" enctype="multipart/form-data">
									<?php echo csrf_field(); ?>
										<div class="form-group">
										<span class="heading-meta">Upload new profile picture of you</span>
											<input type="file" value="" class="form-control" placeholder="UploadImage" name="image">
										</div>
										<div class="form-group">
										<span class="heading-meta" style="color:green">First Name (necessary to post task, post offer and withdraw credit)</span>
											<input type="text" value="<?php echo e($user->user_profile->first_name); ?>" class="form-control" placeholder="FirstName" name="firstname">
										</div>
										<div class="form-group">
										<span class="heading-meta" style="color:green">Last Name (necessary to post task, post offer and withdraw credit)</span>
											<input type="text" value="<?php echo e($user->user_profile->last_name); ?>" class="form-control" placeholder="LastName" name="lastname">
										</div>
										<div class="form-group">
										<span class="heading-meta" style="color:green">Phone Number (necessary to post task, post offer and withdraw credit)</span>
											<input type="text" value="<?php echo e($user->user_profile->phone); ?>" class="form-control" placeholder="phone number" name="phone">
										</div>
										<div class="form-group">
										<span class="heading-meta" style="color:green">Email (necessary to post task, post offer and withdraw credit)</span>
											<input type="text" value="<?php echo e($user->user_profile->email); ?>" class="form-control" placeholder="Email" name="email">
										</div>
										<div class="form-group">
										<span class="heading-meta">Location where you live</span>
											<input type="text" value="<?php echo e($user->user_profile->location); ?>" class="form-control" placeholder="location ex.Medan, Sumatera Utara" name="location">
										</div>
										<div class="form-group">
										<span class="heading-meta">Your Birthdate</span>
											<input type="date" value="<?php echo e($user->user_profile->birthdate); ?>" id="datepicker" class="form-control" placeholder="birthdate" name="date">
										</div>
										<div class="form-group">
										<span class="heading-meta">More About You</span>
											<textarea id="message" cols="30" rows="7" class="form-control" placeholder="tagline" name="tagline"><?php echo e($user->user_profile->tagline); ?></textarea>
										</div>
										<h2 class="colorlib-heading">Payment Method (necessary to post task, post offer and withdraw credit)</h2>
										<div class="form-group">
										<span class="heading-meta" style="color:green">Bank</span>
											<input type="text" value="<?php echo e($user->user_profile->bank); ?>" class="form-control" placeholder="Mandiri,Bca,.." name="bank">
										</div>
										<div class="form-group">
										<span class="heading-meta" style="color:green">No Rekening</span>
											<input type="text" id=#number value="<?php echo e($user->user_profile->no_rek); ?>" class="form-control" placeholder="No rekening anda" name="no_rek">
										</div>
										<span class="heading-meta" style="color:green">Nama yang ditransfer</span>
											<input type="text" value="<?php echo e($user->user_profile->transfer_name); ?>" class="form-control" placeholder="Nama pemilik rekening" name="transfer_name">
											<br>
										</div>
										<br>
										<div class="form-group">
											<input type="submit" class="btn btn-primary btn-send-message" value="Update Profile">
										</div>
									</form>
								</div>
							
							</div>		
							<!-- </div> -->
					<!-- </div> -->
				<div class="row">
						<div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
							<h2 class="colorlib-heading">Change Password</h2>
						</div>
					<div class="col-md-7 col-md-push-1">
						<div class="colorlib-narrow-content">
							<div class="row">
								<div class="col-md-10 col-md-offset-1 col-md-pull-1 animate-box" data-animate-effect="fadeInLeft">
									<form method="post" action="/changepass" enctype="multipart/form-data">
									<?php echo csrf_field(); ?>
										<div class="form-group">
										<span class="heading-meta">previous password</span>
											<input type="password" class="form-control" name="prevpassword">
										</div>
										<div class="form-group">
										<span class="heading-meta">new password</span>
											<input type="password" class="form-control" name="password">
										</div>
										<div class="form-group">
											<input type="submit" class="btn btn-primary btn-send-message" value="change password">
										</div>
									</form>
								</div>
							
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