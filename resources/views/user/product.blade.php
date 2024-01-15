@extends('user.layout')
@section('contents')
    <div class = "mt-5 row">
        <div class="w-300 h-75 col-4 border border-2 rounded-4 border-black-75">
            <img class="p-0 w-100 h-auto" src="{{ url('storage/assets/default_image.webp') }}">
        </div>
        <div class="m-3 col-1">
            <img class="my-2 w-100 h-auto" src="{{ url('storage/assets/default_image.webp') }}">
            <img class="my-2 w-100 h-auto" src="{{ url('storage/assets/default_image.webp') }}">
            <img class="my-2 w-100 h-auto" src="{{ url('storage/assets/default_image.webp') }}">
            <img class="my-2 w-100 h-auto" src="{{ url('storage/assets/default_image.webp') }}">
        </div>
        <div class = "col-6 row">
            <p class=" text-black fs-2">
                <b>{{$item->title}}</b>
            </p>
            <p class="text-success fs-6">
                <b>В наличии</b>
            </p>
            <p class="fs-7">
                {{$item->content}}
            </p>
            <p class="text-secondary fs-6">
                Количество
            </p>
            <div class="row m-0 p-0">
                <div class="col-4 border rounded-4 boder-2 border-black-50 text-center m-0 p-0">
                    <input type="button" id="product-minus" value="-" class="p-0 m-0 border-0 col-3 rounded-3"><input
                        id="quantity" type="text" min="1"
                        class="col-6 p-0 m-0 number w-auto border-0 text-center quantity" size="1"
                        value="0"><input type="button" id="product-plus" value="+"
                        class="col-3 border-0 p-1 m-0 rounded-3">
                </div>
            </div>
            <div class="row m-0 p-0 mt-3">
                <div class="col-2">
                    <p class="fs-5">
                        $1323
                    </p>
                </div>
                <div class="col-2 m-0 p-0 w-75   align-middle">
                    <button class="px-4 py-2 btn btn-danger rounded-4">
                        <p class="m-0 fs-6">Заказать звонок</p>
                    </button>
                </div>
            </div>
        </div>
        <div class="row ms-5 mt-4 border-bottom border-3">
            <div class="col-2 pr-4">
                <p class="fs-4 py-0">
                    <b>
                        Характеристики
                    </b>
                </p>
            </div>
            <div class="col-2 ps-4">
                <p class="fs-4 py-0">
                    <b>
                        Параметры
                    </b>
                </p>
            </div>

        </div>
        <div class="row ms-5 mt-4">
            <p class="fs-6">
                Не следует, однако, забывать, что внедрение современных методик требует определения и уточнения новых
                предложений.
                Противоположная точка зрения подразумевает, что предприниматели в сети интернет функционально разнесены на
                независимые элементы.
                Безусловно, социально-экономическое развитие предопределяет высокую востребованность приоретизации разума
                над эмоциями.
                Задача организации, в особенности же курс на социально-ориентированный национальный проект требует анализа
                новых предложений.
                Предварительные выводы неутешительны: высокое качество позиционных исследований предопределяет высокую
                востребованность дальнейших направлений развития.

                В целом, конечно, высококачественный прототип будущего проекта требует анализа стандартных подходов.
                Для современного мира постоянный количественный рост и сфера нашей активности позволяет выполнить важные
                задания по разработке укрепления моральных ценностей.
                Принимая во внимание показатели успешности, постоянный количественный рост и сфера нашей активности
                однозначно определяет каждого участника как способного принимать собственные решения касаемо соответствующих
                условий активизации.
                Равным образом, реализация намеченных плановых заданий прекрасно подходит для реализации форм воздействия.
                Вот вам яркий пример современных тенденций — постоянный количественный рост и сфера нашей активности
                обеспечивает широкому кругу (специалистов) участие в формировании позиций, занимаемых участниками в
                отношении поставленных задач.

                Таким образом, социально-экономическое развитие однозначно определяет каждого участника как способного
                принимать собственные решения касаемо дальнейших направлений развития.
                Повседневная практика показывает, что реализация намеченных плановых заданий не даёт нам иного выбора, кроме
                определения укрепления моральных ценностей.
            </p>
        </div>
        <div class="row ms-5 mt-4">
            <p class="fs-3">
                <b>
                    Похожие товары
                </b>
            </p>
        </div>
        <div class="row">
            <div class="swiper" style="max-height:fit-content">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides -->
                    {{-- $foreac --}}
                    @foreach ($Products as $arrProduct)
                        <div class=" swiper-slide">
                            <div id="products" class="products row justify-content-start m-0 p-0 mt-4 px-0 px-md-5">
                                @foreach ($arrProduct as $product)
                                    <div id="{{ $product->id }}"
                                        class="{{ $product->id % 4 == 0 ? 'd-none d-lg-block' : '' }} h-auto product row justify-content-center align-items-center col-md-4 col-lg-3 py-2 m-0 p-2">
                                        <div class="row border-2 border rounded-4 align-items-center m-0 p-0 h-100">
                                            <img src="{{ url('storage/assets/' . 'default_image.webp') }}"
                                                class=" rounded-4 align-self-center m-0 p-0" alt=""
                                                style="size:cover;positon:center">
                                            <div class="text-center fs-5 p-0 m-0">
                                                <p class="m-0 p-0">{{ $product->title }}</p>
                                            </div>
                                            <div class="text-center fw-light fs-6 p-0 m-0">
                                                <p class="m-0 p-0">{{ $product->gloss_level }}</p>
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
        <div class="row ms-5 mt-4">
            <p class="fs-3">
                <b>
                    Рекомендуемые товары
                </b>
            </p>
        </div>
        <div class="row">
            <div class="swiper" style="max-height:fit-content">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides -->
                    {{-- $foreac --}}
                    @foreach ($Products as $arrProduct)
                        <div class=" swiper-slide">
                            <div id="products" class="products row justify-content-start m-0 p-0 mt-4 px-0 px-md-5">
                                @foreach ($arrProduct as $product)
                                    <div id="{{ $product->id }}"
                                        class="{{ $product->id % 4 == 0 ? 'd-none d-lg-block' : '' }} h-auto product row justify-content-center align-items-center col-md-4 col-lg-3 py-2 m-0 p-2">
                                        <div class="row border-2 border rounded-4 align-items-center m-0 p-0 h-100">
                                            <img src="{{ url('storage/assets/' . 'default_image.webp') }}"
                                                class=" rounded-4 align-self-center m-0 p-0" alt=""
                                                style="size:cover;positon:center">
                                            <div class="text-center fs-5 p-0 m-0">
                                                <p class="m-0 p-0">{{ $product->title }}</p>
                                            </div>
                                            <div class="text-center fw-light fs-6 p-0 m-0">
                                                <p class="m-0 p-0">{{ $product->gloss_level }}</p>
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
        $('#product-plus').click(function(e) {
            e.preventDefault();
            var ele = $(this);
            var quantity = ele.parents().children('input#quantity');
            var value = parseInt(quantity.val()) + 1;
            quantity.val(value)
        })
        $('#product-minus').click(function(e) {
            e.preventDefault();
            var ele = $(this);
            var quantity = ele.parents().children('input#quantity');
            var value = parseInt(quantity.val()) - 1;
            quantity.val(value)
        })
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
