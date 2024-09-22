<!--- ====== side bar ====== --->
<aside id="sideBar" class="sideBar col-md-2 col-auto min-vh-100">
    <ul class="sideBar-nav">
        <li class="menu-header">Dashboard</li>
        <li class="nav-item ">

            <a href="{{route('admin.dashbaord')}}" class="nav-link">
                <i class="bi bi-fire"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="menu-header">Design Studio</li>
        <li class="nav-item">
            <a href="#" class="nav-link collapsed" data-bs-toggle="collapse" data-bs-target="#forms-nav" aria-expanded="false">
                <i class="bi bi-journal-text"></i>
                <span>Forms</span>
                <i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="forms-nav" class="nav-content collapse" data-bs-parent="#sideBar">
                <li>
                    <a href="{{ route('admin.users.create') }}">
                        <i class="bi bi-circle"></i><span>Add User</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.categories.create') }}">
                        <i class="bi bi-circle"></i><span>Add Category</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.products.create') }}">
                        <i class="bi bi-circle"></i><span>Add Product</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a href="#" class="nav-link collapsed" data-bs-toggle="collapse" data-bs-target="#tables-nav" aria-expanded="false">
                <i class="bi bi-layout-text-window-reverse"></i>
                <span>Tables</span>
                <i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="tables-nav" class="nav-content collapse" data-bs-parent="#sideBar">
                <li>
                    <a href="{{ route('admin.users.index') }}">
                        <i class="bi bi-circle"></i><span>Show Users</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.categories.index')}}">
                        <i class="bi bi-circle"></i><span>Show Categories</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.products.index') }}">
                        <i class="bi bi-circle"></i><span>Show Products</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-heading">Pages</li>
        <li class="nav-item">
            <a href="{{ route('admin.profile') }}" class="nav-link collapsed">
                <i class="bi bi-person"></i>
                <span>Profile</span>
            </a>
        </li>
{{--
        <li class="nav-item">
            <a href="#" class="nav-link collapsed">
                <i class="bi bi-question-circle"></i>
                <span>F.A.Q</span>
            </a>
        </li>
--}}
        <li class="nav-item">
            <a href="{{ route('logout') }}" class="nav-link collapsed">
                <i class="bi bi-box-arrow-left text-danger"></i>
                <span class="text-danger">Logout</span>
            </a>
        </li>

    </ul>
</aside>
<!-- End of nav bar -->


{{--

<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">

        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="dropdown active">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
                <ul class="dropdown-menu" style="border: 0 !important;">
                    <li class=active><a class="nav-link" href="index-0.html">General Dashboard</a></li>
                    <li><a class="nav-link" href="index.html">Ecommerce Dashboard</a></li>
                </ul>
            </li>
            <li class="menu-header">Insert</li>
            <li class="dropdown active">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Design Studio</span></a>
                <ul class="dropdown-menu" style="border: 0 !important;">
                    <li><a class="nav-link" href="layout-default.html">Register User</a></li>
                    <li><a class="nav-link" href="{{ route('admin.categories.create') }}">Add Category</a></li>
                    <li><a class="nav-link" href="layout-top-navigation.html">Add Product</a></li>
                </ul>
            </li>
            <li class="menu-header">Show</li>
            <li class="dropdown active">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Tables</span></a>
                <ul class="dropdown-menu" style="border: 0 !important;">
                    <li><a class="nav-link" href="layout-default.html">Show Users</a></li>
                    <li><a class="nav-link" href="#">Show Products</a></li>
                    <li><a class="nav-link" href="{{ route('admin.categories.index') }}">Show CategoriesRepository</a></li>
                </ul>
            </li>
        </ul>

      </aside>
</div>
--}}
