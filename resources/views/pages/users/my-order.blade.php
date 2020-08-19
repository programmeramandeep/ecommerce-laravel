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
                        <div id="orders">
                            <h3>Order ID: {{ $order->id }}</h3>
                            <div class="card">
                                <div class="card-header">
                                    <div class="order-header">
                                        <div class="order-header-items">
                                            <div>
                                                <div class="uppercase font-bold">Order Placed</div>
                                                <div>{{ date('M d, Y', strtotime($order->created_at)) }}</div>
                                            </div>
                                            <div>
                                                <div class="uppercase font-bold">Order ID</div>
                                                <div>{{ $order->id }}</div>
                                            </div>
                                            <div>
                                                <div class="uppercase font-bold">Total</div>
                                                <div>{{ moneyformat($order->billing_total, 'INR') }}</div>
                                            </div>
                                            <div>
                                                <div class="uppercase font-bold">Status</div>
                                                <div class="text-capitalize">{{ $order->status }}</div>
                                            </div>
                                            <div>
                                                <div><a href="#">Invoice</a></div>
                                            </div>
                                        </div>
                                        <div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="order-products">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td>Name</td>
                                                    <td>{{ $order->user->name }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Address</td>
                                                    <td>{{ $order->billing_address }}</td>
                                                </tr>
                                                <tr>
                                                    <td>City</td>
                                                    <td>{{ $order->billing_city }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Subtotal</td>
                                                    <td>{{ moneyformat($order->billing_subtotal, 'INR') }}</td>
                                                </tr>
                                                @if ($order->billing_discount != 0)
                                                <tr>
                                                    <td>Discount</td>
                                                    <td>{{ moneyformat($order->billing_discount, 'INR') }}</td>
                                                </tr>
                                                @endif
                                                <tr>
                                                    <td>Tax</td>
                                                    <td>{{ moneyformat($order->billing_tax, 'INR') }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Total</td>
                                                    <td>{{ moneyformat($order->billing_total, 'INR') }}</td>
                                                </tr>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>

                            <div class="card mt-3">
                                <div class="card-header">
                                    Order Items
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        @foreach ($products as $product)
                                        <div class="col-lg-4">
                                            <div class="product-container mb-2">
                                                <a href="{{ route('shop.show', $product->slug) }}">
                                                    @if ($product->image == '')
                                                    <img src="{{ asset('storage/'.$product->image) }}" alt="Product Image" class="img-fluid">
                                                    @else
                                                    <img src="https://via.placeholder.com/250" class="img-fluid">
                                                    @endif
                                                </a>
                                            </div>
                                            <div>
                                                <div class="mt-1 mb-2">
                                                    <h5>
                                                        <a href="{{ route('shop.show', $product->slug) }}">{{ $product->name }}</a>
                                                    </h5>
                                                </div>
                                                <div>{{ moneyformat($product->price, 'INR') }}</div>
                                                <div>Quantity: {{ $product->pivot->quantity }}</div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
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