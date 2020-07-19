@extends('layouts.app')

@section('content')
<div class="register-account ptb-20">
    <div class="container">
        <div class="register-title">
            <h3 class="mb-10">{{ __('Confirm Password') }}</h3>
            <p class="mb-10">{{ __('Please confirm your password before continuing.') }}</p>
        </div>

        <form class="form-horizontal pb-100" method="POST" action="{{ route('password.confirm') }}">
            @csrf
            <fieldset>
                <legend><span class="require">*</span>{{ __('Password') }}</legend>
                <div class="form-group">
                    <div class="col-10">
                        <input id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" name="password"
                            placeholder="Enter your password here..." required autocomplete="current-password">

                        @error('password')
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
                        {{ __('Confirm Password') }}
                    </button>

                    @if (Route::has('password.request'))
                    <p class="lost-password m-0">
                        <a href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    </p>
                    @endif
                </div>
            </div>
        </form>
    </div>
    <!-- Container End -->
</div>
@endsection