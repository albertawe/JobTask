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
								<a href="/topup" target="_blank">(<u>topup</u>)</a>
								<a href="/withdraw" target="_blank">(<u>withdrawal</u>)</a>
								@if($user->creditlogs->isNotEmpty())
								<a href="/log" target="_blank">(<u>detail</u>)</a>
								@endif</h2>
								<h2 class="colorlib-heading" style="margin-bottom:10px">Announcement</h2>
								@if($blogs->isEmpty())
								<h5 style="margin-bottom:10px">belum ada pengumuman dari admin</h5>
								@endif
							</div>
					</div>
				@foreach($blogs as $blog)
					<div class="row">
							<div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
								<h5 style="margin-bottom:10px">{{$blog->berita}}</h5>
							</div>
					</div>
				@endforeach
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
									<img src="/images/profile/{{$user->user_profile->image}}" style="width:250px;height:250px;">
									<form method="post" action="{{url('dashboard')}}" enctype="multipart/form-data">
									@csrf
										<div class="form-group">
										<span class="heading-meta">Upload new profile picture of you</span>
											<input type="file" value="" class="form-control" placeholder="UploadImage" name="image">
										</div>
										<div class="form-group">
										<span class="heading-meta">First Name</span>
											<input type="text" value="{{$user->user_profile->first_name}}" class="form-control" placeholder="FirstName" name="firstname">
										</div>
										<div class="form-group">
										<span class="heading-meta">Last Name</span>
											<input type="text" value="{{$user->user_profile->last_name}}" class="form-control" placeholder="LastName" name="lastname">
										</div>
										<div class="form-group">
										<span class="heading-meta">Phone Number</span>
											<input type="text" value="{{$user->user_profile->phone}}" class="form-control" placeholder="phone number" name="phone">
										</div>
										<div class="form-group">
										<span class="heading-meta">Email</span>
											<input type="text" value="{{$user->user_profile->email}}" class="form-control" placeholder="Email" name="email">
										</div>
										<div class="form-group">
										<span class="heading-meta">Location where you live</span>
											<input type="text" value="{{$user->user_profile->location}}" class="form-control" placeholder="location ex.Medan, Sumatera Utara" name="location">
										</div>
										<div class="form-group">
										<span class="heading-meta">Your Birthdate</span>
											<input type="date" value="{{$user->user_profile->birthdate}}" id="datepicker" class="form-control" placeholder="birthdate" name="date">
										</div>
										<div class="form-group">
										<span class="heading-meta">More About You</span>
											<textarea id="message" cols="30" rows="7" class="form-control" placeholder="tagline" name="tagline">{{$user->user_profile->tagline}}</textarea>
										</div>
										<h2 class="colorlib-heading">Payment Method</h2>
										<div class="form-group">
										<span class="heading-meta">Bank</span>
											<input type="text" value="{{$user->user_profile->bank}}" class="form-control" placeholder="Mandiri,Bca,.." name="bank">
										</div>
										<div class="form-group">
										<span class="heading-meta">No Rekening</span>
											<input type="text" value="{{$user->user_profile->no_rek}}" class="form-control" placeholder="No rekening anda" name="no_rek">
										</div>
										<div class="form-group">
											<input type="submit" class="btn btn-primary btn-send-message" value="Update Profile">
										</div>
									</form>
								</div>
							
							</div>		
							<!-- </div> -->
					</div>
				<div class="row">
						<div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
							<h2 class="colorlib-heading">Change Password</h2>
						</div>
					<div class="col-md-7 col-md-push-1">
						<div class="colorlib-narrow-content">
							<div class="row">
								<div class="col-md-10 col-md-offset-1 col-md-pull-1 animate-box" data-animate-effect="fadeInLeft">
									<form method="post" action="/changepass" enctype="multipart/form-data">
									@csrf
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
@endsection