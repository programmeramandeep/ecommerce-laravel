@extends('layouts.app')

@section('content')
<div class="register-account ptb-60">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="register-title">
                    <h3 class="mb-10">{{ __('Verify Your Email Address') }}</h3>

                    @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        {{ __('A fresh verification link has been sent to your email address.') }}
                    </div>
                    @endif
                    <p class="mb-10">If you already have an account with us, please login at the login page.</p>

                    <p class="mb-10">{{ __('Before proceeding, please check your email for a verification link.') }}</p>
                    <p class="mb-10">{{ __('If you did not receive the email') }},</p>

                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit"
                            class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Container End -->
</div>
@endsection