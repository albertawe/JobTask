@extends('/layouts/template')
@section('content')
		<div class="colorlib-contact">
			<div class="colorlib-narrow-content">
				<div class="row">
						<div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
							<span class="heading-meta">View Poster Evidence</span>
						</div>
				</div>
					<div class="col-md-7 col-md-push-1">
						    <div class="colorlib-narrow-content">
							    <div class="row">
                                        <div class="row">
                                                <div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
                                                <Br>
                                                    <span class="heading-meta">Poster Explaination</span>
                                                    <h2 class="colorlib-heading">{{$report->poster_message}}</h2>
                                                </div>
                                                <div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
                                                    <span class="heading-meta">right click->view image at new tab) for better experience</span>
                                                </div>
                                                    @foreach(json_decode($report->poster_image, true) as $image)
                                                        <div class="itm" style="width: 300px; 
                                                            height: 500px; white-space: nowrap; overflow-x:scroll;  overflow-y:scroll; 
                                                            ">
                                                            <img src="{{ URL::to('/images/report/'.$image)}}" >
                                                        </div>
                                                    @endforeach
                                        </div>
							    </div>
					        </div>
				    </div>
                    <div class="row">
						<div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
							<span class="heading-meta">View Worker Evidence</span>
						</div>
				</div>
					<div class="col-md-7 col-md-push-1">
						    <div class="colorlib-narrow-content">
							    <div class="row">
                                        <div class="row">
                                                <div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
                                                <Br>
                                                    <span class="heading-meta">Worker Explaination</span>
                                                    <h2 class="colorlib-heading">{{$report->worker_message}}</h2>
                                                </div>
                                                <div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
                                                    <span class="heading-meta">right click->view image at new tab) for better experience</span>
                                                </div>
                                                    @foreach(json_decode($report->worker_image, true) as $image)
                                                        <div class="itm" style="width: 300px; 
                                                            height: 500px; white-space: nowrap; overflow-x:scroll;  overflow-y:scroll; 
                                                            ">
                                                            
                                                            <img src="{{ URL::to('/images/report/'.$image)}}" >
                                                        </div>
                                                    @endforeach
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