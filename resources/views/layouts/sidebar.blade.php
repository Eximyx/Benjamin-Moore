<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider m-0 p-0">

    <!-- Nav Item - Dashboard -->

    {{-- <li class="nav-item">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li> --}}
    <li class="nav-item">
        <a class="nav-link" href="{{ route('news_category.index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Категории новостей</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('news.index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Категории</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('products.index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Продукты</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('product_category.index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Категории продуктов</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('static-page.index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Страницы</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('news.index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Новости</span></a>
    </li>   
    <li class="nav-item">
        <a class="nav-link" href="{{ route('leads.index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Заказы</span></a>
    </li>

    @if (Auth::user()->user_role_id > 1)
        <li class="nav-item">
            <a class="nav-link" href="{{ route('user.index') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Пользователь</span></a>
        </li>
    @endif
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


</ul>
