@include('user.sidebar')


<nav>
    <div
        class="d-flex d-lg-none row py-1 justify-content-between align-items-center border-bottom border-2 border-opacity-25 border-black p-0 m-0">
        <div class="col-1 row justify-content-between align-items-end p-0 m-0">
            <a class="nav-link align-items-center fw-bold text-secondary text-nowrap col-12 fs-5"
                href="{{ route('main.index') }}">
                <img srcset="{{ url('storage/assets/benjaminmoore-icon.png') }}" style="height:24px;width:24px">
                Benjamin Moore
            </a>

        </div>
        <a class="col-1 btn" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button"
            aria-controls="offcanvasExample">
            <i class="fa fa-bars"></i>
        </a>
    </div>
    <div
        class="d-none d-lg-flex row py-1 justify-content-between align-items-center border-bottom border-2 border-opacity-25 border-black">
        <div class="w-auto row justify-content-between align-items-end">
            <a class="nav-link align-items-center fw-bold text-secondary text-nowrap col-12 fs-6"
                href="{{ route('main.index') }}">
                <img srcset="{{ url('storage/assets/benjaminmoore-icon.png') }}" style="height:20px;width:20px">
                Benjamin Moore
            </a>
        </div>
        <div class="w-auto row m-0 justify-content-between align-items-center">
            <a class="nav-link text-center text-secondary fs-6 col-2" href="{{ route('user.catalog') }}">
                Каталог
            </a>
            <a class="nav-link text-center text-secondary fs-6 col" href="{{ route('user.news') }}">
                Новости
            </a>
            <a class="nav-link text-center text-secondary fs-6 col" href="{{ route('calc') }}">
                Калькулятор
            </a>
            <div class="dropdown text-secondary p-0 col-3">
                <button class="btn dropdown-toggle text-secondary" type="button" id="dropdownMenu2"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Информация
                </button>
                <div class="dropdown-menu " aria-labelledby="dropdownMenu2">
                    <a href="{{ route('contacts') }}" class="dropdown-item text-secondary" type="button">Где купить</a>
                    <a class="dropdown-item text-secondary" type="button">Static-page-1</a>
                    <a class="dropdown-item text-secondary" type="button">Static-page-2</a>
                </div>
            </div>
        </div>
        <div class="col-5 justify-content-end row align-items-center p-0">
            <div class="col-6 justify-content-end p-0" style="width:fit-content">
                <div class="p-0 m-0 justify-content-start align-items-center text-secondary">
                    <a class="nav-link text-nowrap text-secondary m-0" href="tel:+375 (29) 608-40-00">
                        <i class="fa fa-phone text-danger"></i>
                        +375 (29) 608-40-00
                    </a>
                </div>
                <div class="p-0 m-0 justify-content-start align-items-center text-secondary ">
                    <i class="m-0 p-0 fa fa-clock text-danger"> </i>
                    ПН - ПТ, 10:00 - 19:00
                </div>
            </div>
            <div class="col-6 d-none d-lg-flex px-lg-2 p-0 m-0 justify-content-center align-items-center "
                style="height:fit-content;width:fit-content">
                <a class="btn btn-danger text-center text-nowrap text-white fs-6 m-0 py-1" href="{{ route('main.index') }}">
                    Заказать звонок
                </a>
            </div>
        </div>
    </div>
</nav>
