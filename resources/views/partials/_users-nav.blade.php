<ul class="nav flex-column dashboard-list" role="tablist">
    <li><a class="{{ $active == 'dashboard' ? 'active' : '' }}" href="{{ route('users.dashboard') }}">Dashboard</a></li>
    <li><a class="{{ $active == 'orders' ? 'active' : '' }}" href="{{ route('orders.index') }}">Orders</a></li>
    <li><a class="{{ $active == 'downloads' ? 'active' : '' }}" href="{{ route('users.downloads') }}">Downloads</a></li>
    <li><a class="{{ $active == 'address' ? 'active' : '' }}" href="{{ route('users-address.edit') }}">Addresses</a></li>
    <li><a class="{{ $active == 'details' ? 'active' : '' }}" href="{{ route('users.edit') }}">Account details</a></li>
    <li><a class="{{ $active == 'password' ? 'active' : '' }}" href="{{ route('users-password.edit') }}">Change Password</a></li>
    <li>
        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form-submit').submit();">
            {{ __('Logout') }}
        </a>
        <form id="logout-form-submit" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </li>
</ul>