<!-- Header Area Start -->
<header>
    <!-- Header Top Start -->
    <div class="header-top">
        <div class="container">
            <div class="row">
                <!-- Header Top left Start -->
                <div class="col-lg-4 col-md-12 d-center">
                    <div class="header-top-left">
                        <img src="img/icon/call.png" alt="">Call Us : +11 222 3333
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
                        <a href="{{ url('/') }}"><img src="img/logo/logo.png" alt="logo-image"></a>
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
                            <li><a href=""><i class="fa fa-heart-o"></i></a></li>
                            <li><a href=""><i class="fa fa-shopping-basket"></i><span class="cart-counter">2</span></a>
                                <ul class="ht-dropdown main-cart-box">
                                    <li>
                                        <!-- Cart Box Start -->
                                        <div class="single-cart-box">
                                            <div class="cart-img">
                                                <a href=""><img src="img/menu/1.jpg" alt="cart-image"></a>
                                            </div>
                                            <div class="cart-content">
                                                <h6><a href="product.html">Products Name</a></h6>
                                                <span>1 × $399.00</span>
                                            </div>
                                            <a class="del-icone" href=""><i class="fa fa-window-close-o"></i></a>
                                        </div>
                                        <!-- Cart Box End -->
                                        <!-- Cart Box Start -->
                                        <div class="single-cart-box">
                                            <div class="cart-img">
                                                <a href=""><img src="img/menu/2.jpg" alt="cart-image"></a>
                                            </div>
                                            <div class="cart-content">
                                                <h6><a href="product.html">Products Name</a></h6>
                                                <span>2 × $299.00</span>
                                            </div>
                                            <a class="del-icone" href=""><i class="fa fa-window-close-o"></i></a>
                                        </div>
                                        <!-- Cart Box End -->
                                        <!-- Cart Footer Inner Start -->
                                        <div class="cart-footer fix">
                                            <h5>total :<span class="f-right">$698.00</span></h5>
                                            <div class="cart-actions">
                                                <a class="checkout" href="checkout.html">Checkout</a>
                                            </div>
                                        </div>
                                        <!-- Cart Footer Inner End -->
                                    </li>
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