@extends('layouts.app')

@section('title', $product->name)

@section('content')
<!-- Breadcrumb Start -->
<div class="breadcrumb-area ptb-60 ptb-sm-30">
    <div class="container">
        <div class="breadcrumb">
            <ul>
                <li><a href="{{ url('/') }}">Home</a></li>
                <li class="active"><a href="{{ route('shop.index') }}">Shop</a></li>
                <li class="active"><a href="{{ route('shop.show', $product->slug) }}">{{ $product->name }}</a></li>
            </ul>
        </div>
    </div>
    <!-- Container End -->
</div>
<!-- Breadcrumb End -->

<!-- Product Thumbnail Start -->
<div class="main-product-thumbnail pb-60">
    <div class="container">
        {{-- Messages --}}
        @include('partials._messages')

        <div class="row">
            <!-- Main Thumbnail Image Start -->
            <div class="col-lg-5">
                <!-- Thumbnail Large Image start -->
                <div class="tab-content">
                    <div id="thumb" class="tab-pane active">
                        @if (!$product->image)
                        <a data-fancybox="images" href="{{ secure_asset('storage/' . $product->image) }}">
                            <img src="{{ secure_asset('storage/' . $product->image) }}" alt="product-view">
                        </a>
                        @else
                        <a data-fancybox="images" href="https://via.placeholder.com/400">
                            <img src="https://via.placeholder.com/400" alt="product-view">
                        </a>
                        @endif
                    </div>

                    @if (!$product->images)
                    @foreach (json_decode($product->images, true) as $key => $image)
                    <div id="thumb{{$key}}" class="tab-pane">
                        <a data-fancybox="images" href="{{ secure_asset('storage/' . $image) }}">
                            <img src="{{ secure_asset('storage/' . $image) }}" alt="product-view">
                        </a>
                    </div>
                    @endforeach
                    @else
                    <div id="thumb1" class="tab-pane">
                        <a data-fancybox="images" href="https://via.placeholder.com/400">
                            <img src="https://via.placeholder.com/400" alt="product-view">
                        </a>
                    </div>
                    <div id="thumb2" class="tab-pane">
                        <a data-fancybox="images" href="https://via.placeholder.com/400">
                            <img src="https://via.placeholder.com/400" alt="product-view">
                        </a>
                    </div>
                    <div id="thumb3" class="tab-pane">
                        <a data-fancybox="images" href="https://via.placeholder.com/400">
                            <img src="https://via.placeholder.com/400" alt="product-view">
                        </a>
                    </div>
                    @endif
                </div>
                <!-- Thumbnail Large Image End -->

                <!-- Thumbnail Image End -->
                <div class="product-thumbnail">
                    <div class="thumb-menu nav">
                        <a class="active" data-toggle="tab" href="#thumb">
                            @if (!$product->image)
                            <img src="{{ secure_asset('storage/' . $product->image) }}" alt="product-thumbnail">
                            @else
                            <img src="https://via.placeholder.com/400" alt="product-thumbnail">
                            @endif
                        </a>
                        @if (!$product->images)
                        @foreach (json_decode($product->images, true) as $key => $image)
                        <a data-toggle="tab" href="#thumb{{$key}}">
                            <img src="{{ secure_asset('storage/' . $image) }}" alt="product-thumbnail">
                        </a>
                        @endforeach
                        @else
                        <a data-toggle="tab" href="#thumb1">
                            <img src="https://via.placeholder.com/400" alt="product-thumbnail">
                        </a>
                        <a data-toggle="tab" href="#thumb2">
                            <img src="https://via.placeholder.com/400" alt="product-thumbnail">
                        </a>
                        <a data-toggle="tab" href="#thumb3">
                            <img src="https://via.placeholder.com/400" alt="product-thumbnail">
                        </a>
                        @endif
                    </div>
                </div>
                <!-- Thumbnail image end -->
            </div>
            <!-- Main Thumbnail Image End -->
            <!-- Thumbnail Description Start -->
            <div class="col-lg-7">
                <div class="thubnail-desc fix">
                    <h3 class="product-header">{{ $product->name }}</h3>
                    <p class="mt-2">{{ $product->details }}</p>
                    <div class="rating-summary fix mtb-10">
                        <div class="rating f-left">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                        </div>
                        <div class="rating-feedback f-left">
                            <a href="#">(1 review)</a>
                            <a href="#">add to your review</a>
                        </div>
                    </div>
                    <div class="pro-price mb-10">
                        <p><span class="price">{{ $product->presentPrice() }}</span><del class="prev-price">-32.00</del>
                        </p>
                    </div>
                    <div class="pro-ref mb-15">
                        <p><span class="in-stock">IN STOCK</span><span class="sku">50</span></p>
                    </div>
                    <div class="box-quantity">
                        <form action="{{ route('cart.store', $product) }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $product->id }}" />
                            <input type="hidden" name="name" value="{{ $product->name }}" />
                            <input type="hidden" name="price" value="{{ $product->price }}" />
                            <input class="number" name="quantity" id="quantity" type="number" min="1" value="1" />
                            <button type="submit" class="add-cart">Add to Cart</button>
                        </form>
                    </div>
                    <div class="product-link">
                        <ul class="list-inline">
                            <li><a href="">Add to Wish List</a></li>
                            <li><a href="">Add to compare</a></li>
                            <li><a href="#">Email</a></li>
                        </ul>
                    </div>
                    <p class="ptb-20">{!! $product->description !!}</p>
                </div>
            </div>
            <!-- Thumbnail Description End -->
        </div>
        <!-- Row End -->
    </div>
    <!-- Container End -->
</div>
<!-- Product Thumbnail End -->
<!-- Product Thumbnail Description Start -->
<div class="thumnail-desc pb-60">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <ul class="main-thumb-desc nav">
                    <li><a class="active" data-toggle="tab" href="#dtail">Details</a></li>
                    <li><a data-toggle="tab" href="#review">Reviews 1</a></li>
                </ul>
                <!-- Product Thumbnail Tab Content Start -->
                <div class="tab-content thumb-content border-default">
                    <div id="dtail" class="tab-pane in active">
                        <p>Everything you need for a trip to the gym will fit inside this surprisingly spacious Products
                            Name Here. Stock it with a water bottle, change of clothes, pair of shoes, and even a few
                            beauty products. Fits inside a locker and zips shut for security.</p>
                        <ul class="tab-list-item">
                            <li> Slip pocket on front.</li>
                            <li> Contrast piping.</li>
                            <li> Durable nylon construction.</li>
                        </ul>
                    </div>
                    <div id="review" class="tab-pane">
                        <!-- Reviews Start -->
                        <div class="review">
                            <div class="group-title">
                                <h2>customer review</h2>
                            </div>
                            <h4 class="review-mini-title">Amandeep Singh</h4>
                            <ul class="review-list">
                                <!-- Single Review List Start -->
                                <li>
                                    <span>Quality</span>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <label>Amandeep Singh</label>
                                </li>
                                <!-- Single Review List End -->
                                <!-- Single Review List Start -->
                                <li>
                                    <span>price</span>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <label>Review by <a href="">Amandeep Singh</a></label>
                                </li>
                                <!-- Single Review List End -->
                                <!-- Single Review List Start -->
                                <li>
                                    <span>value</span>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                    <label>Posted on 7/20/18</label>
                                </li>
                                <!-- Single Review List End -->
                            </ul>
                        </div>
                        <!-- Reviews End -->
                        <!-- Reviews Start -->
                        <div class="review border-default universal-padding mt-30">
                            <h2 class="review-title mb-30">You're reviewing: <br><span>Go-Get'r Pushup Grips</span></h2>
                            <p class="review-mini-title">your rating</p>
                            <ul class="review-list">
                                <!-- Single Review List Start -->
                                <li>
                                    <span>Quality</span>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                </li>
                                <!-- Single Review List End -->
                                <!-- Single Review List Start -->
                                <li>
                                    <span>price</span>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                </li>
                                <!-- Single Review List End -->
                                <!-- Single Review List Start -->
                                <li>
                                    <span>value</span>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                </li>
                                <!-- Single Review List End -->
                            </ul>
                            <!-- Reviews Field Start -->
                            <div class="riview-field mt-40">
                                <form autocomplete="off" action="#">
                                    <div class="form-group">
                                        <label class="req" for="sure-name">Nickname</label>
                                        <input type="text" class="form-control" id="sure-name" required="required">
                                    </div>
                                    <div class="form-group">
                                        <label class="req" for="subject">Summary</label>
                                        <input type="text" class="form-control" id="subject" required="required">
                                    </div>
                                    <div class="form-group">
                                        <label class="req" for="comments">Review</label>
                                        <textarea class="form-control" rows="5" id="comments" required="required"></textarea>
                                    </div>
                                    <button type="submit" class="btn-submit">Submit Review</button>
                                </form>
                            </div>
                            <!-- Reviews Field Start -->
                        </div>
                        <!-- Reviews End -->
                    </div>
                </div>
                <!-- Product Thumbnail Tab Content End -->
            </div>
        </div>
        <!-- Row End -->
    </div>
    <!-- Container End -->
</div>
<!-- Product Thumbnail Description End -->

@include('partials._related-products', ['relatedProducts' => $relatedProducts])

@endsection
