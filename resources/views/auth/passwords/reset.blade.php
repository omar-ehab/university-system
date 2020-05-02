@extends('layouts.login-app')
@section('title', 'PUA | Reset Password')
@section('content')
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="{{ asset('login-files/images/login.png') }}" alt="IMG">
                </div>

                <form class="login100-form validate-form" method="post" action="{{ route('password.update') }}">
                    @csrf
                    <span class="login100-form-title">
                    Reset Password
                </span>
                    <input type="hidden" name="token" value="{{ $token }}">
                    <div class="wrap-input100 validate-input">

                        <input class="input100  @error('email') is-invalid @enderror" type="text" name="email"
                               placeholder="Email" value="{{ $email ?? old('email') }}" required autocomplete="email">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                    </span>

                    </div>
                    @error('email')
                    <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror


                    <div class="wrap-input100 validate-input">

                        <input class="input100  @error('password') is-invalid @enderror" type="password"
                               name="password_confirmation" placeholder="Confirm Password" required
                               autocomplete="new-password">
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

                    <div class="wrap-input100 validate-input" data-validate="Password is required">

                        <input class="input100  @error('password') is-invalid @enderror" type="password" name="password"
                               placeholder="Password" required autocomplete="new-password">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                    </span>

                    </div>


                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Reset Password
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
