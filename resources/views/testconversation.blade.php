@extends('layouts/template')
@section('colorlib_message')
    colorlib-active
@endsection
@section('content')
    <div class="colorlib-contact">
        <div class="colorlib-narrow-content">
            <div class="row">
                <div id="chatList" data='{{ $message->id }}' datauser='{{ Auth::user()->id }}'>
                <script src="{{mix('/js/MainMessage.js')}}" ></script>
        <!-- @foreach($conversations as $conversation)
            <p>{{$conversation->user->user_profile->first_name}} {{$conversation->user->user_profile->last_name}} : {{$conversation->content}}</p>
        @endforeach -->
                </div>
                <!-- <div id="form">
                    <form action="send_message/{{$message->id}}" method="post">
                        <input type="hidden" name="_token" class="btn btn-info" id="csrf-token" value="{{ Session::token() }}" /><br>
                        <input type="text" name="content"><br><br>
                        <input type="submit" value="Send" class="btn-primary btn">
                        <br><u><a href="/message">🡐 Back</a></u>
                    </form>
                </div> -->
            </div>
        </div>
    </div>
@endsection
</html>