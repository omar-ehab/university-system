@extends('layouts.login-app')
@section('title', 'PUA | Login')
@section('content')
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="{{ asset('login-files/images/login.png') }}" alt="IMG">
                </div>

                <form class="login100-form validate-form" method="post" action="{{ route('login') }}">
                    @csrf
                    <span class="login100-form-title">
						PUA System Login
					</span>

                    <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">

                        <input class="input100  @error('email') is-invalid @enderror" type="text" name="email"
                               placeholder="Email" value="{{ old('email') }}">
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


                    <div class="wrap-input100 validate-input" data-validate="Password is required">

                        <input class="input100  @error('password') is-invalid @enderror" type="password" name="password"
                               placeholder="Password">
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
                            Login
                        </button>
                    </div>

                    <div class="text-center p-t-12">
						<span class="txt1">
							Forgot
						</span>
                        <a class="txt2" href="{{ route('password.request') }}">
                            Username / Password?
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
