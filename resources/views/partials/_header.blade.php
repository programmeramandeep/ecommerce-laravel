@php
$cartCollection = Cart::getContent();
@endphp
<!-- Header Area Start -->
<header>
    <!-- Header Top Start -->
    <div class="header-top">
        <div class="container">
            <div class="row">
                <!-- Header Top left Start -->
                <div class="col-lg-4 col-md-12 d-center">
                    <div class="header-top-left">
                        <img src="{{ asset('img/icon/call.png') }}" alt="">Call Us : +11 222 3333
                    </div>
                </div>
                <!-- Header Top left End -->
                <!-- Search Box Start -->
                <div class="col-lg-4 col-md-6 ml-auto mr-auto">
                    <div class="search-box-view">
                        <form action="#">
                            <input type="text" class="email" placeholder="Search Your Product" name="product">
                            <button type="submit" class="submit"></button>
                        </form>
                    </div>
                </div>
                <!-- Search Box End -->
                <!-- Header Top Right Start -->
                <div class="col-lg-4 col-md-12">
                    <div class="header-top-right">
                        <ul class="header-list-menu f-right">
                            <!-- Language Start -->
                            <li><a href="">Language: English <i class="fa fa-angle-down"></i></a>
                                <ul class="ht-dropdown">
                                    <li><a href="">Spanish</a></li>
                                    <li><a href="">Bengali</a></li>
                                    <li><a href="">Russian</a></li>
                                </ul>
                            </li>
                            <!-- Language End -->
                            <!-- Currency Start -->
                            <li><a href="">Currency: USD <i class="fa fa-angle-down"></i></a>
                                <ul class="ht-dropdown">
                                    <li><a href="">USD</a></li>
                                    <li><a href="">GBP</a></li>
                                    <li><a href="">EUR</a></li>
                                </ul>
                            </li>
                            <!-- Currency End -->
                        </ul>
                        <!-- Header-list-menu End -->
                    </div>
                </div>
                <!-- Header Top Right End -->
            </div>
        </div>
        <!-- Container End -->
    </div>
    <!-- Header Top End -->
    <!-- Header Bottom Start -->
    <div class="header-bottom header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-2 col-sm-5 col-5">
                    <div class="logo">
                        <a href="{{ url('/') }}"><img src="https://via.placeholder.com/138x36" alt="logo-image"></a>
                    </div>
                </div>
                <!-- Primary Vertical-Menu End -->
                <!-- Search Box Start -->
                <div class="col-xl-6 col-lg-7 d-none d-lg-block">
                    <div class="middle-menu pull-right">
                        @include('partials/_navbar', ['ulClass' => 'middle-menu-list', 'dropdown' => 'ht-dropdown
                        dropdown-style-two', 'subMenu' => 'sub-menu'])
                    </div>
                </div>
                <!-- Search Box End -->
                <!-- Cartt Box Start -->
                <div class="col-lg-3 col-sm-7 col-7">
                    <div class="cart-box text-right">
                        <ul>
                            <li><a href="javascript:void(0);"><i class="fa fa-cog"></i></a>
                                <ul class="ht-dropdown">
                                    @guest
                                    <li><a href="{{ route('login') }}">{{ __('Login') }}</a></li>
                                    @if (Route::has('register'))
                                    <li><a href="{{ route('register') }}">{{ __('Register') }}</a></li>
                                    @endif
                                    @else
                                    <li><a href="">Account</a></li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            style="display: none;">
                                            @csrf
                                        </form>
                                    </li>
                                    @endguest
                                </ul>
                            </li>
                            <li>
                                <a href="{{ route('wishlist.index') }}" title="Wishlist">
                                    <i class="fa fa-heart-o"></i>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('cart.index') }}">
                                    <i class="fa fa-shopping-basket"></i>
                                    <span class="cart-counter">{{ $cartCollection->count() }}</span>
                                </a>

                                <ul class="ht-dropdown main-cart-box">
                                    @if (Cart::isEmpty())
                                    <h6 class="text-capitalize">No items in Cart!</h6>
                                    @else
                                    <li>
                                        @foreach ($cartCollection as $item)
                                        <!-- Cart Box Start -->
                                        <div class="single-cart-box">
                                            <div class="cart-img">
                                                <a href="{{ route('shop.show', $item->model->slug) }}">
                                                    @if ($item->model->image !== '')
                                                    <img src="{{ asset('storage/'.$item->model->image) }}"
                                                        alt="cart-image">
                                                    @else
                                                    <img src="https://via.placeholder.com/150" alt="cart-image">
                                                    @endif
                                                </a>
                                            </div>
                                            <div class="cart-content">
                                                <h6><a href="{{ route('shop.show', $item->model->slug) }}">
                                                        {{$item->model->name}}
                                                    </a>
                                                </h6>
                                                <span>{{ $item->quantity }} × {{ $item->model->presentPrice() }}</span>
                                            </div>
                                            <a href="javascript:void(0);" class="del-icone"
                                                onclick="event.preventDefault(); document.getElementById('cart-item-remove-{{ $item->id }}').submit();">
                                                <i class="fa fa-window-close-o"></i>
                                            </a>

                                            <form id="cart-item-remove-{{ $item->id }}"
                                                action="{{ route('cart.destroy', $item->id) }}" method="POST"
                                                class="d-none">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </div>
                                        <!-- Cart Box End -->
                                        @endforeach

                                        <!-- Cart Footer Inner Start -->
                                        <div class="cart-footer fix">
                                            <h5>total :<span
                                                    class="f-right">{{ moneyFormat(Cart::getTotal(), 'INR') }}</span>
                                            </h5>
                                            <div class="cart-actions">
                                                <a class="checkout" href="{{ route('checkout.index') }}">Checkout</a>
                                            </div>
                                        </div>
                                        <!-- Cart Footer Inner End -->
                                    </li>
                                    @endif
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- Cartt Box End -->
                <div class="col-sm-12 d-lg-none">
                    <div class="mobile-menu">
                        @include('partials/_navbar', ['ulClass' => '', 'dropdown' => '', 'subMenu' => ''])
                    </div>
                </div>
                <!-- Mobile Menu  End -->
            </div>
            <!-- Row End -->
        </div>
        <!-- Container End -->
    </div>
    <!-- Header Bottom End -->
</header>
<!-- Header Area End -->