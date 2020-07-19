@extends('layouts.app')

@section('content')
<!-- Register Account Start -->
<div class="register-account ptb-60">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="register-title">
                    <h3 class="mb-10">REGISTER ACCOUNT</h3>
                    <p class="mb-10">If you already have an account with us, please login at the login page.</p>
                </div>
            </div>
        </div>
        <!-- Row End -->
        <div class="row">
            <div class="col-sm-12">
                <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                    @csrf
                    <fieldset>
                        <legend>Your Personal Details</legend>
                        <div class="form-group">
                            <label class="control-label" for="f-name"><span
                                    class="require">*</span>{{ __('Name') }}</label>
                            <div class="col-sm-10">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" placeholder="Enter your name..." required
                                    autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="email"><span
                                    class="require">*</span>{{ __('E-Mail Address') }}</label>
                            <div class="col-sm-10">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" placeholder="Enter your email address..."
                                    required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="number"><span class="require">*</span>Contact</label>
                            <div class="col-sm-10">
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror"
                                    name="phone" value="{{ old('phone') }}" placeholder="Enter your phone..." required
                                    autocomplete="phone">

                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend>Your Password</legend>
                        <div class="form-group">
                            <label class="control-label" for="pwd"><span
                                    class="require">*</span>{{ __('Password') }}</label>
                            <div class="col-sm-10">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    placeholder="Enter your password..." required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="pwd-confirm"><span
                                    class="require">*</span>{{ __('Confirm Password') }}</label>
                            <div class="col-sm-10">
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" placeholder="Confirm password" required
                                    autocomplete="new-password">
                            </div>
                        </div>
                    </fieldset>
                    {{-- <fieldset class="newsletter-input">
                        <legend>Newsletter</legend>
                        <div class="form-group">
                            <label class="control-label">Subscribe</label>
                            <div class="col-sm-10">
                                <label class="radio-inline">
                                    <input type="radio" name="newsletter" value="1"> Yes</label>
                                <label class="radio-inline">
                                    <input type="radio" name="newsletter" value="0" checked="checked"> No</label>
                            </div>
                        </div>
                    </fieldset> --}}
                    <div class="buttons newsletter-input">
                        <div class="pull-left">
                            <button type="submit" class="newsletter-btn">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- Row End -->
    </div>
    <!-- Container End -->
</div>
<!-- Register Account End -->
@endsection