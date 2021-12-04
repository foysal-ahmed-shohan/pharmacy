@extends('layouts.apps')

@section('content')

            <div class="container-center" >
            <div class="login-area">
                <div class="panel panel-bd panel-custom">
                    <div class="panel-heading">
                        <div class="view-header">
                            <div class="header-icon">
                                <i class="pe-7s-unlock"></i>
                            </div>
                            <div class="header-title">
                                <h3>{{ __('Login') }}</h3>
                                <small><strong>Please enter your credentials to login.</strong></small>
                            </div>
                        </div>
                        <h4>E-mail: <b>foysal@gmail.com</b><h4>
                        <h4>Password: <b>foysal123</b><h4>
                    </div>

                    <div class="panel-body">
                        <form method="POST" action="{{ route('login') }}" id="loginForm">
                        @csrf
                            <div class="form-group">

                                <label class="control-label" for="email">{{ __('E-Mail Address') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="password">{{ __('Password') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-add">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif

                                <a class="btn btn-warning" href="{{ url('/register') }}">Register</a>
                            </div>
                            
                        </form>
                        </div>
                        </div>
                </div>
            </div>


@endsection
