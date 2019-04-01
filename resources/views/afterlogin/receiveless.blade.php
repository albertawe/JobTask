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
								<span class="heading-meta">Receive less page</span>
							</div>
					</div>
					<div class="col-md-7 col-md-push-1">
							<div class="row">
								<div class="col-md-10 col-md-offset-1 col-md-pull-1 animate-box" data-animate-effect="fadeInLeft">
								<span class="heading-meta">put the differ amount and submit </span>
									<form method="post" action="/receiveless/{{$id}}" enctype="multipart/form-data">
									@csrf
                                    <div class="form-group">
										<span class="heading-meta">Differ amount</span>
										@if ($errors->has('price'))

											<span class="text-danger">{{ $errors->first('price') }}</span>

										@endif
											<input type="number" value="" id="number" min="0" oninput="validity.valid||(value=value.replace(/\D+/g, ''))" class="form-control" placeholder="add the differ amount" name="price">
									</div>
										<div class="form-group">
											<input type="submit" class="btn btn-primary btn-send-message" value="submit amount">
										</div>
									</form>
								</div>
							
							</div>		
							<!-- </div> -->
					<!-- </div> -->
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