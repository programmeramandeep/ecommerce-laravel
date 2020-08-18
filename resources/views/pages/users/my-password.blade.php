@extends('layouts.app')

@section('content')
<!-- Breadcrumb Start -->
<div class="breadcrumb-area ptb-60 ptb-sm-30">
    <div class="container">
        <div class="breadcrumb">
            <ul>
                <li><a href="{{ url('/') }}">Home</a></li>
                <li class="active"><a href="{{ route('users.edit') }}">My Accout</a></li>
            </ul>
        </div>
    </div>
    <!-- Container End -->
</div>
<!-- Breadcrumb End -->

<!-- My Account Page Start Here -->
<div class="my-account white-bg pb-60">
    <div class="container">
        <div class="account-dashboard">
            @include('partials._dashboard-details', ['user' => $user])

            <div class="row">
                <div class="col-lg-2">
                    <!-- Nav tabs -->
                    @include('partials._users-nav', ['active' => $active])
                </div>
                <div class="col-lg-10">
                    <!-- Tab panes -->
                    <div class="tab-content dashboard-content mt-all-40">
                        <div id="change-password">
                            <h3>Change Password </h3>
                            <div class="register-form login-form clearfix">
                                <form action="{{ route('users-password.update', auth()->user()->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')

                                    <div class="form-group row">
                                        <label for="current-password" class="col-lg-3 col-md-4 col-form-label">{{ __('Current Password') }}</label>
                                        <div class="col-lg-6 col-md-8">
                                            <input type="password" class="form-control @error('current-password') is-invalid @enderror" id="current-password" name="current-password" autocomplete="current-password">
                                            @error('current-password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="newpassword" class="col-lg-3 col-md-4 col-form-label">{{ __('New Password') }}</label>
                                        <div class="col-lg-6 col-md-8">
                                            <input id="newpassword" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Enter your password..." required autocomplete="new-password">
                                            <button class="btn show-btn" type="button">Show</button>

                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="v-password" class="col-lg-3 col-md-4 col-form-label">{{ __('Confirm Password') }}</label>
                                        <div class="col-lg-6 col-md-8">
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm password" required autocomplete="new-password">
                                            <button class="btn show-btn" type="button">Show</button>
                                        </div>
                                    </div>

                                    <div class="register-box mt-40">
                                        <button type="submit" class="return-customer-btn f-right">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- My Account Page End Here -->
@endsection