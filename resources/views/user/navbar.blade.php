<nav class="d-lg-block">
    <div
        class="row py-1 justify-content-between align-items-center border-bottom border-2 border-opacity-25 border-black">
        <div class="col-sm-3 col-md-2 col-lg-2 col-xl-2 col-xxl-2 row justify-content-between align-items-end ">
            <a class="nav-link align-items-center fw-bold text-secondary text-nowrap col-12 fs-6"
                href="{{ route('main') }}">
                <img srcset="{{ url('storage/assets/benjaminmoore-icon.png') }} 2300w">
                Benjamin Moore
            </a>
        </div>
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="nav-link text-center text-secondary fs-6 col-sm-1 col-md-2 col-lg-2 col-xl-2 m-0 p-0"
                href="{{ route('user.catalog') }}">
                Каталог
            </a>
            <a class="nav-link text-center text-secondary fs-6 col-sm-1 col-md-2 col-lg-3 col-xl-2 m-0 p-0"
                href="{{ route('user.news') }}">
                Новости
            </a>
            <a class="nav-link text-center text-secondary fs-6 col-sm-1 col-md-2 col-lg-3 col-xl-3  m-0 p-0"
                href="{{ route('calc') }}">
                Калькулятор
            </a>
            <a class="d-lg-block d-none nav-link text-center text-nowrap text-secondary fs-6 col-md-2 col-lg-3 col-xl-3 m-0 p-0"
                href="{{ route('user.news') }}">
                Страницы
            </a>
        </div>
        <div class="col-sm-3 col-md-4 col-lg-5 col-xl-6 col-xxl-4 row m-0 justify-content-between align-items-center ">
            <a class="nav-link text-center text-secondary fs-6 col-sm-1 col-md-2 col-lg-2 col-xl-2 m-0 p-0"
                href="{{ route('user.catalog') }}">
                Каталог
            </a>
            <a class="nav-link text-center text-secondary fs-6 col-sm-1 col-md-2 col-lg-3 col-xl-2 m-0 p-0"
                href="{{ route('user.news') }}">
                Новости
            </a>
            <a class="nav-link text-center text-secondary fs-6 col-sm-1 col-md-2 col-lg-3 col-xl-3  m-0 p-0"
                href="{{ route('calc') }}">
                Калькулятор
            </a>
            <a class="d-lg-block d-none nav-link text-center text-nowrap text-secondary fs-6 col-md-2 col-lg-3 col-xl-3 m-0 p-0"
                href="{{ route('user.news') }}">
                Страницы
            </a>
        </div>
        <div class="col-md-5 col-lg-5 col-xl-4 justify-content-between row align-items-center">
            <div class="d-none d-lg-block col-md-2 col-lg-7 col-xl-6 row" style="font-size:12px">
                <a class="nav-link text-nowrap text-secondary m-0" href="tel:+375 (29) 608-40-00">
                    <i class="fa fa-phone text-danger"></i>
                    +375 (29) 608-40-00
                </a>
                <p class="text-secondary text-nowrap m-0">
                    <i class="fa fa-clock text-danger"></i>
                    ПН — ПТ, 10:00 — 19:00
                </p>
            </div>
            <a class="nav-link text-black-50 fs-5 col-md-3 col-lg-2 fa fa-shop m-0 p-0" href="{{ route('cart') }}">
                <sub class="m-0 p-0 text-danger opacity-100 " style="font-size:10px">
                    {{ count((array) session('cart')) }} <span class="m-0 p-0" style="font-size:7px">+</span>
                </sub>
            </a>
            <div class="py-lg-1 py-1 px-0 p-0 m-0 col-md-3 col-lg-3 justify-content-center align-items-center ">
                @if (auth()->user() == null)
                    <a class="nav-link btn btn-danger text-center text-nowrap text-white fs-6 m-0 py-1"
                        href="{{ route('login') }}">
                        Войти
                    </a>
                @else
                    <a class="nav-item dropdown no-arrow fs-6 m-0 py-1">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                <b id='profile' class="m-0 p-0">{{ auth()->user()->name }}</b>
                            </span>
                            <img class="img-profile rounded-circle img-fluid"
                                src="{{ url('storage/image/profile.svg') }}" alt="...">
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu shadow " aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="{{ route('profile') }}">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Profile
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </div>
                    </a>
                @endif
            </div>
        </div>
    </div>
</nav>
{{-- <nav class="container d-lg-none border-bottom border-2 border-opacity-25 border-black">
    <div class="col-sm-12 py-1 row justify-content-between align-items-center ">
        <div class="col-sm-2 col-1 row justify-content-start   align-items-end ">
            <a class="nav-link align-items-center fw-bold text-secondary text-nowrap fs-6 m-0" href="{{route('main')}}">
                <img srcset="{{ url('storage/assets/benjaminmoore-icon.png') }} 1350w">
                Benjamin Moore
            </a>
        </div>
        <div class="col-sm-1 col-2 justify-content-end">
            <i class="fa fa-bars"></i>
        </div>
    </div>
</nav> --}}
