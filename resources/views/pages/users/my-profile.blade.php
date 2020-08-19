@extends('layouts.app')

@section('content')
<!-- Breadcrumb Start -->
<div class="breadcrumb-area ptb-60 ptb-sm-30">
    <div class="container">
        <div class="breadcrumb">
            <ul>
                <li><a href="{{ url('/') }}">Home</a></li>
                <li class="active"><a href="{{ route('users.dashboard') }}">My Accout</a></li>
            </ul>
        </div>
    </div>
    <!-- Container End -->
</div>
<!-- Breadcrumb End -->

<!-- My Account Page Start Here -->
<div class="my-account white-bg pb-60">
    <div class="container">
        {{-- Messages --}}
        @include('partials._messages')

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
                        <div id="account-details">
                            <h3>Account details </h3>
                            <div class="register-form login-form clearfix">
                                <form action="{{ route('users.update') }}" method="POST">
                                    @csrf
                                    @method('PATCH')

                                    <div class="form-group row">
                                        <label for="name" class="col-lg-3 col-md-4 col-form-label">Name</label>
                                        <div class="col-lg-6 col-md-8">
                                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $user->name) }}" placeholder="Enter your name..." required autocomplete="name" autofocus>

                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="email" class="col-lg-3 col-md-4 col-form-label">Email
                                            address</label>
                                        <div class="col-lg-6 col-md-8">
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $user->email) }}" placeholder="Enter your email address..." required autocomplete="email">

                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="phone" class="col-lg-3 col-md-4 col-form-label">Phone</label>
                                        <div class="col-lg-6 col-md-8">
                                            <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone', $user->phone) }}" placeholder="Enter your phone..." required autocomplete="phone">

                                            @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-check row mt-20">
                                        <div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-4">
                                            <input class="form-check-input" value="#" id="offer" type="checkbox">
                                            <label class="form-check-label" for="offer">Receive offers from our partners</label>
                                        </div>
                                    </div>

                                    <div class="form-check row mt-20">
                                        <div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-4">
                                            <input class="form-check-input" value="#" id="subscribes" type="checkbox">
                                            <label class="form-check-label" for="subscribes">Sign up for our
                                                newsletter<br>Subscribe to our newsletters now and stay up-to-date with
                                                new collections, the latest lookbooks and exclusive offers..</label>
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