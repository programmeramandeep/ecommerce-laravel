<div class="dashboard-upper-info">
    <div class="row no-gutters align-items-center">
        <div class="col-lg-4 col-md-6">
            <div class="d-single-info">
                <p class="user-name">Hello <span>{{ $user->name }}</span></p>
                <p>({{ $user->email }}? <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form2').submit();">
                        {{ __('Logout') }}
                    </a>)</p>

                <form id="logout-form2" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="d-single-info">
                <p>Need Assistance? Customer service at.</p>
                <p>admin@example.com.</p>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="d-single-info">
                <p>E-mail them at </p>
                <p>support@example.com</p>
            </div>
        </div>
        <div class="col-lg-2 col-md-6">
            <div class="d-single-info text-center">
                <a href="{{ route('cart.index') }}" class=""><i class="fa fa-cart-plus" aria-hidden="true"></i> View
                    cart</a>
            </div>
        </div>
    </div>
</div>