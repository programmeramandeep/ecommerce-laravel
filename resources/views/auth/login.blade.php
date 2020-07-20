@extends('layouts.app')

@section('content')
<!-- Breadcrumb Start -->
<div class="breadcrumb-area ptb-60 ptb-sm-30">
    <div class="container">
        <div class="breadcrumb">
            <ul>
                <li><a href="{{ url('/') }}">Home</a></li>
                <li class="active"><a href="{{ route('login') }}">Login</a></li>
            </ul>
        </div>
    </div>
    <!-- Container End -->
</div>
<!-- Breadcrumb End -->

<div class="log-in pb-60">
    <div class="container">
        <div class="row">
            <!-- New Customer Start -->
            <div class="col-sm-6">
                <div class="well">
                    <div class="new-customer">
                        <h3>NEW CUSTOMER</h3>
                        <p class="mtb-10"><strong>{{ __('Register') }}</strong></p>
                        <p>By creating an account you will be able to shop faster, be up to date on an order's
                            status, and keep track of the orders you have previously made</p>
                        <a class="customer-btn" href="{{ route('register') }}">continue</a>
                    </div>
                </div>
            </div>
            <!-- New Customer End -->
            <!-- Returning Customer Start -->
            <div class="col-sm-6">
                <div class="well">
                    <div class="return-customer">
                        <h3 class="mb-10">RETURNING CUSTOMER</h3>
                        <p class="mb-10"><strong>I am a returning customer</strong></p>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <label for="email" class="control-label">{{ __('E-Mail Address') }}</label>

                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}"
                                    placeholder="Enter your email address here..." required autocomplete="email"
                                    autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password" class="control-label">{{ __('Password') }}</label>

                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    placeholder="Enter your password here..." required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>

                                        <label class="control-label m-0" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>

                                @if (Route::has('password.request'))
                                <div class="col-md-6 text-right">
                                    <p class="lost-password m-0">
                                        <a href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    </p>
                                </div>
                                @endif
                            </div>

                            <button type="submit" class="return-customer-btn">
                                {{ __('Login') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Returning Customer End -->
        </div>
        <!-- Row End -->
    </div>
    <!-- Container End -->
</div>
@endsection