@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="container offset-md-1"><h2 style="margin-top:10px;">REGISTER</h2></div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                        @csrf

                        <!-- <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> -->

                        <div class="form-group row">
                            <!-- <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label> -->

                            <div class="col-md-10 offset-md-1">
                                <input id="email" placeholder="Email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                          <div class="form-group row">
                            <!-- <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('firstName') }}</label> -->

                            <div class="col-md-10 offset-md-1">
                                <input id="firstname" placeholder="First Name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="firstname" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                          <div class="form-group row">
                            <!-- <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('lastName') }}</label> -->

                            <div class="col-md-10 offset-md-1">
                                <input id="lastname" placeholder="Last Name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="lastname" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <!-- <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label> -->

                            <div class="col-md-10 offset-md-1">
                                <input id="password" placeholder="Password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <!-- <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label> -->

                            <div class="col-md-10 offset-md-1">
                                <input id="password-confirm" placeholder="Confirm Password" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-4 offset-md-7">
                                <input type="checkbox" onchange="document.getElementById('regi').disabled = !this.checked;">agreed with our <a href="/term" target='_blank'>term and condition</a></a>
                                <Br>
                                <button type="submit" class="btn btn-primary" id="regi" disabled>
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                        <div class="form-group row offset-md-8">
                            <a class="btn btn-link" href="{{ route('login') }}">
                                Already registered?
                            </a>
                            <br>
                            <a class="btn btn-link" href="/">
                                back to home
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
