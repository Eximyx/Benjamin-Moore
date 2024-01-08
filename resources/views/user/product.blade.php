@extends('user.layout')
@section('contents')
    <div class = "mt-5 row">
        <div class="w-300 h-auto col-4 border border-2 rounded-4 border-black-75">
            <img class="p-0 w-100 h-auto" src="{{ url('storage/assets/default_image.webp') }}" >
        </div>
        <div class="m-3 col-1">
            <img class="w-100 h-auto" src="{{ url('storage/assets/default_image.webp') }}" >
            <img class="w-100 h-auto" src="{{ url('storage/assets/default_image.webp') }}" >
            <img class="w-100 h-auto" src="{{ url('storage/assets/default_image.webp') }}" >
            <img class="w-100 h-auto" src="{{ url('storage/assets/default_image.webp') }}" >
        </div>
        <div class = "col-6 row">
            <p class=" text-black fs-3">
                <b>Aura® Waterborne Interior Matte Finish (522)</b>
            </p>
            <p class="text-success fs-6">
                <b>В наличии</b>
            </p>
            <p class="fs-7">
                С другой стороны, дальнейшее развитие различных форм деятельности предопределяет высокую востребованность новых принципов формирования материально-технической 
                и кадровой базы. И нет сомнений, что сторонники тоталитаризма в науке представляют собой не что иное, как квинтэссенцию победы маркетинга над разумом и должны 
                быть ассоциативно распределены по отраслям. Картельные сговоры не допускают ситуации, при которой базовые сценарии поведения пользователей формируют глобальную 
                экономическую сеть и при этом —  ограничены исключительно образом мышления. Предварительные выводы неутешительны: курс на социально-ориентированный национальный 
                проект однозначно определяет каждого участника как способного принимать собственные решения касаемо укрепления моральных ценностей. 
                Есть над чем задуматься: действия представителей оппозиции формируют глобальную экономическую сеть и при этом —  в равной степени предоставлены сами себе. 
            </p>
            <p class="text-secondary fs-6">
                Количество
            </p>
            <p class="text-secondary fs-6">
                Количество
            </p>
            <div class="border rounded-4 boder-2 border-black-50 m-0 p-1" style="max-width: 100px">
                <input type="button" id="product-minus" value="-" class="p-0 m-0 border-0"><input
                    id="quantity" type="text" min="1"
                    class="p-0 m-0 number w-auto border-0 text-center quantity" size="1"
                    value="0"><input type="button" id="product-plus"
                    value="+" class="border-0 p-0 m-0">
            </div>
            <div class = "m-3 col">
                <p class="col-2 fs-5">
                    $1323
                </p>
                <div class="col-2 m-0 p-0 w-100">
                    <button>
                        <p class="fs-6">Заказать званок</p>
                    </button>
                </div>
                
            </div>
        </div>
        <div class="row">

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
                                            <img src="{{ url('storage/image/' . 'краска.webp') }}"
                                                class=" rounded-4 align-self-center m-0 p-0" alt=""
                                                style="size:cover;positon:center">
                                            <div class="text-center fs-5 p-0 m-0">
                                                <p class="m-0 p-0">fdfesfdfe</p>
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
        <div class="row">

        </div>
    </div>
@endsection
@section('scripts')

@endsection
