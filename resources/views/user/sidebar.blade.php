<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header border border-bottom-2">
        <div class="col-md-3 col-lg-2 col-xl-2 col-xxl-2 row justify-content-center align-items-end">
            <a class="nav-link align-items-center fw-bold text-secondary text-nowrap col-12 fs-6"
               href="{{ route('user.main.index') }}">
                <img srcset="{{ url('storage/assets/benjaminmoore-icon.png') }}">
                Benjamin Moore
            </a>
        </div>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <a class="nav-link my-2" href="{{ route('user.catalog') }}">
            Каталог
        </a>
        <a class="nav-link" href="{{ route('user.news') }}">
            Новости
        </a>
        <a class="nav-link" href="{{ route('user.calc') }}">
            Калькулятор
        </a>
        <a class="nav-link row p-0 m-0 mt-3" data-toggle="collapse" href="#collapseExample" role="button"
           aria-expanded="false"
           aria-controls="collapseExample">
            <div class="col-12 justify-content-between row m-0 p-0">
                <p class="col p-0 m-0">
                    Информация
                </p>
                <div class="col-1 align-items-center w-auto">
                    <i class="fa fa-angle-down"></i>
                </div>
            </div>
        </a>
        <div class="collapse" id="collapseExample">
            <div class="row p-0 m-0">
                <div class="row justify-content-start">
                </div>
                <div class="row justify-content-start">
                    <a class="nav-link p-0 m-0">Где купить</a>
                </div>
            </div>
        </div>
    </div>
</div>
<style>

</style>
