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

							<?php if($user->creditlogs->isNotEmpty()): ?>
							<a href="/log" target="_blank">(<u>detail</u>)</a>
							<?php endif; ?></h2>
							<h2 class="colorlib-heading" style="margin-bottom:10px">Announcement</h2>
						</div>
			</div>
				<?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<div class="row">
						<div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
							<h5 style="margin-bottom:10px"><?php echo e($blog->berita); ?></h5>
						</div>
				</div>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				<div class="row" style="margin-bottom:10px">
						<div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
							<h2 class="colorlib-heading" style="margin-bottom:10px"><a href="/dashboard">Your Profile (user)</a></h2>
							<h2 class="colorlib-heading" style="margin-bottom:10px">Your Skill (worker)</a></h2>
						</div>
				</div>
					<div class="row">
					<div class="col-md-7 col-md-push-1">
						<div class="colorlib-narrow-content">
							<div class="row">
								<div class="col-md-10 col-md-offset-1 col-md-pull-1 animate-box" data-animate-effect="fadeInLeft">
								<span class="heading-meta">Your CV</span>
									<img src="/images/cv/<?php echo e($user->user_skill->cv); ?>" style="width:300px;height:600px;">
									<form method="post" action="<?php echo e(url('skill')); ?>" enctype="multipart/form-data">
									<?php echo csrf_field(); ?>
										<div class="form-group">
										<span class="heading-meta">Upload new CV</span>
											<input type="file" value="" class="form-control" placeholder="Upload your Cv" name="cv">
										</div>
										<div class="form-group">
										<span class="heading-meta">Your Transportation</span>
											<input type="text" value="<?php echo e($user->user_skill->transportation); ?>" class="form-control" placeholder="how you go around" name="transportation">
										</div>
										<div class="form-group">
										<span class="heading-meta">Language</span>
											<input type="text" value="<?php echo e($user->user_skill->language); ?>" class="form-control" placeholder="list the language you comfortable with" name="language">
										</div>
										<div class="form-group">
										<span class="heading-meta">qualification</span>
											<input type="text" value="<?php echo e($user->user_skill->qualification); ?>" class="form-control" placeholder="any qualification you have (Ex: certification at A, cerfitication at B)" name="qualification">
										</div>
										<?php if($user->user_skill->images): ?>
										(right click->view image at new tab) for better experience <Br>
								        <?php $__currentLoopData = json_decode($user->user_skill->images, true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <input type="checkbox" name="image[]" value="<?php echo e($image); ?>" checked>
                                        <div class="itm" style="width: 300px;
                                        height: 500px; white-space: nowrap; overflow-x:scroll;  overflow-y:scroll; 
                                        "><Br>
                                        <img src="<?php echo e(URL::to('/images/quali/'.$image)); ?>" >
										</div><br>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
										<div class="form-group">
										<span class="heading-meta">work experience</span>
											<input type="text" value="<?php echo e($user->user_skill->workexperience); ?>" class="form-control" placeholder="mention your working experience" name="workexperience">
										</div>
										<div class="form-group">
										<span class="heading-meta">more about what you capable of</span>
											<textarea name="tagline" id="message" cols="30" rows="7" class="form-control" placeholder="tell us more"><?php echo e($user->user_skill->tagline); ?></textarea>
										</div>
										<div class="form-group">
											<input type="submit" class="btn btn-primary btn-send-message" value="Update Your Skill">
										</div>
									</form>
								</div>
							
							</div>		
							</div>
							<form method="post" action="/uploadpicskill/" enctype="multipart/form-data">
							<?php echo csrf_field(); ?>
							<div class="input-group control-group increment">
							<div class="form-group">
								<span class="heading-meta">upload more picture to convince your potential poster (Ex: picture of your certificate)</span>
								<input type="file" name="pic[]" class="form-control" multiple>
							</div>
							</div>
									<div class="form-group">
											<input type="submit" class="btn btn-primary btn-send-message" value="Upload image">
									</div>
							</form>
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
<?php echo $__env->make('layouts/template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>