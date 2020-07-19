@extends('layouts.app')

@section('content')
<!-- Register Account Start -->
<div class="register-account ptb-20">
    <div class="container">
        <div class="register-title">
            <h3 class="mb-10">{{ __('Reset Password') }}</h3>
            <p class="mb-10">If you already have an account with us, please login at the login page.</p>
        </div>

        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif

        <form class="form-horizontal pb-100" method="POST" action="{{ route('password.email') }}">
            @csrf
            <fieldset>
                <legend><span class="require">*</span>{{ __('E-Mail Address') }}</legend>
                <div class="form-group">
                    <div class="col-10">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" placeholder="Enter your email address here..."
                            required autocomplete="email" autofocus>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </fieldset>
            <div class="buttons newsletter-input">
                <div class="pull-left">
                    <button type="submit" class="return-customer-btn mr-20">
                        {{ __('Send Password Reset Link') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
    <!-- Container End -->
</div>
<!-- Register Account End -->
@endsection