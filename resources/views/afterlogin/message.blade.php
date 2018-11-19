@extends('layouts/template')
@section('colorlib_message')
    colorlib-active
@endsection
@section('content')
    <div class="colorlib-contact">
        <div class="colorlib-narrow-content">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
                    <span class="heading-meta">Your list of message</span>
                    <h2 class="colorlib-heading">Messages between tasker and worker
                </div>
            </div>
            <div class="row">
                @foreach($messages as $mes)
                    <div class="col-md-10 col-sm-6 animate-box" data-animate-effect="fadeInLeft">
                        <div class="blog-entry">
                            <!-- <a href="blog.html" class="blog-img"><img src="images/blog-1.jpg" class="img-responsive" alt="HTML5 Bootstrap Template by colorlib.com"></a> -->
                            <div class="desc">
                                <h3><a href="viewcons/{{$mes->message_id}}" class="col-md-8">messages between {{$mes->user1_first_name}} {{$mes->user1_last_name}}
                                        and {{$mes->user2_first_name}} {{$mes->user2_last_name}}</a></h3>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection