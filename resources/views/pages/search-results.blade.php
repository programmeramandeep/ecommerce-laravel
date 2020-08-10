@extends('layouts.app')

@section('content')
<!-- Breadcrumb Start -->
<div class="breadcrumb-area ptb-60 ptb-sm-30">
    <div class="container">
        <div class="breadcrumb">
            <ul>
                <li><a href="{{ url('/') }}">Home</a></li>
                <li class="active"><a href="javascript:void(0);">Search</a></li>
            </ul>
        </div>
    </div>
    <!-- Container End -->
</div>
<!-- Breadcrumb End -->

<!-- Shop Page Start -->
<div class="main-shop-page pb-60">
    <div class="container">
        <!-- Row End -->
        <div class="row">
            <div class="col-lg-12">
                {{-- Messages --}}
                @include('partials._messages')
            </div>

            <!-- Search results list start -->
            <div class=" col-lg-12 order-lg-2">
                <h3 class="mb-3">{{ $products->total() }} result(s) for <strong>'{{ request()->input('query') }}'</strong></h3>

                <div class="main-categorie">
                    <!-- Grid & List Main Area End -->
                    <div class="tab-content fix">
                        <div id="grid-view" class="tab-pane active">
                            <div class="row">
                                @forelse ($products as $product)
                                <!-- Single Product Start -->
                                <div class="col-lg-4 col-sm-6">
                                    <div class="single-product">
                                        <!-- Product Image Start -->
                                        <div class="pro-img">
                                            <a href="{{ route('shop.show', $product->slug) }}">
                                                @if ($product->image !== '')
                                                <img class="primary-img" src="{{ asset('storage/'.$product->image) }}" alt="single-product">
                                                <img class="secondary-img" src="{{ asset('storage/'.$product->image) }}" alt="single-product">
                                                @else
                                                <img class="primary-img" src="https://via.placeholder.com/150" alt="single-product">
                                                <img class="secondary-img" src="https://via.placeholder.com/150" alt="single-product">
                                                @endif
                                            </a>
                                        </div>
                                        <!-- Product Image End -->
                                        <!-- Product Content Start -->
                                        <div class="pro-content">
                                            <div class="product-rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <h4><a href="{{ route('shop.show', $product->slug) }}">{{ $product->name }}</a>
                                            </h4>
                                            <p><span class="price">{{ $product->presentPrice() }}</span><del class="prev-price">$32.00</del></p>
                                            <div class="pro-actions">
                                                <div class="actions-secondary">
                                                    <a href="" data-toggle="tooltip" title="Add to Wishlist">
                                                        <i class="fa fa-heart"></i>
                                                    </a>
                                                    <a class="" data-toggle="tooltip" title="Add to Cart">
                                                        <i class="fa fa-shopping-cart"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Product Content End -->
                                    </div>
                                </div>
                                <!-- Single Product End -->
                                @empty
                                <div class="ml-3">
                                    <h3>No Products Found</h3>
                                </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                    <!-- Grid & List Main Area End -->
                </div>

                @if ($products->count() >= 12)
                <div class="pagination-box fix">
                    {{-- Pagination --}}
                    {{ $products->appends(request()->input())->links('vendor.pagination.custom') }}
                </div>
                @endif
            </div>
            <!-- Search results list end -->
        </div>
        <!-- Row End -->
    </div>
    <!-- Container End -->
</div>
<!-- Shop Page End -->
@endsection
