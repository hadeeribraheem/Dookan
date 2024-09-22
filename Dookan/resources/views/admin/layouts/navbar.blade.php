<header class="header d-flex align-items-center fixed-top">
    <div class="d-flex align-items-center justify-content-between  me-auto">
        <a href="#" class="logo d-flex align-items-center">
            <img src="{{ asset('images/logos/Dookan_logo.png') }}" alt="logo" class="img-fluid w-500">
            <span class="d-none d-lg-block">Dookan Admin</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div>
    <nav class="header-nav pt-2">
        <ul class="d-flex align-items-center me-4">
            <li class="nav-item">
                <a href="?lang={{ app()->getLocale() === 'ar' ? 'en' : 'ar' }}">
                    <button type="button"  class="lang-btn">
                        {{ app()->getLocale() === 'ar' ? 'English' : 'Arabic' }}
                    </button>
                </a>


            </li>

            <li class="nav-item">
                <a href="{{ route('admin.profile') }}" data-toggle="dropdown" class="nav-link nav-link-lg nav-link-user">
                    @if(Auth::user()->image)
                        <img src="{{ asset('images/' .Auth::user()->image->name) }}" alt="image" style="width: 40px;height: 40px;
                                         object-fit: cover;"  class="rounded-circle mr-1">
                    @else
                        <img src="{{ asset('images/default.png') }}" alt="image" style="width: 40px;height: 40px;
                                         object-fit: cover;"  class="rounded-circle mr-1">
                    @endif

                    <div class="d-none d-md-block d-lg-inline-block">
                        <span class="text-white">Hi, {{ Auth::user()->username }} </span>
                    </div>
                </a>
            </li>
        </ul>
    </nav>
</header>
