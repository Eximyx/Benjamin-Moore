<footer>
    <div
        class="row py-1 justify-content-between align-items-center border-top border-2 border-opacity-25 border-black mt-3">
        <div class="col-2 row justify-content-between align-items-end">
            <a class="nav-link align-items-center fw-bold text-secondary text-nowrap col-12 fs-6"
               href="{{ route('user.main.index') }}">
                <img srcset="{{ url('storage/assets/benjaminmoore-icon.png') }}" style="height:20px;width:20px">
                Benjamin Moore
            </a>
        </div>
        <div class=" d-md-none d-sm-flex col-sm-12 col-md-6 row m-0 p-0 justify-content-around align-items-center ">
            <a class="nav-link" href="{{ route('user.catalog') }}">
                @lang('main.navbar.catalog')
            </a>
            <a class="nav-link" href="{{ route('user.news') }}">
                @lang('main.navbar.news')
            </a>
            <a class="nav-link" href="{{ route('user.calc') }}">
                @lang('main.navbar.calc')
            </a>
            <a class="nav-link row p-0 m-0" data-toggle="collapse" href="#collapseExample" role="button"
               aria-expanded="false"
               aria-controls="collapseExample">
                <div class="col-12 justify-content-between row m-0 p-0">
                    <p class="col p-0 m-0">
                        @lang('main.navbar.info')
                    </p>
                    <div class="col-1 align-items-center w-auto">
                        <i class="fa fa-angle-down"></i>
                    </div>
                </div>
            </a>
            <div class="collapse" id="collapseExample">
                <div class="row p-0 m-0">
                    <div class="row justify-content-start">
                        <a class="nav-link p-0 m-0">@lang('main.navbar.whereToBuy')</a>
                    </div>
                    <div class="row justify-content-start">
                        <a class="nav-link p-0 m-0">@lang('main.navbar.whereToBuy')</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-none d-md-flex col-md-6 row m-0 justify-content-around align-items-center ">
            <a class="nav-link text-center text-secondary fs-6 col-1 m-0 p-0" href="{{ route('user.catalog') }}">
                @lang('main.navbar.catalog')
            </a>
            <a class="nav-link text-center text-secondary fs-6 col-1 m-0 p-0" href="{{ route('user.news') }}">
                @lang('main.navbar.news')
            </a>
            <a class="nav-link text-center text-secondary fs-6 col-2 m-0 p-0" href="{{ route('user.calc') }}">
                @lang('main.navbar.calc')
            </a>
            <div class="dropdown text-secondary p-0 col-3">
                <button class="btn dropdown-toggle text-secondary" type="button" id="dropdownMenu2"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    @lang('main.navbar.info')
                </button>
                <div class="dropdown-menu " aria-labelledby="dropdownMenu2">
                    <button class="dropdown-item text-secondary" type="button">@lang('main.navbar.whereToBuy')</button>
                    <button class="dropdown-item text-secondary" type="button">Static-page-1</button>
                    <button class="dropdown-item text-secondary" type="button">Static-page-2</button>
                </div>
            </div>
        </div>
        <div class="d-none d-md-flex col-3 justify-content-end row align-items-center p-0 ">
            <div class="justify-content-end" style="width:fit-content">
                <div class="p-0 m-0 justify-content-start align-items-center text-secondary ">
                    <a class="nav-link text-nowrap text-secondary m-0" href="tel:+375 (29) 608-40-00">
                        <i class="fa fa-phone text-danger"></i>
                        +375 (29) 608-40-00
                    </a>
                </div>
                <div class="p-0 m-0 justify-content-start align-items-center text-nowrap text-secondary ">
                    <i class="m-0 p-0 fa fa-clock text-danger "> </i>
                    ПН - ПТ, 10:00 - 19:00
                </div>
                <div class="p-0 m-0 justify-content-start align-items-center text-nowrap text-secondary ">
                    <a href=""></a>
                    <i class="m-0 p-0 fa fa-envelope text-danger"> </i>
                    benjaminmoore@test.ru
                </div>
            </div>
        </div>
        <div class="d-flex d-md-none  col-12 p-0 m-0 row justify-content-around mt-2 fs-8">
            <div class="col p-0 m-0 justify-content-center align-items-center text-secondary">
                <a class="nav-link text-nowrap text-secondary m-0" href="tel:+375 (29) 608-40-00">
                    <i class="fa fa-phone text-danger"></i>
                    +375 (29) 608-40-00
                </a>
            </div>
            <div class="col p-0 m-0 justify-content-center align-items-center text-secondary text-nowrap">
                <i class="m-0 p-0 fa fa-clock text-danger"> </i>
                ПН - ПТ, 10:00 - 19:00
            </div>
            <div class="col p-0 m-0 justify-content-center align-items-center text-secondary">
                <a href=""></a>
                <i class="m-0 p-0 fa fa-envelope text-danger"> </i>
                benjaminmoore@test.ru
            </div>
        </div>
    </div>
</footer>
