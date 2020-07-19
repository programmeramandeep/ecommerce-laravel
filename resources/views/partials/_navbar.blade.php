<nav>
    <ul class="{{ $ulClass }}">
        <li><a href="index.html">home<i class="fa fa-angle-down"></i></a>
            <!-- Home Version Dropdown Start -->
            <ul class="ht-dropdown home-dropdown">
                <li><a href="index.html">Home Version One</a></li>
                <li><a href="index-2.html">Home Version Two</a></li>
                <li><a href="index-3.html">Home Box Layout</a></li>
            </ul>
            <!-- Home Version Dropdown End -->
        </li>
        <li><a href="about.html">about us</a></li>
        <li><a href="shop.html">shop<i class="fa fa-angle-down"></i></a>
            <!-- Home Version Dropdown Start -->
            <ul class="{{ $dropdown }}">
                <li><a href="shop.html">Shop</a>
                    <!-- Start Two Step -->
                    <ul class="{{ $dropdown }} {{$subMenu }}">
                        <li><a href="shop.html">Product Category Name</a>
                            <!-- Start Three Step -->
                            <ul class="{{ $dropdown }} {{$subMenu }}">
                                <li><a href="shop.html">Product Category Name</a></li>
                                <li><a href="shop.html">Product Category Name</a></li>
                                <li><a href="shop.html">Product Category Name</a></li>
                            </ul>
                        </li>
                        <li><a href="shop.html">Product Category Name</a></li>
                        <li><a href="shop.html">Product Category Name</a></li>
                    </ul>
                </li>
                <li><a href="product.html">product details Page</a></li>
                <li><a href="compare.html">Compare Page</a></li>
                <li><a href="cart.html">Cart Page</a></li>
                <li><a href="checkout.html">Checkout Page</a></li>
                <li><a href="wishlist.html">Wishlist Page</a></li>
            </ul>
            <!-- Home Version Dropdown End -->
        </li>
        <li><a href="blog.html">Blog<i class="fa fa-angle-down"></i></a>
            <!-- Home Version Dropdown Start -->
            <ul class="{{ $dropdown }}">
                <li><a href="blog.html">Blog Page</a></li>
                <li><a href="blog-details.html">Blog Details Page</a></li>
            </ul>
            <!-- Home Version Dropdown End -->
        </li>
        <li><a href="">pages<i class="fa fa-angle-down"></i></a>
            <!-- Home Version Dropdown Start -->
            <ul class="{{ $dropdown }}">
                <li><a href="login.html">Login Page</a></li>
                <li><a href="register.html">Register Page</a></li>
                <li><a href="404.html">404 Page</a></li>
                <li><a href="forgot-password.html">Forgot Password Page</a></li>
                <li><a href="account.html">Account Page</a></li>
            </ul>
            <!-- Home Version Dropdown End -->
        </li>
        <li><a href="contact.html">contact us</a></li>
    </ul>
</nav>