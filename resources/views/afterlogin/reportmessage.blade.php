@extends('layouts/template')
@section('colorlib_helptask')
    colorlib-active
@endsection
@section('content')
    <div class="colorlib-contact">
        <div class="colorlib-narrow-content">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
                    <span class="heading-meta">Your list of report chatroom with admin</span>
                    <h3><a href="/generate" class="col-md-8">
                    generate a chatroom ticket</a></h3>
                </div>
            </div>
            <div class="row">
                @foreach($messages as $mes)
                    <div class="col-md-10 col-sm-6 animate-box" data-animate-effect="fadeInLeft">
                        <div class="blog-entry">
                           <div class="desc">
                                <h3><a href="viewreport/{{$mes->id}}" class="col-md-8">
                                Chatroom ticket number {{$mes->ticket}}</a></h3>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection