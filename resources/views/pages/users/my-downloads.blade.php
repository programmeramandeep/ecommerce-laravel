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
                        <div id="downloads">
                            <h3>Downloads</h3>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Downloads</th>
                                            <th>Expires</th>
                                            <th>Download</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Proecut Name Here</td>
                                            <td>May 10, 2018</td>
                                            <td>never</td>
                                            <td><a class="view" href="#">Click Here To Download Your File</a></td>
                                        </tr>
                                        <tr>
                                            <td>Proecut Name Here</td>
                                            <td>Sep 11, 2018</td>
                                            <td>never</td>
                                            <td><a class="view" href="#">Click Here To Download Your File</a></td>
                                        </tr>
                                    </tbody>
                                </table>
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