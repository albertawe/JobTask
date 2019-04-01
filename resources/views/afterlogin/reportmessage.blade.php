@extends('layouts/template')
@section('colorlib_helptask')
    colorlib-active
@endsection
@section('content')
    <div class="colorlib-contact">
        <div class="colorlib-narrow-content">
        <div class="row">
		<div class="col-md-10 col-md-offset-1 col-md-pull-1 animate-box" data-animate-effect="fadeInLeft">
			<form method="post" action="{{ action('root/reportmessagecontroller@generate') }}" enctype="multipart/form-data">
                @csrf
				<span class="heading-meta"><h5>let us know what's your problem and generate your waiting ticket</h5></span>
					<div class="form-group">
						@if ($errors->has('title'))
							<span class="text-danger">{{ $errors->first('title') }}</span>
						@endif
						    <input type="text" value="" class="form-control" placeholder="i have a problem with..." name="title">
					</div>
					<div class="form-group">
						<input type="submit" class="btn btn-primary btn-send-message" value="generate report">
					</div>
				</form>
			</div>
		</div>
            <div class="row">
            <span class="heading-meta"><h5>active report chat room</h5></span>
                @foreach($messages as $mes)
                    <div class="col-md-10 col-sm-6 animate-box" data-animate-effect="fadeInLeft">
                        <div class="blog-entry">
                           <div class="desc">
                                <h3><a href="viewreport/{{$mes->id}}" class="col-md-8">
                                Chatroom ticket number {{$mes->title}}</a></h3>
                                <span>Ticket number: <small>{{$mes->ticket}}</small></span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row">
            <span class="heading-meta"><h5>your completed report chat room</h5></span>
                @foreach($pastmessages as $mes)
                    <div class="col-md-10 col-sm-6 animate-box" data-animate-effect="fadeInLeft">
                        <div class="blog-entry">
                           <div class="desc">
                           <h3 class="col-md-8">
                                Chatroom ticket number {{$mes->title}}</h3>
                                <span>Ticket number: <small>{{$mes->ticket}}</small></span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection