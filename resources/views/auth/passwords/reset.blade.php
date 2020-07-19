@extends('layouts.app')

@section('content')
<div class="register-account pb-20">
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

        <form class="form-horizontal pb-100" method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">

            <fieldset>
                <div class="form-group">
                    <label for="email" class="col-md-4 col-form-label"><span
                            class="require">*</span>{{ __('E-Mail Address') }}</label>
                    <div class="col-10">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ $email ?? old('email') }}"
                            placeholder="Enter your email address here..." required autocomplete="email" autofocus>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="email" class="col-md-4 col-form-label"><span
                            class="require">*</span>{{ __('Password') }}</label>
                    <div class="col-10">
                        <input id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" name="password"
                            placeholder="Enter new password..." required autocomplete="new-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="email" class="col-md-4 col-form-label"><span
                            class="require">*</span>{{ __('Confirm Password') }}</label>
                    <div class="col-10">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                            placeholder="Confirm new password..." required autocomplete="new-password">
                    </div>
                </div>
            </fieldset>
            <div class="buttons newsletter-input">
                <div class="pull-left">
                    <button type="submit" class="return-customer-btn mr-20">
                        {{ __('Reset Password') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
    <!-- Container End -->
</div>
@endsection