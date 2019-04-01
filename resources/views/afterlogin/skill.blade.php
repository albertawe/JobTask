@extends('layouts/template')
@section('colorlib_home')
colorlib-active
@endsection
@section('content')
		<div class="colorlib-contact">
			<div class="colorlib-narrow-content">
			@if($errors->any())
			<h4>{{$errors->first()}}</h4>
			@endif
            <div class="row">
						<div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
							<span class="heading-meta">Dashboard</span>
							<h2 class="colorlib-heading" style="margin-bottom:10px">your wallet credit : Idr.{{$user->credit->credit}}
							@if($user->creditlogs->isNotEmpty())
							<a href="/log" target="_blank">(<u>detail</u>)</a>
							@endif</h2>
							<h2 class="colorlib-heading" style="margin-bottom:10px">Announcement</h2>
						</div>
			</div>
				@foreach($blogs as $blog)
				<div class="row">
						<div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
							<h5 style="margin-bottom:10px">{{$blog->berita}}</h5>
						</div>
				</div>
				@endforeach
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
									<img src="/images/cv/{{$user->user_skill->cv}}" style="width:300px;height:600px;">
									<form method="post" action="{{url('skill')}}" enctype="multipart/form-data">
									@csrf
										<div class="form-group">
										<span class="heading-meta">Upload new CV</span>
											<input type="file" value="" class="form-control" placeholder="Upload your Cv" name="cv">
										</div>
										<div class="form-group">
										<span class="heading-meta">Your Transportation</span>
											<input type="text" value="{{$user->user_skill->transportation}}" class="form-control" placeholder="how you go around" name="transportation">
										</div>
										<div class="form-group">
										<span class="heading-meta">Language</span>
											<input type="text" value="{{$user->user_skill->language}}" class="form-control" placeholder="list the language you comfortable with" name="language">
										</div>
										<div class="form-group">
										<span class="heading-meta">qualification</span>
											<input type="text" value="{{$user->user_skill->qualification}}" class="form-control" placeholder="any qualification you have (Ex: certification at A, cerfitication at B)" name="qualification">
										</div>
										@if($user->user_skill->images)
										(right click->view image at new tab) for better experience <Br>
								        @foreach(json_decode($user->user_skill->images, true) as $image)
                                        <input type="checkbox" name="image[]" value="{{$image}}" checked>
                                        <div class="itm" style="width: 300px;
                                        height: 500px; white-space: nowrap; overflow-x:scroll;  overflow-y:scroll; 
                                        "><Br>
                                        <img src="{{ URL::to('/images/quali/'.$image)}}" >
										</div><br>
                                        @endforeach
                                        @endif
										<div class="form-group">
										<span class="heading-meta">work experience</span>
											<input type="text" value="{{$user->user_skill->workexperience}}" class="form-control" placeholder="mention your working experience" name="workexperience">
										</div>
										<div class="form-group">
										<span class="heading-meta">more about what you capable of</span>
											<textarea name="tagline" id="message" cols="30" rows="7" class="form-control" placeholder="tell us more">{{$user->user_skill->tagline}}</textarea>
										</div>
										<div class="form-group">
											<input type="submit" class="btn btn-primary btn-send-message" value="Update Your Skill">
										</div>
									</form>
								</div>
							
							</div>		
							</div>
							<form method="post" action="/uploadpicskill/" enctype="multipart/form-data">
							@csrf
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
@endsection