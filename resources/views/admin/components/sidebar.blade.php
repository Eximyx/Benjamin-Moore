<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
        {{--        <img class="mb-1 mr-1" srcset="{{ url('storage/assets/benjaminmoore-icon.png') }}"--}}
        {{--             style="height:24px;width:24px">--}}
        <p class="m-0">
            Benjamin Moore
        </p>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider m-0 p-0">

    <!-- Nav Item - Dashboard -->

    {{-- <li class="nav-item">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li> --}}

    @foreach(Route::getRoutes() as $key => $value)
        @if(str_contains($value->uri, 'admin') && str_contains($value->getName(), 'index'))
            @if (str_contains($value->getName(),'user') && Auth()->user()->user_role_id < 3 || (str_contains($value->getName(), 'settings') || str_contains($value->getName(), 'profile')) )
                @continue
            @endif
            <li class="nav-item">
                <a class="nav-link" href={{route($value->getName())}}>
                    <i class=" fas fa-circle p-0 m-0"></i>
                    <span>@lang('sidebar.'.$value->getName())</span></a>
            </li>
        @endif
    @endforeach

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


</ul>
