<aside id="sidebar">
    <div class="d-flex">
        <button class="toggle-btn" type="button">
            <i class="fa-solid fa-cart-shopping"></i>
        </button>
        <div class="sidebar-logo">
            <a href="{{ route('products.index', ['lang' => app()->getLocale()]) }}">Dookan</a>
        </div>
    </div>
    <ul class="sidebar-nav">
        <li class="sidebar-item">
            <a href="{{ route('profile', ['lang' => app()->getLocale()]) }}" class="sidebar-link">
                <i class="fa-regular fa-user"></i>
                <span>{{ __('keywords.profile') }}</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a href="#" class="sidebar-link">
                <i class="fa-solid fa-shop"></i>
                <span>{{ __('keywords.orders') }}</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a href="{{ route('user.address.create', ['lang' => app()->getLocale()]) }}" class="sidebar-link">
                <i class="fa-solid fa-location-dot"></i>
                <span>{{ __('keywords.addresses') }}</span>
            </a>
        </li>
    </ul>
</aside>
