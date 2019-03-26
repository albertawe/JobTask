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
											@if ($errors->has('category'))

												<span class="text-danger">{{ $errors->first('category') }}</span>

											@endif
										</div>
										<div class="form-group">
										<span class="heading-meta">How do you want it to be done?</span>
										<select name="type">
											<option value="remote">remote</option>
											<option value="directly">directly</option>    
										</select>
										@if ($errors->has('type'))

											<span class="text-danger">{{ $errors->first('type') }}</span>

										@endif
										</div>
										<div class="form-group">
										<span class="heading-meta">Title of your task</span>
										@if ($errors->has('title'))

											<span class="text-danger">{{ $errors->first('title') }}</span>

										@endif
											<input type="text" value="" class="form-control" placeholder="Bantuin pasang perabut meja IKEA saya" name="title">
										</div>
										<div class="form-group">
										<span class="heading-meta">Input the address your task will be held</span>
											@if ($errors->has('address'))

											<span class="text-danger">{{ $errors->first('address') }}</span>

											@endif
											<input type="text" value="" class="form-control" placeholder="task address detail" name="address">
										</div>
										<div class="form-group">
										<span class="heading-meta">Add your price (Idr)<br>(of course the more you add the happier the tasker)</span>
										@if ($errors->has('price'))

											<span class="text-danger">{{ $errors->first('price') }}</span>

										@endif
											<input type="number" value="" id="number" min="0" oninput="validity.valid||(value=value.replace(/\D+/g, ''))" class="form-control" placeholder="offer your price" name="price">
										</div>
										<div class="form-group">
										<span class="heading-meta">Tell us the duedate of your task</span>
										@if ($errors->has('duedate'))

											<span class="text-danger">{{ $errors->first('duedate') }}</span>

										@endif
											<input type="date" class="form-control" id="datepicker" placeholder="duedate" name="duedate">
										</div>
										<div class="form-group">
										<span class="heading-meta">Describe your task</span>
										@if ($errors->has('jobdescription'))

											<span class="text-danger">{{ $errors->first('jobdescription') }}</span>

										@endif
											<textarea name="jobdescription" value="" id="jobdescription" cols="30" rows="7" class="form-control" placeholder="describe your task specificly" name="jobdescription"></textarea>
										</div>
										<div class="input-group control-group increment">
										<div class="form-group">
										<span class="heading-meta">upload image (if necessary)</span>
										<input type="file" name="filename[]" class="form-control" multiple>
										</div>
										</div>
										<div class="form-group">
											<input type="submit" class="btn btn-primary btn-send-message" value="post your task">
										</div>
									</form>
								</div>
								@if (count($errors) > 0)
								<div class="alert alert-danger">
									<strong>Whoops!</strong> There were some problems with your input.<br><br>
									<ul>
									@foreach ($errors->all() as $error)
										<li>{{ $error }}</li>
									@endforeach
									</ul>
								</div>
								@endif
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