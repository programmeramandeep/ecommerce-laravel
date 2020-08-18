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
                        <div id="dashboard">
                            <h3>Dashboard </h3>
                            <p>From your account dashboard. you can easily check & view your <a href="{{ route('orders.index') }}">recent orders</a>, manage your <a href="{{ route('users-address.edit') }}">shipping and billing addresses</a> and <a href="{{ route('users-password.edit') }}">edit your password </a> and <a href="{{ route('users.edit') }}">account details.</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- My Account Page End Here -->
@endsection