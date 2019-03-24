@extends('layouts/templates')
@section('colorlib_helptask')
    colorlib-active
@endsection
@section('content')
    <div class="colorlib-contact">
        <div class="colorlib-narrow-content">
            <div class="row">
            <div class="col-md-12 col-md-offset-1 col-md-pull-1 animate-box" data-animate-effect="fadeInLeft">
			<span class="heading-meta">
        @foreach($conversations as $conversation)
        @if($conversation->role == 'admin')
            <p> Admin: {{$conversation->content}}</p><br><br>
        @else
            <p> Pelapor: {{$conversation->content}} </p><br><br>
        @endif
        @endforeach
        </span>
        </div>
            </div>
                <div id="form">
                    <form action="/report_message/{{$message->id}}" method="post">
                        <input type="hidden" name="_token" class="btn btn-info" id="csrf-token" value="{{ Session::token() }}" /><br>
                        <textarea id="message" cols="30" rows="7" placeholder="type your message here" name="content"></textarea>
                        <!-- <input type="text" name="content" style="width:400px;height:200px;"><br><br> -->
                        <br><br>
                        <input type="submit" value="Send" class="btn-primary btn">
                        <br><u><a href="/reportmessage">🡐 Back</a></u>
                    </form>
                </div>
        </div>
    </div>
@endsection
<script type="text/javascript">
setTimeout(() => {
    location.reload();
}, 100000);
</script>
</html>