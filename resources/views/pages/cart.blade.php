@extends('layouts.app')

@section('content')
<!-- Breadcrumb Start -->
<div class="breadcrumb-area ptb-60 ptb-sm-30">
    <div class="container">
        <div class="breadcrumb">
            <ul>
                <li><a href="{{ url('/') }}">Home</a></li>
                <li class="active"><a href="{{ route('cart.index') }}">Cart</a></li>
            </ul>
        </div>
    </div>
    <!-- Container End -->
</div>
<!-- Breadcrumb End -->

<!-- Cart Main Area Start -->
<div class="cart-main-area pb-80 pb-sm-50">
    <div class="container">
        {{-- Messages --}}
        @include('partials._messages')

        @if (Cart::isEmpty())
        <h2 class="text-capitalize sub-heading">No items in Cart!</h2>
        <a href="{{ route('shop.index') }}" class="btn btn-warning">Continue Shopping</a>
        @else
        <h2 class="text-capitalize sub-heading">{{ $cartCollection->count() }} item(s) in Shopping Cart</h2>
        <div class="row">
            <div class="col-md-12">
                <!-- Table Content Start -->
                <div class="table-content table-responsive mb-50">
                    <table>
                        <thead>
                            <tr>
                                <th class="product-thumbnail">Image</th>
                                <th class="product-name">Product</th>
                                <th class="product-price">Price</th>
                                <th class="product-quantity">Quantity</th>
                                <th class="product-subtotal">Total</th>
                                <th class="product-wishlist">Add to Wishlist</th>
                                <th class="product-remove">Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cartCollection as $item)
                            <tr>
                                <td class="product-thumbnail">
                                    <a href="{{ route('shop.show', $item->model->slug) }}"><img
                                            src="{{ asset('img/products/'.$item->model->slug.'.jpg') }}"
                                            alt="cart-image" /></a>
                                </td>
                                <td class="product-name"><a
                                        href="{{ route('shop.show', $item->model->slug) }}">{{ $item->model->name }}</a>
                                </td>
                                <td class="product-price"><span class="amount">{{ $item->model->presentPrice() }}</span>
                                </td>
                                <td class="product-quantity"><input type="number" value="{{ $item->quantity }}" /></td>
                                <td class="product-subtotal">
                                    {{ moneyformat(($item->quantity * $item->model->price), 'INR') }}
                                </td>
                                <td class="product-wishlist">
                                    <a href="javascript:void(0);"
                                        onclick="event.preventDefault(); document.getElementById('cart-item-wishlist-form-{{ $item->id }}').submit();">
                                        <i class="fa fa-heart" aria-hidden="true"></i>
                                    </a>

                                    <form id="cart-item-wishlist-form-{{ $item->id }}"
                                        action="{{ route('wishlist.store') }}" method="POST" class="d-none">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$item->id}}" />
                                    </form>
                                </td>

                                <td class="product-remove">
                                    <a href="javascript:void(0);"
                                        onclick="event.preventDefault(); document.getElementById('cart-item-remove-form-{{ $item->id }}').submit();">
                                        <i class="fa fa-times" aria-hidden="true"></i>
                                    </a>

                                    <form id="cart-item-remove-form-{{ $item->id }}"
                                        action="{{ route('cart.destroy', $item->id) }}" method="POST" class="d-none">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- Table Content Start -->
                <div class="row">
                    <!-- Cart Button Start -->
                    <div class="col-lg-8 col-md-7">
                        <div class="buttons-cart">
                            <input type="submit" value="Update Cart" />
                            <a href="{{ route('shop.index') }}">Continue Shopping</a>
                        </div>
                    </div>

                    <!-- Cart Button Start -->
                    <!-- Cart Totals Start -->
                    <div class="col-lg-4 col-md-12">
                        <div class="cart_totals">
                            <h2>Cart Totals</h2>
                            <br />
                            <table>
                                <tbody>
                                    <tr class="cart-subtotal">
                                        <th>Subtotal</th>
                                        <td><span class="amount">{{ moneyformat(Cart::getSubTotal(), 'INR') }}</span>
                                        </td>
                                    </tr>
                                    <tr class="cart-subtotal">
                                        <th>{{ $taxCondition->getName() }}</th>
                                        <td><span class="amount">{{ moneyformat($totalTax, 'INR') }}</span></td>
                                    </tr>
                                    <tr class="order-total">
                                        <th>Total</th>
                                        <td>
                                            <strong>
                                                <span class="amount">
                                                    {{ moneyformat(Cart::getTotal(), 'INR') }}
                                                </span>
                                            </strong>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="wc-proceed-to-checkout">
                                <a href="#">Proceed to Checkout</a>
                            </div>
                        </div>
                    </div>
                    <!-- Cart Totals End -->
                </div>
                <!-- Row End -->
            </div>
        </div>
        @endif
        <!-- Row End -->
    </div>
</div>
<!-- Cart Main Area End -->

@endsection