<header>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 col-md-2">
                <div class="logo">
                    <a class="company_logo" href="{{ route('products.index') }}">
                        <img src="{{ asset('images/logos/Dookan_logo.png') }}" alt="{{ __('keywords.logo_alt') }}" class="img-fluid w-50">
                    </a>
                </div>
            </div>

            <div class="col-md-8 d-none d-md-flex">
                <div class="search-bar w-100 d-flex">
                    <input type="text" class="form-control search-input" placeholder="{{ __('keywords.search_placeholder') }}">
                    <button class="search-btn">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>

            <div class="col-md-2 text-right d-none d-md-flex justify-content-end">
                <div class="header-icons">
                    <a href="{{ route('profile', ['lang' => app()->getLocale()]) }}"><i class="fas fa-user"></i></a>
                    <a href="{{ route('wishlist.index', ['lang' => app()->getLocale()]) }}"><i class="fas fa-heart"></i></a>
                    <a href="{{ route('cart.index', ['lang' => app()->getLocale()]) }}"><i class="fas fa-shopping-bag"></i></a>
                </div>
            </div>
        </div>
    </div>
</header>
