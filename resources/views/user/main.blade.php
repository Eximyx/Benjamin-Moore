@extends('user.layout', ['title' => 'Главная'])
@section('contents')
    <div id="image-wrapper" class="row rounded-4 border border-1 my-1 position-relative" alt="">
        <div class="col-sm-4 clearfix"></div>
        <div class="container-fluid position-absolute h-100 rounded-4 "
            style="background-image:url({{ url('storage/assets/creative.jpg') }});background-position: center;background-size: cover; background-repeat: no-repeat; filter:brightness(75%)">
            <img src="" class="img-fluid" alt="">
        </div>
        <div class="position-relative py-5 my-3">
            <div class="col-2 clearfix"></div>
            <div class="col-sm-4 py-5 m-2">
                <p class="fs-4 text-danger text-nowrap fw-medium text-opacity-100 ">Benjamin Moore
                    <br>
                    <span class="text-white text-opacity-100">Американские краски
                        <br>
                        <span class="fs-6 text-wrap">
                            Открой для себя мир удивительных красок!
                        </span>
                </p>
            </div>
            <div class="row col-sm-12 justify-content-between align-items-center m-2 p-0">
                <a class="col-5 col-sm-3 col-md-2 btn btn-danger rounded-4 my-1"
                    href="{{ route('user.catalog') }}">Купить</a>
                {{-- <div class="col-5 col-sm-3 col-md-2 btn btn-secondary text-nowrap rounded-4 m-0">
                    Все цвета</div>
                <div class="col-5 col-sm-4 col-md-6 clearfix m-0 p-0"> </div> --}}
            </div>
        </div>
    </div>
    <div class="row justify-content-between m-0 p-0 my-4 py-2">
        <div class="row justify-content-between ">
            <div class="col">
                <h4 class="fw-normal">Предлагаем</h4>
                <h2 class="text-danger text-nowrap fw-medium">НАШУ ПРОДУКЦИЮ</h2>
            </div>
            <div class="col-1 float-end justify-content-end align-items-end my-auto">
                <a class="btn btn-outline-danger mx-auto w-auto text-nowrap" href="{{ route('user.catalog') }}">Все
                    продукты</a>
            </div>
        </div>
        <div class="swiper" style="max-height:fit-content">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <!-- Slides -->
                {{-- $foreac --}}
                @foreach ($Products as $arrProduct)
                    <div class=" swiper-slide">
                        <div id="products" class="products row justify-content-between m-0 p-0 mt-4 px-0 px-md-5">
                            @foreach ($arrProduct as $product)
                                <div id="{{ $product }}"
                                    class="{{ $product->id % 4 == 0 ? 'd-none d-lg-block' : '' }} product row justify-content-center align-items-center col-md-4 col-lg-3 py-2 m-0 p-2">
                                    <div class="row border-2 border rounded-4 align-items-center align-self-center m-0 p-0">
                                        <img src="{{ url('storage/image/' . $product->main_image) }}"
                                            class="img-fluid rounded-4 align-self-center m-0 p-0" alt="">
                                        <div class="text-center fs-5 p-0 m-0">
                                            <p class="m-0 py-0">Ben® Premium Interior Latex Semi-Gloss Finish (W627)</p>
                                        </div>
                                        <div class="text-center fw-light fs-6 p-0 m-0">
                                            <p class="m-0 py-2">Степень блеска «полуглянцевая»</p>
                                        </div>
                                        <div class="row justify-content-between align-items-center m-0 py-1">
                                            <div
                                                class="col-5 col-sm-5 col-md-5 col-lg-3 justify-content-center align-items-end p-0 m-0">
                                                <p class="text-center text-nowrap p-0 m-0 fs-5">$ 5199</p>
                                            </div>
                                            <div class="col-5 col-sm-5 col-md-6 col-lg-6 align-items-center m-0 p-0">
                                                <a class="btn btn-danger text-center p-0 m-0 w-100 h-25 py-1 rounded-4 fs-5"
                                                    href="{{ route('user.catalog') }}">Заказать</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach

                <!-- <div class="swiper-slide">Slide 3</div> -->
            </div>
            <!-- If we need pagination -->
            <!-- <div class="swiper-pagination"></div> -->

            <!-- If we need navigation buttons -->
            <div class="d-none d-md-block swiper-button swiper-button-prev"></div>
            <div class="d-none d-md-block swiper-button swiper-button-next"></div>

            <!-- If we need scrollbar -->
            <!-- <div class="swiper-scrollbar"></div> -->
        </div>

    </div>
    <div id="about us" class="row justify-content-between m-0 p-0 mt-5 py-2">
        <div class="row col-12 col-lg-7 m-0 p-0">
            <div class="col m-0 p-0 row">
                <h4 class="fw-normal">О нашей компании</h4>
                <h2 class="text-danger text-nowrap fw-medium mb-2">НЕМНОГО О НАС</h2>
                <p class="fs-6 fw-light text-wrap py-2">
                    Задача организации, в особенности же граница обучения кадров играет определяющее значение
                    для
                    существующих финансовых и административных условий. Внезапно, предприниматели в сети
                    интернет
                    функционально разнесены на независимые элементы.
                </p>
                <p class="fs-6 fw-light text-wrap py-2">
                    Вот вам яркий пример современных тенденций — социально-экономическое развитие обеспечивает
                    актуальность направлений прогрессивного развития. Внезапно, предприниматели в сети интернет
                    функционально разнесены на независимые элементы.
                </p>
                <div class="col-6 mb-2">
                    <a class="btn btn-outline-danger text-center rounded-4 p-1 fs-4"
                        href={{ route('user.news') }}>Подробнее</a>
                </div>
            </div>
        </div>
        <div class=" row col-12 col-lg-5 rounded-4">
            <div class="d-none d-lg-block col rounded-4">
                <img src="{{ url('storage/assets/erikus.jpg') }}" class="img-fluid" alt="">
            </div>
            <div class="d-none d-lg-block col rounded-4">
                <img src="{{ url('storage/assets/eximyx.jpg') }}" class="img-fluid" alt="">
            </div>
        </div>
        <div class="row m-0 m-0 justify-content-between mt-5">
            <div class="col-sm-12 col-md-4 m-0 p-1">
                <div class="col border-top border-2 border-opacity-25 border-danger-subtle m-0 p-0">
                    <h4 class="fs-4 mt-3">Качество</h4>
                    <p class="text-wrap">Предварительные выводы неутешительны: существующая теория требует
                        анализа новых предложений.</p>
                </div>
            </div>
            <div class="col-sm-12 col-md-4 m-0 p-1">
                <div class="col border-top border-2 border-opacity-25 border-danger-subtle m-0 p-0">
                    <h4 class="fs-4 mt-3 text-wrap">Профессиональный подход</h4>
                    <p class="text-wrap">Предварительные выводы неутешительны: существующая теория требует
                        анализа
                        новых предложений.</p>
                </div>
            </div>
            <div class="col-sm-12 col-md-4 m-0 p-1">
                <div class="col border-top border-2 border-opacity-25 border-danger-subtle m-0 p-0">
                    <h4 class="fs-4 mt-3 text-wrap">Профессиональный подход</h4>
                    <p class="text-wrap">Предварительные выводы неутешительны: существующая теория требует
                        анализа
                        новых предложений.</p>
                </div>
            </div>
        </div>
    </div>
    <div id="news" class="row justify-content-between m-0 p-0 border-bottom border-2 border-opacity-25 mt-5">
        <div class="row justify-content-between ">
            <div class="col">
                <h4 class="fw-normal">Новости</h4>
                <h2 class="text-danger text-nowrap fw-medium">ПОСЛЕДНИЕ НОВОСТИ</h2>
            </div>
            <div class="col-1 float-end justify-content-end align-items-end my-auto">
                <a class="btn btn-outline-danger mx-auto w-auto text-nowrap" href="{{ route('user.news') }}">Все
                    новости</a>
            </div>
        </div>

        @foreach ($NewsPost as $item)
            <div id="news-{{ $item->id }}" class="col-sm-12 col-md-4 justify-content-between align-items-end">
                <img class="img-fluid w-100" srcset="{{ url('storage/image') }}/{{ $item->main_image }}">
                <div class="row justify-content-between">
                    <p class="text-truncate col-6 opacity-75 m-0 my-2 ">
                        <i class="fa fa-clock opacity-75 "></i>
                        {{ $item->created_at }}
                    </p>
                    <p class="text-truncate col-6 opacity-75 m-0 my-2 text-center">
                        <a class="link-secondary" href="{{ route('user.news.show', $item->slug) }}">Подробнее</a>
                    </p>
                </div>
                <h4 class="col text-wrap truncate">{{ $item->title }}</h4>
                <p class="text-wrap truncate">{{ $item->content }}</p>
            </div>
        @endforeach
    </div>
    <div id="location" class="row m-0 p-0 mt-5">
        <div class="col-sm-12 m-0 p-0 row">
            <h4 class="fw-normal">Наш адрес</h4>
            <h2 class="text-danger text-nowrap fw-medium mb-2">ГДЕ МЫ НАХОДИМСЯ</h2>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-8">
            <iframe class="rounded-4 mb-3"
                src="https://yandex.ru/map-widget/v1/?um=constructor%3Ab4b0cc562e37a8f254c72d9ee28e7f7d677f827665373280c0df05bc6f3a013a&amp;source=constructor"
                width="100%" height="600" frameborder="0"></iframe>
        </div>
        <div class="row col m-0 p-0">
            <form action="javascript:void(0)" id="Form" name="Form" method="POST" class="form-horizontal"
                enctype="multipart/form-data">
                <h3 class="fw-normal fs-4">Оставьте заявку</h3>
                <h2 class="text-wrap fw-normal fs-5 mb-2">Мы свяжемся с вами в течении нескольких минут</h2>
                <input type="hidden" name="id" id="id">

                <div class="col-12 justify-content-between align-items-center">
                    <label class="form-label p-0">Имя</label>
                    <input type="text" class="form-control rounded-5 border-danger border-2" id="name"
                        name="name" placeholder="Имя">
                </div>
                <div class="col-12 justify-content-between align-items-center">
                    <label class="form-label p-0">Email</label>
                    <input type="email" class="form-control rounded-5 border-danger border-2" id="contactInfo"
                        name="contactInfo" placeholder="Email">
                </div>
                <div class="col-12 justify-content-between align-items-center">
                    <label for="exampleFormControlTextarea1" class="form-label p-0">Сообщение</label>
                    <textarea class="form-control rounded-4 border-danger border-2" id="message" name="message" rows="6"
                        placeholder="Текст сообщения"></textarea>
                </div>
                <div class="col-12 mt-3">
                    <button type="submit" class="w-auto px-5 btn btn-danger text-center rounded-4 fs-4">Заказать</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });
        $('#Form').submit(function(e) {

            e.preventDefault();

            var formData = new FormData(this);
            console.log(formData);
            $.ajax({
                method: "post",
                url: '{{ route('leads') }}',
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: (data) => {
                    console.log(data);
                    var oTable = $('#table').dataTable();
                    oTable.fnDraw(false);
                    $("#btn-save").html('Submit');
                    $("#btn-save").attr("disabled", false);
                },
                error: function(data) {
                    // #('')
                    console.log(data);
                }
            });
        });
        const swiper = new Swiper('.swiper', {
            // Optional parameters
            direction: 'horizontal',
            loop: true,

            // If we need pagination
            // pagination: {
            //     el: '.swiper-pagination',
            // },

            // Navigation arrows
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },

            // // And if we need scrollbar
            // scrollbar: {
            //     el: '.swiper-scrollbar',
            // },
        });
    </script>
@endsection
