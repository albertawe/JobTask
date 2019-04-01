@extends('/layouts/template')
@section('content')
		<div class="colorlib-contact">
			<div class="colorlib-narrow-content">
				<div class="row">
						<div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
							<span class="heading-meta">View Tasker Info</span>
							<h2 class="colorlib-heading">All you need to know about this tasker</h2>
						</div>
				</div>
					<div class="col-md-7 col-md-push-1">
						<div class="colorlib-narrow-content">
							<div class="row">
                            		<img src="/images/profile/{{$user->user_profile->image}}" style="width:250px;height:250px;">
                            		<div class="row">
											<div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
											<Br>
												<span class="heading-meta">First Name</span>
												<h2 class="colorlib-heading">{{$user->user_profile->first_name}}</h2>
											</div>
											<div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
											<Br>	<span class="heading-meta">Last Name</span>
												<h2 class="colorlib-heading">{{$user->user_profile->last_name}}</h2>
											</div>
											<div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
												<span class="heading-meta">Phone Number</span>
												<h2 class="colorlib-heading">{{$user->user_profile->phone}}</h2>
											</div>
											<div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
												<span class="heading-meta">Email</span>
												<h2 class="colorlib-heading">{{$user->user_profile->email}}</h2>
											</div>
											<div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
												<span class="heading-meta">Location</span>
												<h2 class="colorlib-heading">{{$user->user_profile->location}}</h2>
											</div>
											<div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
												<span class="heading-meta">Birth Date</span>
												<h2 class="colorlib-heading">{{$user->user_profile->birthdate}}</h2>
											</div>
											<div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
												<span class="heading-meta">Little more about me</span>
												<h2 class="colorlib-heading">{{$user->user_profile->tagline}}</h2>
												<div class="row">
											<div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
												<h2 class="colorlib-heading">Skill</h2>
											</div>
											</div>
											<div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
												<span class="heading-meta">CV</span>
												<img src="/images/cv/{{$user->user_skill->cv}}" style="width:300px;height:600px;">
											</div>
											<br>
											<div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
												<span class="heading-meta">Transportation</span>
												<h2 class="colorlib-heading">{{$user->user_skill->transportation}}</h2>
											</div>
											<div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
												<span class="heading-meta">Language</span>
												<h2 class="colorlib-heading">{{$user->user_skill->language}}</h2>
											</div>
											<div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
												<span class="heading-meta">qualification</span>
												<h2 class="colorlib-heading">{{$user->user_skill->qualification}}</h2>
											</div>
											<div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
												<span class="heading-meta">work experience</span>
												<h2 class="colorlib-heading">{{$user->user_skill->workexperience}}</h2>
											</div>
											<div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
												<span class="heading-meta">tagline</span>
												<h2 class="colorlib-heading">{{$user->user_skill->tagline}}</h2>
											</div>
											@if($user->user_skill->images)
											<div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
												<span class="heading-meta">right click->view image at new tab) for better experience</span>
											</div>
												@foreach(json_decode($user->user_skill->images, true) as $image)
													<div class="itm" style="width: 300px; 
													height: 500px; white-space: nowrap; overflow-x:scroll;  overflow-y:scroll; 
													">
													(
													<img src="{{ URL::to('/images/quali/'.$image)}}" >
													</div>
												@endforeach
											@endif
									</div>
							</div>
					</div>
				</div>
			</div>
			@if($jobs)
					<div class="colorlib-contact">
			            <div class="colorlib-narrow-content">
				            <div class="row">
                                <div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
                                    <h2 class="colorlib-heading">Pekerjaan yang telah diselesaikan worker ini</h2>
                                </div>
				            </div>
							<div class="col-md-7 col-md-push-1">
								<div class="colorlib-narrow-content">
									<div class="row">
						@foreach($jobs as $job)
						<div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
							<h2 class="colorlib-heading">{{$job->title}}</h2>
							<span class="heading-meta">{{$job->job_category}}</span>
						</div>
						@endforeach
                       			 	</div>
                        		</div>
                        	</div>
                    </div>
			@endif

@endsection
@section('javascript')
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
	@endsection