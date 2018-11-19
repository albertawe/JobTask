@extends('layouts/template')
@section('colorlib_posttask')
colorlib-active
@endsection
@section('content')
		<div class="colorlib-contact">
			<div class="colorlib-narrow-content">
				<div class="row">
						<div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
							<span class="heading-meta">Post Your Task</span>
							<h2 class="colorlib-heading">*the more specific your description, the faster you get your tasker</h2>
						</div>
				</div>
					<div class="col-md-7 col-md-push-1">
						<div class="colorlib-narrow-content">
							<div class="row">

								<div class="col-md-10 col-md-offset-1 col-md-pull-1 animate-box" data-animate-effect="fadeInLeft">
									<form method="post" action="{{url('posttask')}}" enctype="multipart/form-data">
									@csrf
										<div class="form-group">
										<span class="heading-meta">what type of tasker do you want?</span>
											<select name="category" >
											@foreach($categories as $category)
											<option value="{{$category->category}}">{{$category->category}}</option>  
											@endforeach
											</select>
										</div>
										<div class="form-group">
										<span class="heading-meta">Can it be done remotely?</span>
										<select name="type">
											<option value="remote">remote</option>
											<option value="directly">directly</option>    
										</select>
										</div>
										<div class="form-group">
										<span class="heading-meta">Title of your task</span>
											<input type="text" value="" class="form-control" placeholder="Bantuin pasang perabut meja IKEA saya" name="title">
										</div>
										<div class="form-group">
										<span class="heading-meta">Input the address your task will be held</span>
											<input type="text" value="" class="form-control" placeholder="task address detail" name="address">
										</div>
										<div class="form-group">
										<span class="heading-meta">Add your price (Idr)<br>(of course the more you add the happier the tasker)</span>
											<input type="number" value="" class="form-control" placeholder="offer your price" name="price">
										</div>
										<div class="form-group">
										<span class="heading-meta">Tell us the duedate of your task</span>
											<input type="date" class="form-control" placeholder="duedate" name="duedate">
										</div>
										<div class="form-group">
										<span class="heading-meta">Describe your task</span>
											<textarea name="jobdescription" value="" id="jobdescription" cols="30" rows="7" class="form-control" placeholder="describe your task specificly" name="jobdescription"></textarea>
										</div>
										<div class="form-group">
											<input type="submit" class="btn btn-primary btn-send-message" value="post your task">
										</div>
									</form>
								</div>
							
							</div>		
							</div>
					</div>
			</div>
		</div>
@endsection