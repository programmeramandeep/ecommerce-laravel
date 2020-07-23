@extends('layouts.app')

@section('content')
<!-- Breadcrumb Start -->
<div class="breadcrumb-area ptb-60 ptb-sm-30">
    <div class="container">
        <div class="breadcrumb">
            <ul>
                <li><a href="{{ url('/') }}">Home</a></li>
                <li class="active"><a href="{{ route('wishlist.index') }}">Wishlist</a></li>
            </ul>
        </div>
    </div>
    <!-- Container End -->
</div>
<!-- Breadcrumb End -->

<!-- Wishlist Main Area Start -->
<div class="cart-main-area pb-80 pb-sm-50">
    <div class="container">
        {{-- Messages --}}
        @include('partials._messages')

        @if ($wishListCollection->isEmpty())
        <h2 class="text-capitalize sub-heading">No items in Wishlist!</h2>
        <a href="{{ route('shop.index') }}" class="btn btn-warning">Continue Shopping</a>
        @else
        <h2 class="text-capitalize sub-heading">
            {{ $wishListCollection->count() }} item(s) in Wishlist
        </h2>
        <div class="row">
            <div class="col-md-12">
                <!-- Table Content Start -->
                <div class="table-content table-responsive mb-50">
                    <table>
                        <thead>
                            <tr>
                                <th class="product-remove">Remove</th>
                                <th class="product-thumbnail">Image</th>
                                <th class="product-name">Product</th>
                                <th class="product-price">Unit Price</th>
                                <th class="product-quantity">Stock Status</th>
                                <th class="product-subtotal">add to cart</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($wishListCollection as $item)
                            <tr>
                                <td class="product-remove">
                                    <a href="javascript:void(0);"
                                        onclick="event.preventDefault(); document.getElementById('cart-item-remove-form-{{ $item->id }}').submit();">
                                        <i class="fa fa-times" aria-hidden="true"></i>
                                    </a>

                                    <form id="cart-item-remove-form-{{ $item->id }}"
                                        action="{{ route('wishlist.destroy', $item->id) }}" method="POST"
                                        class="d-none">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                                <td class="product-thumbnail">
                                    <a href="{{ route('shop.show', $item->model->slug) }}">
                                        <img src="{{ asset('img/products/'.$item->model->slug.'.jpg') }}"
                                            alt="cart-image" />
                                    </a>
                                </td>
                                <td class="product-name">
                                    <a href="{{ route('shop.show', $item->model->slug) }}">{{ $item->model->name }}</a>
                                </td>
                                <td class="product-price">
                                    <span class="amount">{{ $item->model->presentPrice() }}</span>
                                </td>
                                <td class="product-stock-status"><span>in stock</span></td>
                                <td class="product-add-to-cart">
                                    <form action="{{ route('wishlist.update', $item->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="add-cart">Move to Cart</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- Table Content Start -->
                <div class="row">
                    <!-- Wishlist Button Start -->
                    <div class="col-lg-8 col-md-7">
                        <div class="buttons-cart">
                            <input type="submit" value="Update Cart" />
                            <a href="{{ route('shop.index') }}">Continue Shopping</a>
                        </div>
                    </div>
                </div>
                <!-- Row End -->
            </div>
        </div>
        @endif
        <!-- Row End -->
    </div>
</div>
<!-- Wishlist Main Area End -->

@endsection