@extends('layouts/template')
@section('colorlib_helptask')
colorlib-active
@endsection
@section('content')
    <div class="colorlib-contact">
			<div class="colorlib-narrow-content">
				<div class="row">
            <!-- Remove This Before You Start -->
            <div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
                <h2 class="colorlib-heading">Send us a message if you want to give feedback or report something to us</h2>
            </div>
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

        <div class="col-md-10 col-md-offset-1 col-md-pull-1 animate-box" data-animate-effect="fadeInLeft">
            <form action="{{ url('/sendEmail') }}" method="post" entype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                @if ($errors->has('email'))

				    <span class="text-danger">{{ $errors->first('email') }}</span>

				@endif
                    <span class="heading-meta" for="email">Email:</span>
                    <input type="email" class="form-control" id="email" name="email">
                </div>
                <div class="form-group">
                @if ($errors->has('nama'))

				    <span class="text-danger">{{ $errors->first('nama') }}</span>

				@endif
                    <span class="heading-meta" for="nama">Nama:</span>
                    <input type="text" class="form-control" id="name" name="nama"/>
                </div>
                <div class="form-group">
                @if ($errors->has('judul'))

				    <span class="text-danger">{{ $errors->first('judul') }}</span>

				@endif
                    <span class="heading-meta" for="judul">Judul:</span>
                    <input type="text" class="form-control" id="judul" name="judul"/>
                </div>
                <div class="form-group">
                @if ($errors->has('pesan'))

				    <span class="text-danger">{{ $errors->first('pesan') }}</span>

				@endif
                    <span class="heading-meta" for="pesan">Pesan:</span>
                    <textarea class="form-control" id="pesan" name="pesan"></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-md btn-primary">Send Email</button>
                </div>
            </form>
        </div>
            </div>
        <!-- /.content -->
        </div>
    </div>
    <!-- /.main-section -->
@endsection