@extends('layouts.login-app')
@section('title', 'PUA | Reset Password')
@section('content')
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="{{ asset('login-files/images/login.png') }}" alt="IMG">
                </div>

                <form class="login100-form validate-form" method="post" action="{{ route('password.email') }}">
                    @csrf
                    <span class="login100-form-title">
                    Reset Password
                </span>

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">

                        <input class="input100  @error('email') is-invalid @enderror" type="text" name="email"
                               placeholder="Email" value="{{ old('email') }}" required autocomplete="email">
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


                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Send Password Reset Link
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
