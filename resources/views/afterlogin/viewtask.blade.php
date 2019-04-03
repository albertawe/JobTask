@extends('/layouts/template')
@section('content')
	<div class="colorlib-contact">
		<div class="colorlib-narrow-content">
					<div class="row">
							<div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
								<span class="heading-meta">View Task Info</span>
								<h2 class="colorlib-heading">All you need to know about this task</h2>
								@if( $uid == $taskdetails->posted_by_id && $taskdetails->status == 'not assigned')
								@if($taskdetails->due_date < $today)
									<h4 style="margin-bottom:10px;color:red;">you cannot see and choose any offer when the duedate has past, <Br>change it at the edit task button to accept offer</h4>
								@endif
								@endif
								@if($taskdetails->status != 'assigned' && $taskdetails->status != 'finished' && $uid == $taskdetails->posted_by_id)
								<h4 style="margin-bottom:0px"><a href="/posttasks/{{$taskdetails->id}}" style="margin-bottom:10px">Edit this task's information </a></h4><Br>
								@endif
								
								@if($taskdetails->status == 'assigned' && $today <= $deadlinecancel && $uid == $taskdetails->posted_by_id)
								<h4 style="margin-bottom:10px;color:red;">you can only cancel your task 2 days before the due date</h4>
								<h4 style="color:red"><a style="color:red" href="/canceltasks/{{$taskdetails->id}}">cancel this task</a></h4>
								@endif
								
							</div>
					</div>
				@if(\Session::has('alert-failed'))
					<div class="alert alert-failed">
						<div style="color:red">{{Session::get('alert-failed')}}</div>
					</div>
				@endif
				@if(\Session::has('alert-success'))
					<div class="alert alert-success">
						<div>{{Session::get('alert-success')}}</div>
					</div>
				@endif
					<div class="col-md-7 col-md-push-1">
						<div class="colorlib-narrow-content">
							<div class="row">
								<div class="col-md-12 col-md-offset-1 col-md-pull-1 animate-box" data-animate-effect="fadeInLeft">
									<span class="heading-meta">
										<h4>Task: {{$taskdetails->title}}</h4>
										<p>Budget: IDR {{$taskdetails->price}}</p>
										<p>Job Type: {{$taskdetails->job_type}}</p>
										<p>Job Category: {{$taskdetails->job_category}}</p>
										<p>status: {{$taskdetails->status}}</p>
										<p>Due Date: {{$taskdetails->due_date}}</p>
										<p>Address: {{$taskdetails->address}}</p>
										<p>Job Description: {{$taskdetails->job_description}}</p>
										@if($taskdetails->images)
										@foreach(json_decode($taskdetails->images, true) as $image)
											<div class="itm" style="width: 300px; 
											height: 500px; white-space: nowrap; overflow-x:scroll;  overflow-y:scroll; 
											">
											(right click->view image at new tab) for better experience
											<img src="{{ URL::to('/images/'.$image)}}" >
											</div>
										@endforeach
										@endif
										<br>
										@if( $uid == $taskdetails->posted_by_id && $taskdetails->status == 'not assigned')
										<h4>Upload new image ?</h4>
										<form method="post" action="/uploadpic/{{$taskdetails->id}}" enctype="multipart/form-data">
												@csrf
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
										@endif
									</span>
							@if($taskdetails->status == 'not assigned' && $taskdetails->assigned_tasker_id == $uid)
							<input type="button" onclick="location.href='acceptjob/{{$taskdetails->id}}';" target="_blank" class="btn btn-info col-md-10" value="accept the job">
							<input type="button" onclick="location.href='rejectjob/{{$taskdetails->id}}';" target="_blank" class="btn btn-info col-md-10" value="reject the job">	
							@endif
							@if($taskdetails->status == 'assigned' && $taskdetails->assigned_tasker_id == $uid && $today <= $deadlinecancel)
							<input type="button" onclick="location.href='cancelaccept/{{$taskdetails->id}}';" target="_blank" class="btn btn-info col-md-10" value="cancel your participation on this task">
							@endif
							@if($taskdetails->status == 'reported' && $taskdetails->assigned_tasker_id == $uid)
							<input type="button" onclick="location.href='reportjob/{{$taskdetails->id}}';" target="_blank" class="btn btn-info col-md-10" value="report to admin">	
							@endif
							@if($taskdetails->status == 'reported' && $taskdetails->posted_by_id == $uid)
							<input type="button" onclick="location.href='reportjob/{{$taskdetails->id}}';" target="_blank" class="btn btn-info col-md-10" value="report to admin">	
							@endif
							@if($taskdetails->status == 'assigned' && $taskdetails->due_date == $today)
							@if($taskdetails->poster_acc == 'arrived' && $taskdetails->worker_acc == 'arrived')
							@if($taskdetails->posted_by_id == $uid)
							<input type="button" onclick="location.href='poster_com/{{$taskdetails->id}}';" class="btn btn-info col-md-10" value="worker has finished the job">	
							<input type="button" onclick="location.href='poster_fail/{{$taskdetails->id}}';" class="btn btn-info col-md-10" value="worker has failed to finish job">			
							@endif
							@endif
							@if($taskdetails->poster_acc == 'completed')
							@if($taskdetails->assigned_tasker_id == $uid)
							<input type="button" onclick="location.href='worker_com/{{$taskdetails->id}}';" class="btn btn-info col-md-10" value="i has finished the job">
							<input type="button" onclick="location.href='worker_fail/{{$taskdetails->id}}';" class="btn btn-info col-md-10" value="i has failed to finished the job">		
							@endif
							@endif
							@if($taskdetails->poster_acc == 'fail')
							@if($taskdetails->assigned_tasker_id == $uid)
							<input type="button" onclick="location.href='worker_com/{{$taskdetails->id}}';" class="btn btn-info col-md-10" value="i has finished the job">
							<input type="button" onclick="location.href='worker_fail/{{$taskdetails->id}}';" class="btn btn-info col-md-10" value="i has failed to finished the job">		
							@endif
							@endif
							@if($taskdetails->posted_by_id == $uid && $taskdetails->poster_acc == '')
							<input type="button" onclick="location.href='poster_acc/{{$taskdetails->id}}';" class="btn btn-info col-md-10" value="worker has arrived">		
							@elseif($taskdetails->assigned_tasker_id == $uid && $taskdetails->worker_acc == '')
							<input type="button" onclick="location.href='worker_acc/{{$taskdetails->id}}';" class="btn btn-info col-md-10" value="i has arrived">		
							@endif
							@endif
							@if($taskdetails->posted_by_id == $uid && $taskdetails->status == 'not assigned' && $taskdetails->due_date > $today && $taskdetails->assigned_tasker_id == '')
								@if($offers->isEmpty())
									<p>Currently no offer</p>
								@endif
								@foreach($offers as $offer)
									</br>
									<span class="heading-meta">
									<p>Nego Description: {{$offer->description}}</p>
									<p>Nego Price: {{$offer->nego}}</p></br>
									</span>
									<input type="button" onclick="location.href='{{URL::route('create-message-job',[$offer->user_offer_id,$taskdetails->id])}}'" class="btn btn-info col-md-10" value="send this tasker a message">
									<input type="button" onclick="location.href='viewprofile/{{$offer->user_offer_id}}';" target="_blank" class="btn btn-info col-md-10" value="see this tasker's profile">
									<input type="button" onclick="location.href='accept_offer/{{$offer->id}}';" class="btn btn-info col-md-10" value="choose this offer">
								@endforeach
							
							@elseif($taskdetails->status == 'finished')
								<p>this task is finished, poster is paid</p>
							@elseif($taskdetails->posted_by_id !== $uid)
							@if($taskdetails->status == 'not assigned')
								<div class="row">
								<div class="col-md-10 col-md-offset-1 col-md-pull-1 animate-box" data-animate-effect="fadeInLeft">
										<form method="post" action="{{url('postoffer')}}" enctype="multipart/form-data">
										@csrf
											<input type="button" onclick="location.href='viewprofile/{{$taskdetails->posted_by_id}}';" target="_blank" class="btn btn-info col-md-10" value="see poster's profile">
											<input type="button" onclick="location.href='{{URL::route('create-message-job',[$taskdetails->posted_by_id,$taskdetails->id])}}'" class="btn btn-info col-md-10" value="send this poster a message">
											<span class="heading-meta"><h5>interested? show the poster that you deserve this task</h5></span>
											<div class="form-group">
											<span class="heading-meta">Send few words to describe why you are the perfect person</span>
											@if ($errors->has('description'))

												<span class="text-danger">{{ $errors->first('description') }}</span>

											@endif
												<input type="text" value="" class="form-control" placeholder="i am a computer science program student..." name="description">
											</div>
											<div class="form-group">
											<span class="heading-meta">offer new price!! you can let it be if you are satisfied with the price</span>
											@if ($errors->has('price'))

												<span class="text-danger">{{ $errors->first('price') }}</span>

											@endif
												<input type="number" oninput="validity.valid||(value=value.replace(/\D+/g, ''))" min="0" id="number" value="{{$taskdetails->price}}" class="form-control" placeholder="offer your price" name="price">
											</div>
											<div class="form-group">
											<input type="hidden" value="{{$taskdetails->id}}" class="form-control" name="job_id">
											<input type="hidden" value="{{$taskdetails->title}}" class="form-control" name="job_title">
											<input type="submit" class="btn btn-primary btn-send-message" value="send your offer">
											</div>
										</form>
									</div>
								</div>
							@endif	
							@endif
							</div>
							</div>		
						</div>
					</div>
		</div>	
	</div>
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