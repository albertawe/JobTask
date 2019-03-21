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
                           <div class="desc">
                                <h3><a href="viewcons/{{$mes->message_id}}" class="col-md-8">Pembahasan mengenai {{$mes->jobpost->title}}</a></h3>
                                    <span><small>messages between {{$user1->user_profile->first_name}} {{$user1->user_profile->last_name}}
                                        and {{$user2->user_profile->first_name}} {{$user2->user_profile->last_name}}</small></br>
									</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection