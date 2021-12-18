<div class="indicator">
    <a href="{{ route('cart') }}" class="indicator__button {{ Route::is('cart') ? 'active' : '' }}">
        <span class="indicator__area">
            <img src="{{ asset('user_assets/images/shopping-cart.svg') }}">
            @if (Cart::instance('cart')->count() > 0)
                <span class="indicator__value">{{ Cart::instance('cart')->count() }}</span>
            @else
                <span class="indicator__value">0</span>
            @endif
        </span>
    </a>
</div>
