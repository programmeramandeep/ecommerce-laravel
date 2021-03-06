@extends('layouts.app')

@section('content')
<!-- Slider Area Start -->
<div class="slider-area pb-60">
    <div class="slider-wrapper theme-default  nivo2">
        <!-- Slider Background  Image Start-->
        <div id="slider" class="nivoSlider">
            <a href="">
                <img src="https://via.placeholder.com/1920x560" data-thumb="https://via.placeholder.com/1920x560" alt="" title="#slider-1-caption1" />
            </a>
            <a href="">
                <img src="https://via.placeholder.com/1920x560" data-thumb="https://via.placeholder.com/1920x560" alt="" title="#slider-1-caption2" />
            </a>
        </div>
        <!-- Slider Background  Image Start-->
        <div id="slider-1-caption1" class="nivo-html-caption nivo-caption">
            <div class="text-content-wrapper">
                <div class="container">
                    <div class="text-content">
                        <h4 class="title2 wow bounceInLeft mb-16" data-wow-duration="2s" data-wow-delay="0s">Big Sale
                        </h4>
                        <h1 class="title1 wow bounceInRight mb-16" data-wow-duration="2s" data-wow-delay="1s">Lorem Ipsum
                            <br>Dolor met smati</h1>
                        <div class="banner-readmore wow bounceInUp mt-35" data-wow-duration="2s" data-wow-delay="2s">
                            <a class="">Shop Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="slider-1-caption2" class="nivo-html-caption nivo-caption">
            <div class="text-content-wrapper">
                <div class="container">
                    <div class="text-content slide-2">
                        <h4 class="title2 wow bounceInLeft mb-16" data-wow-duration="1s" data-wow-delay="1s">Big Sale
                        </h4>
                        <h1 class="title1 wow bounceInRight mb-16" data-wow-duration="2s" data-wow-delay="1s">Lorem Ipsum
                            <br>Dolor met smati</h1>
                        <div class="banner-readmore wow bounceInUp mt-35" data-wow-duration="2s" data-wow-delay="2s">
                            <a class="">Shop Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Slider Area End -->
<!-- Banner Start -->
<div class="upper-banner banner pb-60">
    <div class="container">
        <div class="row">
            <!-- Single Banner Start -->
            <div class="col-sm-4">
                <div class="single-banner zoom">
                    <a href="#"><img src="https://via.placeholder.com/370x205" alt="slider-banner"></a>
                </div>
            </div>
            <!-- Single Banner End -->
            <!-- Single Banner Start -->
            <div class="col-sm-4">
                <div class="single-banner zoom">
                    <a href="#"><img src="https://via.placeholder.com/370x205" alt="slider-banner"></a>
                </div>
            </div>
            <!-- Single Banner End -->
            <!-- Single Banner Start -->
            <div class="col-sm-4">
                <div class="single-banner zoom">
                    <a href="#"><img src="https://via.placeholder.com/370x205" alt="slider-banner"></a>
                </div>
            </div>
            <!-- Single Banner End -->
        </div>
        <!-- Row End -->
    </div>
    <!-- Container End -->
</div>
<!-- Banner End -->
<!-- Best Products Start -->
<div class="best-seller-product pb-30">
    <div class="container">
        <div class="group-title">
            <h2>Hand Tool</h2>
        </div>
        <!-- Best Product Activation Start -->
        <div class="hand-tool-active owl-carousel">
            @foreach ($products as $product)
            <!-- Single Product Start -->
            <div class="single-product">
                <!-- Product Image Start -->
                <div class="pro-img">
                    <a href="{{ route('shop.show', $product->slug) }}">
                        @if ($product->image == '')
                        <img class="primary-img" src="storage/{{ $product->image }}" alt="single-product">
                        <img class="secondary-img" src="storage/{{ $product->image }}" alt="single-product">
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
                    <h4><a href="">{{ $product->name }}</a></h4>
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
            <!-- Single Product End -->
            @endforeach
        </div>
        <!-- Best Product Activation End -->
    </div>
    <!-- Container End -->
</div>
<!-- Best Product End -->
<!-- Banner Start -->
<div class="upper-banner banner pb-60">
    <div class="container">
        <div class="row">
            <!-- Single Banner Start -->
            <div class="col-sm-6">
                <div class="single-banner zoom">
                    <a href="#"><img src="https://via.placeholder.com/400" alt="slider-banner"></a>
                </div>
            </div>
            <!-- Single Banner End -->
            <!-- Single Banner Start -->
            <div class="col-sm-6">
                <div class="single-banner zoom">
                    <a href="#"><img src="https://via.placeholder.com/400" alt="slider-banner"></a>
                </div>
            </div>
            <!-- Single Banner End -->
        </div>
        <!-- Row End -->
    </div>
    <!-- Container End -->
</div>
<!-- Banner End -->
<!-- New Products Start -->
<div class="new-products pb-60">
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-4 order-2">
                <div class="side-product-list">
                    <div class="group-title">
                        <h2>Top Products</h2>
                    </div>
                    <!-- Deal Pro Activation Start -->
                    <div class="slider-right-content side-product-list-active owl-carousel">
                        <!-- Double Product Start -->
                        <div class="double-pro">
                            <!-- Single Product Start -->
                            <div class="single-product">
                                <div class="pro-img">
                                    <a href=""><img class="img" src="https://via.placeholder.com/150" alt="product-image"></a>
                                </div>
                                <div class="pro-content">
                                    <div class="product-rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <h4><a href="">Products Name Here</a></h4>
                                    <p><span class="price">$30.00</span><del class="prev-price">$32.00</del></p>
                                </div>
                            </div>
                            <!-- Single Product End -->
                            <!-- Single Product Start -->
                            <div class="single-product">
                                <div class="pro-img">
                                    <a href=""><img class="img" src="https://via.placeholder.com/150" alt="product-image"></a>
                                </div>
                                <div class="pro-content">
                                    <div class="product-rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <h4><a href="">Products Name Here</a></h4>
                                    <p><span class="price">$30.00</span><del class="prev-price">$32.00</del></p>
                                </div>
                            </div>
                            <!-- Single Product End -->
                            <!-- Single Product Start -->
                            <div class="single-product">
                                <div class="pro-img">
                                    <a href=""><img class="img" src="https://via.placeholder.com/150" alt="product-image"></a>
                                </div>
                                <div class="pro-content">
                                    <div class="product-rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <h4><a href="">Products Name Here</a></h4>
                                    <p><span class="price">$30.00</span><del class="prev-price">$32.00</del></p>
                                </div>
                            </div>
                            <!-- Single Product End -->
                            <!-- Single Product Start -->
                            <div class="single-product">
                                <div class="pro-img">
                                    <a href=""><img class="img" src="https://via.placeholder.com/150" alt="product-image"></a>
                                </div>
                                <div class="pro-content">
                                    <div class="product-rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <h4><a href="">Products Name Here</a></h4>
                                    <p><span class="price">$30.00</span><del class="prev-price">$32.00</del></p>
                                </div>
                            </div>
                            <!-- Single Product End -->
                            <!-- Single Product Start -->
                            <div class="single-product">
                                <div class="pro-img">
                                    <a href=""><img class="img" src="https://via.placeholder.com/150" alt="product-image"></a>
                                </div>
                                <div class="pro-content">
                                    <div class="product-rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <h4><a href="">Products Name Here</a></h4>
                                    <p><span class="price">$30.00</span><del class="prev-price">$32.00</del></p>
                                </div>
                            </div>
                            <!-- Single Product End -->
                        </div>
                        <!-- Double Product End -->
                        <!-- Double Product Start -->
                        <div class="double-pro">
                            <!-- Single Product Start -->
                            <div class="single-product">
                                <div class="pro-img">
                                    <a href=""><img class="img" src="https://via.placeholder.com/150" alt="product-image"></a>
                                </div>
                                <div class="pro-content">
                                    <div class="product-rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <h4><a href="">Products Name Here</a></h4>
                                    <p><span class="price">$30.00</span><del class="prev-price">$32.00</del></p>
                                </div>
                            </div>
                            <!-- Single Product End -->
                            <!-- Single Product Start -->
                            <div class="single-product">
                                <div class="pro-img">
                                    <a href=""><img class="img" src="https://via.placeholder.com/150" alt="product-image"></a>
                                </div>
                                <div class="pro-content">
                                    <div class="product-rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <h4><a href="">Products Name Here</a></h4>
                                    <p><span class="price">$30.00</span><del class="prev-price">$32.00</del></p>
                                </div>
                            </div>
                            <!-- Single Product End -->
                            <!-- Single Product Start -->
                            <div class="single-product">
                                <div class="pro-img">
                                    <a href=""><img class="img" src="https://via.placeholder.com/150" alt="product-image"></a>
                                </div>
                                <div class="pro-content">
                                    <div class="product-rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <h4><a href="">Products Name Here</a></h4>
                                    <p><span class="price">$30.00</span><del class="prev-price">$32.00</del></p>
                                </div>
                            </div>
                            <!-- Single Product End -->
                            <!-- Single Product Start -->
                            <div class="single-product">
                                <div class="pro-img">
                                    <a href=""><img class="img" src="https://via.placeholder.com/150" alt="product-image"></a>
                                </div>
                                <div class="pro-content">
                                    <div class="product-rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <h4><a href="">Products Name Here</a></h4>
                                    <p><span class="price">$30.00</span><del class="prev-price">$32.00</del></p>
                                </div>
                            </div>
                            <!-- Single Product End -->
                            <!-- Single Product Start -->
                            <div class="single-product">
                                <div class="pro-img">
                                    <a href=""><img class="img" src="https://via.placeholder.com/150" alt="product-image"></a>
                                </div>
                                <div class="pro-content">
                                    <div class="product-rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <h4><a href="">Products Name Here</a></h4>
                                    <p><span class="price">$30.00</span><del class="prev-price">$32.00</del></p>
                                </div>
                            </div>
                            <!-- Single Product End -->
                        </div>
                        <!-- Double Product End -->
                        <!-- Double Product Start -->
                        <div class="double-pro">
                            <!-- Single Product Start -->
                            <div class="single-product">
                                <div class="pro-img">
                                    <a href=""><img class="img" src="https://via.placeholder.com/150" alt="product-image"></a>
                                </div>
                                <div class="pro-content">
                                    <div class="product-rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <h4><a href="">Products Name Here</a></h4>
                                    <p><span class="price">$30.00</span><del class="prev-price">$32.00</del></p>
                                </div>
                            </div>
                            <!-- Single Product End -->
                            <!-- Single Product Start -->
                            <div class="single-product">
                                <div class="pro-img">
                                    <a href=""><img class="img" src="https://via.placeholder.com/150" alt="product-image"></a>
                                </div>
                                <div class="pro-content">
                                    <div class="product-rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <h4><a href="">Products Name Here</a></h4>
                                    <p><span class="price">$30.00</span><del class="prev-price">$32.00</del></p>
                                </div>
                            </div>
                            <!-- Single Product End -->
                            <!-- Single Product Start -->
                            <div class="single-product">
                                <div class="pro-img">
                                    <a href=""><img class="img" src="https://via.placeholder.com/150" alt="product-image"></a>
                                </div>
                                <div class="pro-content">
                                    <div class="product-rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <h4><a href="">Products Name Here</a></h4>
                                    <p><span class="price">$30.00</span><del class="prev-price">$32.00</del></p>
                                </div>
                            </div>
                            <!-- Single Product End -->
                            <!-- Single Product Start -->
                            <div class="single-product">
                                <div class="pro-img">
                                    <a href=""><img class="img" src="https://via.placeholder.com/150" alt="product-image"></a>
                                </div>
                                <div class="pro-content">
                                    <div class="product-rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <h4><a href="">Products Name Here</a></h4>
                                    <p><span class="price">$30.00</span><del class="prev-price">$32.00</del></p>
                                </div>
                            </div>
                            <!-- Single Product End -->
                            <!-- Single Product Start -->
                            <div class="single-product">
                                <div class="pro-img">
                                    <a href=""><img class="img" src="https://via.placeholder.com/150" alt="product-image"></a>
                                </div>
                                <div class="pro-content">
                                    <div class="product-rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <h4><a href="">Products Name Here</a></h4>
                                    <p><span class="price">$30.00</span><del class="prev-price">$32.00</del></p>
                                </div>
                            </div>
                            <!-- Single Product End -->
                        </div>
                        <!-- Double Product End -->
                    </div>
                    <!-- Deal Pro Activation End -->
                </div>
            </div>
            <div class="col-xl-9 col-lg-8  order-lg-2">
                <!-- New Pro Content End -->
                <div class="new-pro-content">
                    <div class="pro-tab-title border-line">
                        <!-- Featured Product List Item Start -->
                        <ul class=" nav  product-list product-tab-list mb-30">
                            <li><a class="active" data-toggle="tab" href="#new-arrival">New Arrivals</a></li>
                            <li><a data-toggle="tab" href="#toprated">Featured</a></li>
                            <li><a data-toggle="tab" href="#new-arrival">Top Rated</a></li>
                        </ul>
                        <!-- Featured Product List Item End -->
                    </div>
                    <div class="tab-content product-tab-content jump">
                        <div id="new-arrival" class="tab-pane active">
                            <!-- New Products Activation Start -->
                            <div class="new-pro-active owl-carousel">
                                <!-- Single Product Start -->
                                <div class="single-product">
                                    <!-- Product Image Start -->
                                    <div class="pro-img">
                                        <a href="">
                                            <img class="primary-img" src="https://via.placeholder.com/150" alt="single-product">
                                            <img class="secondary-img" src="https://via.placeholder.com/150" alt="single-product">
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
                                        <h4><a href="">Products Name Here</a></h4>
                                        <p><span class="price">$30.00</span><del class="prev-price">$32.00</del></p>
                                        <div class="pro-actions">
                                            <div class="actions-secondary">
                                                <a href="" data-toggle="tooltip" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
                                                <a class="" data-toggle="tooltip" title="Add to Cart">Add To Cart</a>
                                                <a href="" data-toggle="tooltip" title="Add to Compare"><i class="fa fa-signal"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Product Content End -->
                                </div>
                                <!-- Single Product End -->
                                <!-- Single Product Start -->
                                <div class="single-product">
                                    <!-- Product Image Start -->
                                    <div class="pro-img">
                                        <a href="">
                                            <img class="primary-img" src="https://via.placeholder.com/150" alt="single-product">
                                            <img class="secondary-img" src="https://via.placeholder.com/150" alt="single-product">
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
                                        <h4><a href="">Products Name Here</a></h4>
                                        <p><span class="price">$30.00</span><del class="prev-price">$32.00</del></p>
                                        <div class="pro-actions">
                                            <div class="actions-secondary">
                                                <a href="" data-toggle="tooltip" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
                                                <a class="" data-toggle="tooltip" title="Add to Cart">Add To Cart</a>
                                                <a href="" data-toggle="tooltip" title="Add to Compare"><i class="fa fa-signal"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Product Content End -->
                                    <span class="sticker-new">-30%</span>
                                </div>
                                <!-- Single Product End -->
                                <!-- Single Product Start -->
                                <div class="single-product">
                                    <!-- Product Image Start -->
                                    <div class="pro-img">
                                        <a href="">
                                            <img class="primary-img" src="https://via.placeholder.com/150" alt="single-product">
                                            <img class="secondary-img" src="https://via.placeholder.com/150" alt="single-product">
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
                                        <h4><a href="">Products Name Here</a></h4>
                                        <p><span class="price">$30.00</span><del class="prev-price">$32.00</del></p>
                                        <div class="pro-actions">
                                            <div class="actions-secondary">
                                                <a href="" data-toggle="tooltip" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
                                                <a class="" data-toggle="tooltip" title="Add to Cart">Add To Cart</a>
                                                <a href="" data-toggle="tooltip" title="Add to Compare"><i class="fa fa-signal"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Product Content End -->
                                </div>
                                <!-- Single Product End -->
                                <!-- Single Product Start -->
                                <div class="single-product">
                                    <!-- Product Image Start -->
                                    <div class="pro-img">
                                        <a href="">
                                            <img class="primary-img" src="https://via.placeholder.com/150" alt="single-product">
                                            <img class="secondary-img" src="https://via.placeholder.com/150" alt="single-product">
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
                                        <h4><a href="">Products Name Here</a></h4>
                                        <p><span class="price">$30.00</span><del class="prev-price">$32.00</del></p>
                                        <div class="pro-actions">
                                            <div class="actions-secondary">
                                                <a href="" data-toggle="tooltip" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
                                                <a class="" data-toggle="tooltip" title="Add to Cart">Add To Cart</a>
                                                <a href="" data-toggle="tooltip" title="Add to Compare"><i class="fa fa-signal"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Product Content End -->
                                    <span class="sticker-new">-30%</span>
                                </div>
                                <!-- Single Product End -->
                                <!-- Single Product Start -->
                                <div class="single-product">
                                    <!-- Product Image Start -->
                                    <div class="pro-img">
                                        <a href="">
                                            <img class="primary-img" src="https://via.placeholder.com/150" alt="single-product">
                                            <img class="secondary-img" src="https://via.placeholder.com/150" alt="single-product">
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
                                        <h4><a href="">Products Name Here</a></h4>
                                        <p><span class="price">$30.00</span><del class="prev-price">$32.00</del></p>
                                        <div class="pro-actions">
                                            <div class="actions-secondary">
                                                <a href="" data-toggle="tooltip" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
                                                <a class="" data-toggle="tooltip" title="Add to Cart">Add To Cart</a>
                                                <a href="" data-toggle="tooltip" title="Add to Compare"><i class="fa fa-signal"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Product Content End -->
                                </div>
                                <!-- Single Product End -->
                                <!-- Single Product Start -->
                                <div class="single-product">
                                    <!-- Product Image Start -->
                                    <div class="pro-img">
                                        <a href="">
                                            <img class="primary-img" src="https://via.placeholder.com/150" alt="single-product">
                                            <img class="secondary-img" src="https://via.placeholder.com/150" alt="single-product">
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
                                        <h4><a href="">Products Name Here</a></h4>
                                        <p><span class="price">$30.00</span><del class="prev-price">$32.00</del></p>
                                        <div class="pro-actions">
                                            <div class="actions-secondary">
                                                <a href="" data-toggle="tooltip" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
                                                <a class="" data-toggle="tooltip" title="Add to Cart">Add To Cart</a>
                                                <a href="" data-toggle="tooltip" title="Add to Compare"><i class="fa fa-signal"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Product Content End -->
                                    <span class="sticker-new">-30%</span>
                                </div>
                                <!-- Single Product End -->
                            </div>
                            <!-- New Products Activation End -->
                        </div>
                        <!-- New Products End -->
                        <div id="toprated" class="tab-pane">
                            <!-- New Products Activation Start -->
                            <div class="new-pro-active owl-carousel">
                                <!-- Single Product Start -->
                                <div class="single-product">
                                    <!-- Product Image Start -->
                                    <div class="pro-img">
                                        <a href="">
                                            <img class="primary-img" src="https://via.placeholder.com/150" alt="single-product">
                                            <img class="secondary-img" src="https://via.placeholder.com/150" alt="single-product">
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
                                        <h4><a href="">Products Name Here</a></h4>
                                        <p><span class="price">$30.00</span><del class="prev-price">$32.00</del></p>
                                        <div class="pro-actions">
                                            <div class="actions-secondary">
                                                <a href="" data-toggle="tooltip" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
                                                <a class="" data-toggle="tooltip" title="Add to Cart">Add To Cart</a>
                                                <a href="" data-toggle="tooltip" title="Add to Compare"><i class="fa fa-signal"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Product Content End -->
                                </div>
                                <!-- Single Product End -->
                                <!-- Single Product Start -->
                                <div class="single-product">
                                    <!-- Product Image Start -->
                                    <div class="pro-img">
                                        <a href="">
                                            <img class="primary-img" src="https://via.placeholder.com/150" alt="single-product">
                                            <img class="secondary-img" src="https://via.placeholder.com/150" alt="single-product">
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
                                        <h4><a href="">Products Name Here</a></h4>
                                        <p><span class="price">$30.00</span><del class="prev-price">$32.00</del></p>
                                        <div class="pro-actions">
                                            <div class="actions-secondary">
                                                <a href="" data-toggle="tooltip" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
                                                <a class="" data-toggle="tooltip" title="Add to Cart">Add To Cart</a>
                                                <a href="" data-toggle="tooltip" title="Add to Compare"><i class="fa fa-signal"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Product Content End -->
                                    <span class="sticker-new">-30%</span>
                                </div>
                                <!-- Single Product End -->
                                <!-- Single Product Start -->
                                <div class="single-product">
                                    <!-- Product Image Start -->
                                    <div class="pro-img">
                                        <a href="">
                                            <img class="primary-img" src="https://via.placeholder.com/150" alt="single-product">
                                            <img class="secondary-img" src="https://via.placeholder.com/150" alt="single-product">
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
                                        <h4><a href="">Products Name Here</a></h4>
                                        <p><span class="price">$30.00</span><del class="prev-price">$32.00</del></p>
                                        <div class="pro-actions">
                                            <div class="actions-secondary">
                                                <a href="" data-toggle="tooltip" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
                                                <a class="" data-toggle="tooltip" title="Add to Cart">Add To Cart</a>
                                                <a href="" data-toggle="tooltip" title="Add to Compare"><i class="fa fa-signal"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Product Content End -->
                                </div>
                                <!-- Single Product End -->
                                <!-- Single Product Start -->
                                <div class="single-product">
                                    <!-- Product Image Start -->
                                    <div class="pro-img">
                                        <a href="">
                                            <img class="primary-img" src="https://via.placeholder.com/150" alt="single-product">
                                            <img class="secondary-img" src="https://via.placeholder.com/150" alt="single-product">
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
                                        <h4><a href="">Products Name Here</a></h4>
                                        <p><span class="price">$30.00</span><del class="prev-price">$32.00</del></p>
                                        <div class="pro-actions">
                                            <div class="actions-secondary">
                                                <a href="" data-toggle="tooltip" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
                                                <a class="" data-toggle="tooltip" title="Add to Cart">Add To Cart</a>
                                                <a href="" data-toggle="tooltip" title="Add to Compare"><i class="fa fa-signal"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Product Content End -->
                                </div>
                                <!-- Single Product End -->
                                <!-- Single Product Start -->
                                <div class="single-product">
                                    <!-- Product Image Start -->
                                    <div class="pro-img">
                                        <a href="">
                                            <img class="primary-img" src="https://via.placeholder.com/150" alt="single-product">
                                            <img class="secondary-img" src="https://via.placeholder.com/150" alt="single-product">
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
                                        <h4><a href="">Products Name Here</a></h4>
                                        <p><span class="price">$30.00</span><del class="prev-price">$32.00</del></p>
                                        <div class="pro-actions">
                                            <div class="actions-secondary">
                                                <a href="" data-toggle="tooltip" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
                                                <a class="" data-toggle="tooltip" title="Add to Cart">Add To Cart</a>
                                                <a href="" data-toggle="tooltip" title="Add to Compare"><i class="fa fa-signal"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Product Content End -->
                                </div>
                                <!-- Single Product End -->
                                <!-- Single Product Start -->
                                <div class="single-product">
                                    <!-- Product Image Start -->
                                    <div class="pro-img">
                                        <a href="">
                                            <img class="primary-img" src="https://via.placeholder.com/150" alt="single-product">
                                            <img class="secondary-img" src="https://via.placeholder.com/150" alt="single-product">
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
                                        <h4><a href="">Products Name Here</a></h4>
                                        <p><span class="price">$30.00</span><del class="prev-price">$32.00</del></p>
                                        <div class="pro-actions">
                                            <div class="actions-secondary">
                                                <a href="" data-toggle="tooltip" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
                                                <a class="" data-toggle="tooltip" title="Add to Cart">Add To Cart</a>
                                                <a href="" data-toggle="tooltip" title="Add to Compare"><i class="fa fa-signal"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Product Content End -->
                                </div>
                                <!-- Single Product End -->
                            </div>
                            <!-- New Products Activation End -->
                        </div>
                    </div>
                    <!-- Tab-Content End -->
                    <div class="single-banner zoom mt-30 ">
                        <a href="#"><img src="https://via.placeholder.com/870x240" alt="slider-banner"></a>
                    </div>
                </div>
                <!-- New Pro Content End -->
            </div>
        </div>

    </div>
    <!-- Container End -->
</div>
<!-- New Products End -->
<!-- Company Policy Start -->
<div class="company-policy pb-60 pb-sm-25">
    <div class="container">
        <div class="row">
            <!-- Single Policy Start -->
            <div class="col-lg-3 col-sm-6">
                <div class="single-policy">
                    <div class="icone-img">
                        <img src="https://via.placeholder.com/150" alt="">
                    </div>
                    <div class="policy-desc">
                        <h3>Free Delivery</h3>
                        <p>Free shipping on all order</p>
                    </div>
                </div>
            </div>
            <!-- Single Policy End -->
            <!-- Single Policy Start -->
            <div class="col-lg-3 col-sm-6">
                <div class="single-policy">
                    <div class="icone-img">
                        <img src="https://via.placeholder.com/150" alt="">
                    </div>
                    <div class="policy-desc">
                        <h3>Online Support 24/7</h3>
                        <p>Support online 24 hours</p>
                    </div>
                </div>
            </div>
            <!-- Single Policy End -->
            <!-- Single Policy Start -->
            <div class="col-lg-3 col-sm-6">
                <div class="single-policy">
                    <div class="icone-img">
                        <img src="https://via.placeholder.com/150" alt="">
                    </div>
                    <div class="policy-desc">
                        <h3>Money Return</h3>
                        <p>Back guarantee under 7 days</p>
                    </div>
                </div>
            </div>
            <!-- Single Policy End -->
            <!-- Single Policy Start -->
            <div class="col-lg-3 col-sm-6">
                <div class="single-policy">
                    <div class="icone-img">
                        <img src="https://via.placeholder.com/150" alt="">
                    </div>
                    <div class="policy-desc">
                        <h3>Member Discount</h3>
                        <p>Onevery order over $30.00</p>
                    </div>
                </div>
            </div>
            <!-- Single Policy End -->
        </div>
    </div>
</div>
<!-- Company Policy End -->
<!-- Best Products Start -->
<div class="best-seller-product pb-50 pb-sm-40">
    <div class="container">
        <div class="group-title">
            <h2>Best Seller Products</h2>
        </div>
        <!-- Best Product Activation Start -->
        <div class="best-seller-pro-active  owl-carousel slider-right-content">
            <!-- Double Product Start -->
            <div class="double-pro">
                <!-- Single Product Start -->
                <div class="single-product">
                    <div class="pro-img">
                        <a href=""><img class="img" src="https://via.placeholder.com/150" alt="product-image"></a>
                    </div>
                    <div class="pro-content">
                        <div class="product-rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <h4><a href="">Products Name Here</a></h4>
                        <p><span class="price">$30.00</span><del class="prev-price">$32.00</del></p>
                    </div>
                </div>
                <!-- Single Product End -->
                <!-- Single Product Start -->
                <div class="single-product">
                    <div class="pro-img">
                        <a href=""><img class="img" src="https://via.placeholder.com/150" alt="product-image"></a>
                    </div>
                    <div class="pro-content">
                        <div class="product-rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <h4><a href="">Products Name Here</a></h4>
                        <p><span class="price">$150.00</span><del class="prev-price">$200.00</del></p>
                    </div>
                </div>
                <!-- Single Product End -->
            </div>
            <!-- Double Product End -->
            <!-- Double Product Start -->
            <div class="double-pro">
                <!-- Single Product Start -->
                <div class="single-product">
                    <div class="pro-img">
                        <a href=""><img class="img" src="https://via.placeholder.com/150" alt="product-image"></a>
                    </div>
                    <div class="pro-content">
                        <div class="product-rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <h4><a href="">Products Name Here</a></h4>
                        <p><span class="price">$30.00</span><del class="prev-price">$32.00</del></p>
                    </div>
                </div>
                <!-- Single Product End -->
                <!-- Single Product Start -->
                <div class="single-product">
                    <div class="pro-img">
                        <a href=""><img class="img" src="https://via.placeholder.com/150" alt="product-image"></a>
                    </div>
                    <div class="pro-content">
                        <div class="product-rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <h4><a href="">Products Name Here</a></h4>
                        <p><span class="price">$150.00</span><del class="prev-price">$200.00</del></p>
                    </div>
                </div>
                <!-- Single Product End -->
            </div>
            <!-- Double Product End -->
            <!-- Double Product Start -->
            <div class="double-pro">
                <!-- Single Product Start -->
                <div class="single-product">
                    <div class="pro-img">
                        <a href=""><img class="img" src="https://via.placeholder.com/150" alt="product-image"></a>
                    </div>
                    <div class="pro-content">
                        <div class="product-rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <h4><a href="">Products Name Here</a></h4>
                        <p><span class="price">$30.00</span><del class="prev-price">$32.00</del></p>
                    </div>
                </div>
                <!-- Single Product End -->
                <!-- Single Product Start -->
                <div class="single-product">
                    <div class="pro-img">
                        <a href=""><img class="img" src="https://via.placeholder.com/150" alt="product-image"></a>
                    </div>
                    <div class="pro-content">
                        <div class="product-rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <h4><a href="">Products Name Here</a></h4>
                        <p><span class="price">$150.00</span><del class="prev-price">$200.00</del></p>
                    </div>
                </div>
                <!-- Single Product End -->
            </div>
            <!-- Double Product End -->
            <!-- Double Product Start -->
            <div class="double-pro">
                <!-- Single Product Start -->
                <div class="single-product">
                    <div class="pro-img">
                        <a href=""><img class="img" src="https://via.placeholder.com/150" alt="product-image"></a>
                    </div>
                    <div class="pro-content">
                        <div class="product-rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <h4><a href="">Products Name Here</a></h4>
                        <p><span class="price">$30.00</span><del class="prev-price">$32.00</del></p>
                    </div>
                </div>
                <!-- Single Product End -->
                <!-- Single Product Start -->
                <div class="single-product">
                    <div class="pro-img">
                        <a href=""><img class="img" src="https://via.placeholder.com/150" alt="product-image"></a>
                    </div>
                    <div class="pro-content">
                        <div class="product-rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <h4><a href="">Products Name Here</a></h4>
                        <p><span class="price">$150.00</span><del class="prev-price">$200.00</del></p>
                    </div>
                </div>
                <!-- Single Product End -->
            </div>
            <!-- Double Product End -->
            <!-- Double Product Start -->
            <div class="double-pro">
                <!-- Single Product Start -->
                <div class="single-product">
                    <div class="pro-img">
                        <a href=""><img class="img" src="https://via.placeholder.com/150" alt="product-image"></a>
                    </div>
                    <div class="pro-content">
                        <div class="product-rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <h4><a href="">Products Name Here</a></h4>
                        <p><span class="price">$30.00</span><del class="prev-price">$32.00</del></p>
                    </div>
                </div>
                <!-- Single Product End -->
                <!-- Single Product Start -->
                <div class="single-product">
                    <div class="pro-img">
                        <a href=""><img class="img" src="https://via.placeholder.com/150" alt="product-image"></a>
                    </div>
                    <div class="pro-content">
                        <div class="product-rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <h4><a href="">Products Name Here</a></h4>
                        <p><span class="price">$150.00</span><del class="prev-price">$200.00</del></p>
                    </div>
                </div>
                <!-- Single Product End -->
            </div>
            <!-- Double Product End -->
            <!-- Double Product Start -->
            <div class="double-pro">
                <!-- Single Product Start -->
                <div class="single-product">
                    <div class="pro-img">
                        <a href=""><img class="img" src="https://via.placeholder.com/150" alt="product-image"></a>
                    </div>
                    <div class="pro-content">
                        <div class="product-rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <h4><a href="">Products Name Here</a></h4>
                        <p><span class="price">$30.00</span><del class="prev-price">$32.00</del></p>
                    </div>
                </div>
                <!-- Single Product End -->
                <!-- Single Product Start -->
                <div class="single-product">
                    <div class="pro-img">
                        <a href=""><img class="img" src="https://via.placeholder.com/150" alt="product-image"></a>
                    </div>
                    <div class="pro-content">
                        <div class="product-rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <h4><a href="">Products Name Here</a></h4>
                        <p><span class="price">$150.00</span><del class="prev-price">$200.00</del></p>
                    </div>
                </div>
                <!-- Single Product End -->
            </div>
            <!-- Double Product End -->
        </div>
        <!-- Best Product Activation End -->
    </div>
    <!-- Container End -->
</div>
<!-- Best Product End -->
<!-- Blog Page Start -->
<div class="blog-area pb-60">
    <div class="container">
        <div class="group-title">
            <h2>From The Blog</h2>
        </div>
        <!-- Popular Categorie Activation Start -->
        <div class="blog-active owl-carousel">
            <!-- Single Blog Start -->
            <div class="single-blog">
                <div class="blog-img">
                    <a href=""><img src="https://via.placeholder.com/250" alt="blog-image"></a>
                </div>
                <div class="blog-content">
                    <h4 class="">Lorem ipsum dolor sit amet, consectl adip elit, sed do eiusmod tempor</a></h4>
                    <div class="blog-meta">
                        <ul>
                            <li><span>By: </span> <a href="#">Amandeep Singh,</a></li>
                            <li><span>On: </span> <a href="#">05 Nov, 2018</a></li>
                        </ul>
                    </div>
                    <div class="readmore">
                        <a href="">Read More.....</a>
                    </div>
                </div>
            </div>
            <!-- Single Blog End -->
            <!-- Single Blog Start -->
            <div class="single-blog">
                <div class="blog-img">
                    <a href=""><img src="https://via.placeholder.com/250" alt="blog-image"></a>
                </div>
                <div class="blog-content">
                    <h4 class="">Lorem ipsum dolor sit amet, consectl adip elit, sed do eiusmod tempor</a></h4>
                    <div class="blog-meta">
                        <ul>
                            <li><span>By </span> <a href="#">Amandeep Singh, </a></li>
                            <li><span>On </span> <a href="#">05 Nov, 2018</a></li>
                        </ul>
                    </div>
                    <div class="readmore">
                        <a href="">Read More.....</a>
                    </div>
                </div>
            </div>
            <!-- Single Blog End -->
            <!-- Single Blog Start -->
            <div class="single-blog">
                <div class="blog-img">
                    <a href=""><img src="https://via.placeholder.com/250" alt="blog-image"></a>
                </div>
                <div class="blog-content">
                    <h4 class="">Lorem ipsum dolor sit amet, consectl adip elit, sed do eiusmod tempor</a></h4>
                    <div class="blog-meta">
                        <ul>
                            <li><span>By </span> <a href="#">Amandeep Singh, </a></li>
                            <li><span>On </span> <a href="#">05 Nov, 2018</a></li>
                        </ul>
                    </div>
                    <div class="readmore">
                        <a href="">Read More.....</a>
                    </div>
                </div>
            </div>
            <!-- Single Blog End -->
            <!-- Single Blog Start -->
            <div class="single-blog">
                <div class="blog-img">
                    <a href=""><img src="https://via.placeholder.com/250" alt="blog-image"></a>
                </div>
                <div class="blog-content">
                    <h4 class="">Lorem ipsum dolor sit amet, consectl adip elit, sed do eiusmod tempor</a></h4>
                    <div class="blog-meta">
                        <ul>
                            <li><span>By </span> <a href="#">Amandeep Singh, </a></li>
                            <li><span>On </span> <a href="#">05 Nov, 2018</a></li>
                        </ul>
                    </div>
                    <div class="readmore">
                        <a href="">Read More.....</a>
                    </div>
                </div>
            </div>
            <!-- Single Blog End -->
            <!-- Single Blog Start -->
            <div class="single-blog">
                <div class="blog-img">
                    <a href=""><img src="https://via.placeholder.com/250" alt="blog-image"></a>
                </div>
                <div class="blog-content">
                    <h4 class="">Lorem ipsum dolor sit amet, consectl adip elit, sed do eiusmod tempor</a></h4>
                    <div class="blog-meta">
                        <ul>
                            <li><span>By </span> <a href="#">Amandeep Singh, </a></li>
                            <li><span>On </span> <a href="#">05 Nov, 2018</a></li>
                        </ul>
                    </div>
                    <div class="readmore">
                        <a href="">Read More.....</a>
                    </div>
                </div>
            </div>
            <!-- Single Blog End -->
            <!-- Single Blog Start -->
            <div class="single-blog">
                <div class="blog-img">
                    <a href=""><img src="https://via.placeholder.com/250" alt="blog-image"></a>
                </div>
                <div class="blog-content">
                    <h4 class="">Lorem ipsum dolor sit amet, consectl adip elit, sed do eiusmod tempor</a></h4>
                    <div class="blog-meta">
                        <ul>
                            <li><span>By </span> <a href="#">Amandeep Singh, </a></li>
                            <li><span>On </span> <a href="#">05 Nov, 2018</a></li>
                        </ul>
                    </div>
                    <div class="readmore">
                        <a href="">Read More.....</a>
                    </div>
                </div>
            </div>
            <!-- Single Blog End -->
        </div>
        <!-- Popular Categorie Activation End -->
    </div>
    <!-- Container End -->
</div>
<!-- Blog Page End -->
@endsection