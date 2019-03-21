@extends('layouts/template')
@section('content')
		<div class="colorlib-contact">
			<div class="colorlib-narrow-content">
				<div class="row">
						<div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
							<span class="heading-meta">withdraw your credit</span>
                            @if(\Session::has('alert-failed'))
                                <div class="alert alert-failed">
                                    <div>{{Session::get('alert-failed')}}</div>
                                </div>
                            @endif
                            @if(\Session::has('alert-success'))
                                <div class="alert alert-success">
                                    <div>{{Session::get('alert-success')}}</div>
                                </div>
                            @endif
						</div>
				</div>
					<div class="col-md-7 col-md-push-1">
						<div class="colorlib-narrow-content">
							<div class="row">

								<div class="col-md-10 col-md-offset-1 col-md-pull-1 animate-box" data-animate-effect="fadeInLeft">
									<form method="post" action="{{url('postwithdraw')}}" enctype="multipart/form-data">
									@csrf
										<div class="form-group">
										<span class="heading-meta">Add the nominal of credit you want to withdraw<br></span>
										@if ($errors->has('price'))

											<span class="text-danger">{{ $errors->first('price') }}</span>

										@endif
											<input type="number" value="" id="number" min="0" max="{{$max}}" oninput="validity.valid||(value=value.replace(/\D+/g, ''))" class="form-control" placeholder="offer your price" name="price">
										</div>
										<div class="form-group">
											<input type="submit" class="btn btn-primary btn-send-message" value="withdraw">
										</div>
									</form>
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