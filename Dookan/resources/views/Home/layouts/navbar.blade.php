<!-- Sticky Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top">
    <div class="container">
        <!-- Sidebar Toggle (only for mobile) -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar Links -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">{{ __('keywords.vendors') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">{{ __('keywords.categories') }}</a>
                </li>
            </ul>

            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">{{ __('keywords.contact_us') }}</a>
                </li>
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('keywords.login') }}</a>
                    </li>
                @endguest
                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}">{{ __('keywords.logout') }}</a>
                    </li>
                @endauth
                <li class="nav-item">
                    <a class="nav-link" href="?lang={{ app()->getLocale() === 'ar' ? 'en' : 'ar' }}">
                        {{ app()->getLocale() === 'ar' ? __('keywords.english') : __('keywords.arabic') }}
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
