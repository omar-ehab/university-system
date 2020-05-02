@extends('layouts.login-app')
@section('title', 'PUA | Confirm Password')
@section('content')
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="{{ asset('login-files/images/login.png') }}" alt="IMG">
                </div>

                <form class="login100-form validate-form" method="post" action="{{ route('password.confirm') }}">
                    @csrf
                    <span class="login100-form-title">
                    {{ __('Please confirm your password before continuing.') }}
                </span>
                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input class="input100  @error('password') is-invalid @enderror" type="password" name="password"
                               placeholder="Password" required autocomplete="current-password">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                    </span>
                    </div>
                    @error('password')
                    <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Confirm Password
                        </button>
                    </div>
                    @if (Route::has('password.request'))
                        <div class="text-center p-t-12">
						<span class="txt1">
							Forgot
						</span>
                            <a class="txt2" href="{{ route('password.request') }}">
                                Password?
                            </a>
                        </div>
                    @endif
                </form>
            </div>
        </div>
    </div>
@endsection
