<div>
    <ul>
        <li class="account-nav__item {{ Route::is('user.dashboard') ? 'account-nav__item--active' : '' }}">
            <a href="{{ route('user.dashboard') }}">Dashboard</a>
        </li>
        <li class="account-nav__item {{ Route::is('user.profile') ? 'account-nav__item--active' : '' }}">
            <a href="{{ route('user.profile') }}">Edit Profile</a>
        </li>
        <li class="account-nav__item {{ Route::is('user.order') || Route::is('user.order.detail') ? 'account-nav__item--active' : '' }}">
            <a href="{{ route('user.order') }}">Order History</a>
        </li>
        <li class="account-nav__item {{ Route::is('user.password') ? 'account-nav__item--active' : '' }}">
            <a href="{{ route('user.password') }}">Password</a>
        </li>
        <li class="account-nav__item">
            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                class="d-none">
                @csrf
            </form>
            <a href="{{ route('logout') }}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">Logout</a>
        </li>
    </ul>
</div>
