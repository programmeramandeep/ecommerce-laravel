@extends('layouts.app')

@section('content')
<!-- Breadcrumb Start -->
<div class="breadcrumb-area ptb-60 ptb-sm-30">
    <div class="container">
        <div class="breadcrumb">
            <ul>
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ route('shop.index') }}">Shop</a></li>
                <li class="active"><a href="javascript:void(0);">{{ $categoryName }}</a></li>
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
            <!-- Sidebar Shopping Option Start -->
            <div class="col-lg-3  order-2">
                <div class="sidebar white-bg">
                    <div class="single-sidebar">
                        <div class="group-title">
                            <h2>categories</h2>
                        </div>
                        <ul>
                            @foreach ($categories as $category)
                            <li>
                                <a href="{{ route('shop.index', ['category' => $category->slug]) }}"
                                    class="{{ $category->setActiveCategory($category->slug) }}">{{ $category->name }}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Sidebar Shopping Option End -->
            <!-- Product Categorie List Start -->
            <div class=" col-lg-9 order-lg-2">
                <!-- Grid & List View Start -->
                <div class="grid-list-top border-default universal-padding fix mb-30">
                    <div class="grid-list-view f-left">
                        <ul class="list-inline nav">
                            <li><a class="active" data-toggle="tab" href="#grid-view"><i class="fa fa-th"></i></a></li>
                            <li><a data-toggle="tab" href="#list-view"><i class="fa fa-list-ul"></i></a>
                            </li>
                            <li><span class="grid-item-list"> Items 1-12 of 13</span></li>
                        </ul>
                    </div>
                    <!-- Toolbar Short Area Start -->
                    <div class="main-toolbar-sorter f-right">
                        <div class="toolbar-sorter">
                            <label>sort by</label>
                            <select class="sorter" id="sorter">
                                <option value="0">Select</option>
                                <option {{ request()->sort == 'low' ? 'selected' : '' }} value="low">Low to High
                                </option>
                                <option {{ request()->sort == 'high' ? 'selected' : '' }} value="high">High to Low
                                </option>
                                <option {{ request()->sort == 'name' ? 'selected' : '' }} value="name">Product Name
                                </option>
                            </select>
                        </div>
                    </div>
                    <!-- Toolbar Short Area End -->
                </div>
                <!-- Grid & List View End -->
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
                                                <img class="primary-img" src="{{ asset('/img/'.$product->image) }}"
                                                    alt="single-product">
                                                <img class="secondary-img" src="{{ asset('/img/'.$product->image) }}"
                                                    alt="single-product">
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
                                            <h4><a
                                                    href="{{ route('shop.show', $product->slug) }}">{{ $product->name }}</a>
                                            </h4>
                                            <p><span class="price">{{ $product->presentPrice() }}</span><del
                                                    class="prev-price">$32.00</del></p>
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
                        <!-- #grid view End -->
                        <div id="list-view" class="tab-pane">
                            @forelse ($products as $product)
                            <!-- Single Product Start -->
                            <div class="single-product">
                                <!-- Product Image Start -->
                                <div class="pro-img">
                                    <a href="{{ route('shop.show', $product->slug) }}">
                                        <img class="primary-img" src="{{ asset('/img/'.$product->image) }}"
                                            alt="single-product">
                                        <img class="secondary-img" src="{{ asset('/img/'.$product->image) }}"
                                            alt="single-product">
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
                                    <p><span class="price">{{ $product->presentPrice() }}</span><del
                                            class="prev-price">$32.00</del></p>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                        Obcaecati velit,
                                        similique voluptas doloribus assumenda quis libero animi
                                        cumque dignissimos
                                        quisquam, quaerat ea laboriosam incidunt ullam.</p>
                                    <div class="pro-actions">
                                        <div class="actions-secondary">
                                            <a href="" data-toggle="tooltip" title="Add to Wishlist"><i
                                                    class="fa fa-heart"></i></a>
                                            <a class="" data-toggle="tooltip" title="Add to Cart">Add To Cart</a>
                                            <a href="" data-toggle="tooltip" title="Add to Compare"><i
                                                    class="fa fa-signal"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Product Content End -->
                            </div>
                            <!-- Single Product End -->
                            @empty
                            <div>
                                <h3>No Products Found</h3>
                            </div>
                            @endforelse
                        </div>
                        <!-- #list view End -->
                    </div>
                    <!-- Grid & List Main Area End -->
                </div>
                <!--Breadcrumb and Page Show Start -->
                <div class="pagination-box fix">
                    {{-- Pagination --}}
                    {{ $products->appends(request()->input())->links('vendor.pagination.custom') }}

                    <div class="toolbar-sorter-footer">
                        <label>show</label>
                        <select class="sorter" id="product-limit">
                            <option value="9" {{ request()->limit == '9' ? 'selected' : '' }}>9
                            </option>
                            <option value="12" {{ request()->limit == '12' ? 'selected' : '' }}>12
                            </option>
                            <option value="15" {{ request()->limit == '15' ? 'selected' : '' }}>15
                            </option>
                            <option value="18" {{ request()->limit == '18' ? 'selected' : '' }}>18
                            </option>
                        </select>
                        <span>per page</span>
                    </div>
                </div>
                <!--Breadcrumb and Page Show End -->
            </div>
            <!-- product Categorie List End -->
        </div>
        <!-- Row End -->
    </div>
    <!-- Container End -->
</div>
<!-- Shop Page End -->
@endsection

@push('extra_js')
<script>
    (function() {
        // Product Sorter
        const sorter = document.getElementById('sorter');
        sorter.addEventListener('change', function() {
            url = '{!! route('shop.index', ['category' => request()->category, 'limit' => request()->limit, 'page' => request()->page]) !!}';
            window.location.replace(url + (url.indexOf("?") > 0 ? '&' : '?') + 'sort=' + this.value);
        });
        
        // Product limiter
        const limiter = document.getElementById('product-limit');
        limiter.addEventListener('change', function() {
            url = '{!! route('shop.index', ['category' => request()->category, 'sort' => request()->sort, 'page' => request()->page]) !!}';
            window.location.replace(url + (url.indexOf("?") > 0 ? '&' : '?') + 'limit=' + this.value);
        });
    })();   
</script>
@endpush