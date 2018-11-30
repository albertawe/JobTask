@extends('layouts/template')
@section('colorlib_posttask')
colorlib-active
@endsection
@section('content')
		<div class="colorlib-contact">
			<div class="colorlib-narrow-content">
				<div class="row">
						<div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
							<span class="heading-meta">Edit Your Task</span>
							<h2 class="colorlib-heading">*the more specific your description, the faster and better you get your tasker</h2>
						</div>
				</div>
					<div class="col-md-7 col-md-push-1">
						<div class="colorlib-narrow-content">
							<div class="row">

								<div class="col-md-10 col-md-offset-1 col-md-pull-1 animate-box" data-animate-effect="fadeInLeft">
									<form method="POST" action="/posttasks/{{$taskdetails->id}}">
									@csrf
                                    @method('PATCH')
										<div class="form-group">
										<span class="heading-meta">type of tasker</span>
											<select name="category" >
											@foreach($categories as $category)
											<option value="{{$category->category}}">{{$category->category}}</option>  
											@endforeach
											</select>
										</div>
										<div class="form-group">
										<span class="heading-meta">remotely?</span>
										<select name="type">
											<option value="remote">remote</option>
											<option value="directly">directly</option>    
										</select>
										</div>
										<div class="form-group">
										<span class="heading-meta">Title</span>
											<input type="text" value="{{$taskdetails->title}}" class="form-control" placeholder="Bantuin pasang perabut meja IKEA saya" name="title">
										</div>
										<div class="form-group">
										<span class="heading-meta">Address</span>
											<input type="text" value="{{$taskdetails->address}}" class="form-control" placeholder="task address detail" name="address">
										</div>
										<div class="form-group">
										<span class="heading-meta">price (Idr)</span>
											<input type="number" value="{{$taskdetails->price}}" class="form-control" placeholder="offer your price" name="price">
										</div>
										<div class="form-group">
										<span class="heading-meta">duedate</span>
											<input type="date" value="{{$date}}" class="form-control" placeholder="duedate" name="duedate">
										</div>
										<div class="form-group">
										<span class="heading-meta">Description of your task</span>
											<textarea name="jobdescription" value="{{$taskdetails->job_description}}" id="jobdescription" cols="30" rows="7" class="form-control" placeholder="describe your task specificly" name="jobdescription">{{$taskdetails->job_description}}</textarea>
										</div>
                                        <div class="form-group">
                                        <span class="heading-meta">image to keep</span>
                                        @if($taskdetails->images)
								        @foreach(json_decode($taskdetails->images, true) as $image)
                                        <input type="checkbox" name="image[]" value="{{$image}}" checked>{{$image}}
                                        <div class="itm" style="width: 300px; 
                                        height: 500px; white-space: nowrap; overflow-x:scroll;  overflow-y:scroll; 
                                        "><Br>
                                        <img src="{{ URL::to('/images/'.$image)}}" >
								 </div><br>
                                        @endforeach
                                        @endif
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
@endsection