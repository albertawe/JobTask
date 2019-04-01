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
								<span class="heading-meta">Upload and explain your evidence</span>
							</div>
					</div>
					<div class="col-md-7 col-md-push-1">
							<div class="row">
								<div class="col-md-10 col-md-offset-1 col-md-pull-1 animate-box" data-animate-effect="fadeInLeft">
								<span class="heading-meta">Upload the picture and explain Evidence of your claim </span>
									<form method="post" action="/reporttask/{{$reportid}}" enctype="multipart/form-data">
									@csrf
                                    <div class="form-group">
								        <span class="heading-meta">upload the picture of evidence</span>
								        <input type="file" name="pic[]" class="form-control" multiple>
							        </div>
										<div class="form-group">
										<span class="heading-meta">Explain your evidence</span>
											<textarea id="message" cols="30" rows="7" class="form-control" placeholder="reason" name="tagline"></textarea>
										</div>
										<div class="form-group">
											<input type="submit" class="btn btn-primary btn-send-message" value="submit evidence">
										</div>
									</form>
								</div>
							
							</div>		
							<!-- </div> -->
					<!-- </div> -->
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