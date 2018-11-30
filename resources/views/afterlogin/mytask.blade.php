@extends('layouts/template')
@section('colorlib_mytask')
colorlib-active
@endsection
@section('content')
		<div class="colorlib-contact">
			<div class="colorlib-narrow-content">
				<div class="row">
						<div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
							<span class="heading-meta">Your Task</span>
							<h2 class="colorlib-heading">Task Related to you</h2>
						</div>
				</div>
				<div class="row">
						<div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
							<span class="heading-meta">Posted Job</span>
							<h2 class="colorlib-heading">Job that you posted</h2>
						</div>
				</div>
				<div class="row">
                @foreach($postedjobs as $job)
						<div class="col-md-4 col-sm-6 animate-box" data-animate-effect="fadeInLeft">
							<div class="blog-entry">
								<div class="desc">
								<h3><a href="viewtask/{{$job->id}}">{{$job->title}}</a></h3>
									<span>Due Date: <small>{{$job->due_date}}</small></br>
									Category: <small>{{$job->job_category}}</small></br>
									Type: <small>{{$job->job_type}}</small></br>
									Description: <small>{{$job->job_description}}</small></span>
								</div>
                        </div>
				</div>
				
				@endforeach   
				</div>
				<div class="row">
						<div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
							<span class="heading-meta">Received Job</span>
							<h2 class="colorlib-heading">Job that you accepted as duty</h2>
						</div>
				</div>
				<div class="row">
                @foreach($acceptjobs as $jobb)
						<div class="col-md-4 col-sm-6 animate-box" data-animate-effect="fadeInLeft">
							<div class="blog-entry">
								<div class="desc">
								<h3><a href="viewtask/{{$jobb->id}}">{{$jobb->title}}</a></h3>
									<span>Due Date: <small>{{$jobb->due_date}}</small></br>
									Category: <small>{{$jobb->job_category}}</small></br>
									Type: <small>{{$jobb->job_type}}</small></br>
									Description: <small>{{$jobb->job_description}}</small></span>
								</div>
                        </div>
				</div>
				@endforeach   
				</div> 
			</div>
		</div>
@endsection