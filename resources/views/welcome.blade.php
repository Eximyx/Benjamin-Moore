@include('layouts.scripts')
<nav class="container">
    <div
        class="row py-1 row justify-content-between align-items-center border-bottom border-2 border-opacity-25 border-black">
        <div class="col-md-2 col-xl-2 row justify-content-between align-items-center d-flex">
            <p class="align-items-center col 5 fw-bold text-secondary text-nowrap fs-5 fw-mediumcol m-0">
                <img src="{{ url('storage/products/benjaminmoore-icon.png') }}"> Benjamin Moore
            </p>
        </div>
        <div class="col-xl-4 row m-0 mx-5 justify-content-between d-flex">
            <p class="text-secondary fs-6 col-2 m-0 py-2">
                Каталог
            </p>
            <p class="text-secondary fs-6 col-2 m-0 py-2">
                Новости
            </p>
            <p class="text-secondary fs-6 col-2 m-0 py-2">
                Калькулятор
            </p>
            <p class="text-center text-nowrap text-secondary fs-6 col-4 m-0 py-2">
                Где купить
            </p>
        </div>
        <div class="col-xl-5 justify-content-between row align-items-center d-flex">
            <div class="col-6 row">
                <div class="col-12 row justify-content-between align-items-center">
                    <p class="text-nowrap text-secondary fs-6 col-10 m-0">
                        <i class="fa fa-phone text-danger" style="transform: scalex(-1)"></i>
                        +375 (29) 608-40-00
                    </p>
                </div>
                <p class="text-secondary text-nowrap fs-6 m-0 ">
                    Работаем ПН — ПТ, 10:00 — 19:00
                </p>
            </div>
            {{-- <div class="col-2"></div> --}}
            <div class="py-1 bg-danger rounded-4 col-5 justify-content-center align-items-center d-flex">
                <p class="text-center text-nowrap text-white fs-6 m-0 py-1">
                    Оставить заявку
                </p>
            </div>
        </div>
    </div>
</nav>


<body>
    <div id="wrapper">

        <!-- Sidebar -->
        {{-- @include('layouts.sidebar') --}}
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                {{-- @include('layouts.navbar') --}}
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    {{-- <div class="d-sm-flex align-items-center justify-content-between mb-2">
<h1 class="h3 m-1 text-gray-800">@yield('title')</h1>
</div> --}}
                    <div class="p-0 m-0 ml-2 justify-content-between align-items-center">

                        <div class="container-fluid">
                            <div id="Product" class="container-fluid py-3">
                                <div
                                    class="py-1 bg-white rounded-4 border border-1 border-dark border-opacity-25 col-xxl-3 col-sm-2 justify-content-between align-items-center">
                                    <img class="rounded-4 col-12 img-thumbnail"
                                        src="https://via.placeholder.com/330x255">
                                    <div class="col-12 row justify-content-between align-items-center d-flex">
                                        <div class="col-12 justify-content-center align-items-center">
                                            <p class="text-center text-black fs-5 fw-mediumm-0 px-3 py-2">
                                                Ben® Premium Interior Latex Semi-Gloss Finish (W627)
                                            </p>
                                        </div>
                                        <p class="text-center text-black fs-6 col-12 m-0 px-3 py-2">
                                            Степень блеска «полуглянцевая»
                                        </p>
                                    </div>
                                    <div class="px-1 py-1 col-12 row justify-content-between align-items-center">
                                        <div class="col-6 row justify-content-center align-items-center d-flex">
                                            <p class="text-dark fs-5 fw-mediumcol-1 m-0 px-3 py-2">
                                                $
                                            </p>
                                            <p class="text-dark fs-6 col-6 m-0 px-3 py-2">
                                                5199.00
                                            </p>
                                        </div>
                                        <div
                                            class="px-1 py-1 bg-danger rounded-4 col-6 justify-content-center align-items-center d-flex">
                                            <p class="text-center text-white fs-6 col-7 m-0 px-3 py-2">
                                                Заказать
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>



                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                @include('layouts.footer')
                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

        </div>


</body>
<footer>
