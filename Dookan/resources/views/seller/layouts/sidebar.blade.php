<!--- ====== side bar ====== --->
<aside id="sideBar" class="sideBar col-md-2 col-auto min-vh-100">
    <ul class="sideBar-nav">
        <li class="menu-header">{{ __('keywords.dashboard') }}</li>
        <li class="nav-item">
            <a href="{{route('seller.dashboard')}}" class="nav-link">
                <i class="bi bi-fire"></i>
                <span>{{ __('keywords.dashboard') }}</span>
            </a>
        </li>

        <li class="menu-header">{{ __('keywords.design_studio') }}</li>
        <li class="nav-item">
            <a href="#" class="nav-link collapsed" data-bs-toggle="collapse" data-bs-target="#forms-nav" aria-expanded="false">
                <i class="bi bi-journal-text"></i>
                <span>{{ __('keywords.forms') }}</span>
                <i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="forms-nav" class="nav-content collapse" data-bs-parent="#sideBar">
                <li>
                    <a href="{{route('seller.products.create') }}">
                        <i class="bi bi-circle"></i><span>{{ __('keywords.add_product') }}</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a href="#" class="nav-link collapsed" data-bs-toggle="collapse" data-bs-target="#tables-nav" aria-expanded="false">
                <i class="bi bi-layout-text-window-reverse"></i>
                <span>{{ __('keywords.tables') }}</span>
                <i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="tables-nav" class="nav-content collapse" data-bs-parent="#sideBar">
                <li>
                    <a href="{{ route('seller.users', ['sellerId' => auth()->user()->id]) }}">
                        <i class="bi bi-circle"></i><span>{{ __('keywords.show_users') }}</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('seller.own-products') }}">
                        <i class="bi bi-circle"></i><span>{{ __('keywords.show_products') }}</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-heading">{{ __('keywords.pages') }}</li>
        <li class="nav-item">
            <a href="{{ route('seller.profile') }}" class="nav-link collapsed">
                <i class="bi bi-person"></i>
                <span>{{ __('keywords.profile') }}</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('logout') }}" class="nav-link collapsed">
                <i class="bi bi-box-arrow-left text-danger"></i>
                <span class="text-danger">{{ __('keywords.logout') }}</span>
            </a>
        </li>
    </ul>
</aside>
<!-- End of nav bar -->
