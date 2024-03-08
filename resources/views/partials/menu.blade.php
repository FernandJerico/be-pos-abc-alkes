<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="index.html" class="app-brand-link">

            <span class="app-brand-text demo menu-text fw-bolder ms-2">Klinik Pratama Fuji</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item {{ request()->is('home') ? 'active' : '' }}">
            <a href="{{ route('home') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>

        <li class="menu-header small text-uppercase"><span class="menu-header-text">Menu</span></li>
        <li class="menu-item {{ request()->is('manage-users*') ? 'active' : '' }}">
            <a href="{{ route('manage-users.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-group"></i>
                <div data-i18n="Basic">Manage Users</div>
            </a>
        </li>
        <li class="menu-item {{ request()->is('products*') ? 'active' : '' }}">
            <a href="{{ route('products.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-package"></i>
                <div data-i18n="Basic">Products</div>
            </a>
        </li>

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Setting</span>
        </li>
        <li class="menu-item {{ request()->is('dashboard/profile*') ? 'active' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div data-i18n="Account Settings">Account Settings</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item  {{ request()->is('dashboard/profile') ? 'active' : '' }}">
                    <a href="{{ route('profile') }}" class="menu-link">
                        <div data-i18n="Account">Account</div>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</aside>
