<!-- Realted Product Start -->
<div class="related-product pb-30">
    <div class="container">
        <div class="related-box">
            <div class="group-title">
                <h2>related product</h2>
            </div>
            <!-- Realted Product Activation Start -->
            <div class="new-upsell-pro owl-carousel">
                @foreach ($relatedProducts as $product)
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
                        <h4><a href="{{ route('shop.show', $product->slug) }}">{{ $product->name }}</a></h4>
                        <p><span class="price">{{ $product->presentPrice() }}</span><del class="prev-price">$32.00</del>
                        </p>
                        <div class="pro-actions">
                            <div class="actions-secondary">
                                <a href="" data-toggle="tooltip" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
                                <a class="" data-toggle="tooltip" title="Add to Cart">Add To
                                    Cart</a>
                                <a href="" data-toggle="tooltip" title="Add to Compare"><i class="fa fa-signal"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- Product Content End -->
                    <span class="sticker-new">-32%</span>
                </div>
                <!-- Single Product End -->
                @endforeach
            </div>
            <!-- Realted Product Activation End -->
        </div>
    </div>
</div>
<!-- Realted Product End -->