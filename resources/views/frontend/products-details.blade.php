@extends('frontend.layout')

@section('breadcrumbs', $resource['entity']->title ?? 'ENTITY_TITLE')

@section('content')
    @include('frontend.breadcrumbs')
    <section class="product-details-section">
        <div class="product-images-block">
            <img src="" alt="main-image" class="main-product-image">
            {{--            TODO: 5 images--}}
            <div class="product-images">
                <img src="../assets/images/product-image.png" alt="">
                <img src="../assets/images/product-image.png" alt="">
                <img src="../assets/images/product-image.png" alt="">
                <img src="../assets/images/product-image.png" alt="">
            </div>
        </div>
        <div class="product-details">
            <h2 class="section-header">{{$resource['entity']->title}}</h2>
            <p class="product-status">@lang('catalog.product-details.isAvailable.' . $resource['entity']->is_toggled ?? 0)</p>
            <p class="product-description">
                {{--                TODO: Добавить subContent в продукты--}}
                {{$resource['entity']->subContent ?? "PRODUCT_SUBCONTENT"}}
            </p>
            <p class="product-description">@lang('catalog.product-details.amount')</p>
            <div class="product-counter">
                <button class="counter-button" onclick="counterDecrement()">–</button>
                <p id="counter">1</p>
                <button class="counter-button" onclick="counterIncrement()">+</button>
            </div>
            <div class="product-price-block">
                <div class="product-price-block__inner-text"><p class="product-price">$</p>
                    <p id="product-price">{{$resource['entity']->price}}</p></div>
                <button class="button-filled">@lang('catalog.product-details.call')</button>
            </div>
        </div>
    </section>
    <section class="tab-container">
        <div class="tab">
            <input checked id="tab-btn-1" name="tab-btn" type="radio" value="">
            <label for="tab-btn-1">@lang('catalog.product-details.specs')</label>
            <input id="tab-btn-2" name="tab-btn" type="radio" value="">
            <label for="tab-btn-2">@lang('catalog.product-details.options')</label>
            <div class="tab-content" id="content-1">
                {{$resource['entity']->content}}
            </div>
            <div class="tab-content" id="content-2">
                <div class="tab-content-block">
                    <div class="tab-content-block__inner-text">
                        <h4>@lang('admin.keys.code')</h4>
                        <p>{{$resource['entity']->code}}</p>
                        <h4>@lang('admin.keys.description')</h4>
                        <p>{{$resource['entity']->description}}</p>
                        <h4>@lang('admin.keys.type')</h4>
                        <p>{{$resource['entity']->type}}</p>
                        <h4>@lang('admin.keys.colors')</h4>
                        <p>{{$resource['entity']->colors ?? "PRODUCT_COLORS"}}</p>
                        <h4>@lang('admin.keys.base')</h4>
                        <p>1-4</p>
                    </div>
                    <div class="tab-content-block__inner-text">
                        <h4>@lang('admin.keys.v_of_dry_remain')</h4>
                        <p>{{$resource['entity']->v_of_dry_remain}}</p>
                        <h4>@lang('admin.keys.time_to_repeat')</h4>
                        <p>{{$resource['entity']->time_to_repeat}}</p>
                        <h4>@lang('admin.keys.consumption')</h4>
                        <p>{{$resource['entity']->consumption}}</p>
                        <h4>@lang('admin.keys.thickness')</h4>
                        <p>{{$resource['entity']->thickness}}</p>
                    </div>
                </div>
                <button class="button-filled" id="pdf_button">@lang('catalog.product-details.download')</button>
            </div>
        </div>
    </section>
    <section class="carousel-section">
        {{-- TODO FRONT: Почему тут два враппера одинаковых, но у второго есть какой-то класс. Если они ничем не отличаются, то можно сделать шаблон, при этом второй не отрабатывает--}}
        <div>
            <h2 class="section-header">@lang('catalog.product-details.similar')</h2>
            <div class="wrapper">
                <i class="left"><img src="../assets/icons/arrow-right.svg" alt="arrow left"></i>
                <ul class="carousel">
                    <li class="card">
                        <div class="product-card">
                            <img src="../assets/images/paint-can.png" alt="paint can">
                            <h4 class="product-card__header">Ben® Premium Interior Latex Semi-Gloss Finish (W627)</h4>
                            <p class="product-card__details">Степень блеска «полуглянцевая»</p>
                            <div class="product-card__price-block">
                                <p class="product-card__price-block__price">$ 5199.00</p>
                                <a href="product-details.html">
                                    <button class="button-filled">Заказать</button>
                                </a>
                            </div>
                        </div>
                    </li>
                    <li class="card">
                        <div class="product-card">
                            <img src="../assets/images/paint-can.png" alt="paint can">
                            <h4 class="product-card__header">Ben® Premium Interior Latex Semi-Gloss Finish (W627)</h4>
                            <p class="product-card__details">Степень блеска «полуглянцевая»</p>
                            <div class="product-card__price-block">
                                <p class="product-card__price-block__price">$ 5199.00</p>
                                <a href="product-details.html">
                                    <button class="button-filled">Заказать</button>
                                </a>
                            </div>
                        </div>
                    </li>
                    <li class="card">
                        <div class="product-card">
                            <img src="../assets/images/paint-can.png" alt="paint can">
                            <h4 class="product-card__header">Ben® Premium Interior Latex Semi-Gloss Finish (W627)</h4>
                            <p class="product-card__details">Степень блеска «полуглянцевая»</p>
                            <div class="product-card__price-block">
                                <p class="product-card__price-block__price">$ 5199.00</p>
                                <a href="product-details.html">
                                    <button class="button-filled">Заказать</button>
                                </a>
                            </div>
                        </div>
                    </li>
                    <li class="card">
                        <div class="product-card">
                            <img src="../assets/images/paint-can.png" alt="paint can">
                            <h4 class="product-card__header">Ben® Premium Interior Latex Semi-Gloss Finish (W627)</h4>
                            <p class="product-card__details">Степень блеска «полуглянцевая»</p>
                            <div class="product-card__price-block">
                                <p class="product-card__price-block__price">$ 5199.00</p>
                                <a href="product-details.html">
                                    <button class="button-filled">Заказать</button>
                                </a>
                            </div>
                        </div>
                    </li>
                    <li class="card">
                        <div class="product-card">
                            <img src="../assets/images/paint-can.png" alt="paint can">
                            <h4 class="product-card__header">Ben® Premium Interior Latex Semi-Gloss Finish (W627)</h4>
                            <p class="product-card__details">Степень блеска «полуглянцевая»</p>
                            <div class="product-card__price-block">
                                <p class="product-card__price-block__price">$ 5199.00</p>
                                <a href="product-details.html">
                                    <button class="button-filled">Заказать</button>
                                </a>
                            </div>
                        </div>
                    </li>
                    <li class="card">
                        <div class="product-card">
                            <img src="../assets/images/paint-can.png" alt="paint can">
                            <h4 class="product-card__header">Ben® Premium Interior Latex Semi-Gloss Finish (W627)</h4>
                            <p class="product-card__details">Степень блеска «полуглянцевая»</p>
                            <div class="product-card__price-block">
                                <p class="product-card__price-block__price">$ 5199.00</p>
                                <a href="product-details.html">
                                    <button class="button-filled">Заказать</button>
                                </a>
                            </div>
                        </div>
                    </li>
                </ul>
                <i class="right"><img src="../assets/icons/arrow-right.svg" alt="arrow right"></i>
            </div>
        </div>
        <div>
            <h2 class="section-header">@lang('catalog.product-details.recommend')</h2>
            <div class="recommendedWrapper wrapper">
                <i class="left"><img src="../assets/icons/arrow-right.svg" alt="arrow left"></i>
                <ul class="carousel">
                    <li class="card">
                        <div class="product-card">
                            <img src="../assets/images/paint-can.png" alt="paint can">
                            <h4 class="product-card__header">Ben® Premium Interior Latex Semi-Gloss Finish (W627)</h4>
                            <p class="product-card__details">Степень блеска «полуглянцевая»</p>
                            <div class="product-card__price-block">
                                <p class="product-card__price-block__price">$ 5199.00</p>
                                <a href="product-details.html">
                                    <button class="button-filled">Заказать</button>
                                </a>
                            </div>
                        </div>
                    </li>
                    <li class="card">
                        <div class="product-card">
                            <img src="../assets/images/paint-can.png" alt="paint can">
                            <h4 class="product-card__header">Ben® Premium Interior Latex Semi-Gloss Finish (W627)</h4>
                            <p class="product-card__details">Степень блеска «полуглянцевая»</p>
                            <div class="product-card__price-block">
                                <p class="product-card__price-block__price">$ 5199.00</p>
                                <a href="product-details.html">
                                    <button class="button-filled">Заказать</button>
                                </a>
                            </div>
                        </div>
                    </li>
                    <li class="card">
                        <div class="product-card">
                            <img src="../assets/images/paint-can.png" alt="paint can">
                            <h4 class="product-card__header">Ben® Premium Interior Latex Semi-Gloss Finish (W627)</h4>
                            <p class="product-card__details">Степень блеска «полуглянцевая»</p>
                            <div class="product-card__price-block">
                                <p class="product-card__price-block__price">$ 5199.00</p>
                                <a href="product-details.html">
                                    <button class="button-filled">Заказать</button>
                                </a>
                            </div>
                        </div>
                    </li>
                    <li class="card">
                        <div class="product-card">
                            <img src="../assets/images/paint-can.png" alt="paint can">
                            <h4 class="product-card__header">Ben® Premium Interior Latex Semi-Gloss Finish (W627)</h4>
                            <p class="product-card__details">Степень блеска «полуглянцевая»</p>
                            <div class="product-card__price-block">
                                <p class="product-card__price-block__price">$ 5199.00</p>
                                <a href="product-details.html">
                                    <button class="button-filled">Заказать</button>
                                </a>
                            </div>
                        </div>
                    </li>
                    <li class="card">
                        <div class="product-card">
                            <img src="../assets/images/paint-can.png" alt="paint can">
                            <h4 class="product-card__header">Ben® Premium Interior Latex Semi-Gloss Finish (W627)</h4>
                            <p class="product-card__details">Степень блеска «полуглянцевая»</p>
                            <div class="product-card__price-block">
                                <p class="product-card__price-block__price">$ 5199.00</p>
                                <a href="product-details.html">
                                    <button class="button-filled">Заказать</button>
                                </a>
                            </div>
                        </div>
                    </li>
                    <li class="card">
                        <div class="product-card">
                            <img src="../assets/images/paint-can.png" alt="paint can">
                            <h4 class="product-card__header">Ben® Premium Interior Latex Semi-Gloss Finish (W627)</h4>
                            <p class="product-card__details">Степень блеска «полуглянцевая»</p>
                            <div class="product-card__price-block">
                                <p class="product-card__price-block__price">$ 5199.00</p>
                                <a href="product-details.html">
                                    <button class="button-filled">Заказать</button>
                                </a>
                            </div>
                        </div>
                    </li>
                </ul>
                <i class="right"><img src="../assets/icons/arrow-right.svg" alt="arrow right"></i>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        let counter = 1;
        let price = parseInt(document.getElementById("product-price").innerHTML);
        let counterElement = document.getElementById("counter");
        let productPriceElement = document.getElementById("product-price");

        function counterIncrement() {
            counter++;
            counterElement.innerHTML = counter;
            productPriceElement.innerHTML = (counter * price).toFixed(2);
        }

        function counterDecrement() {
            if (counter > 1) {
                counter--;
                counterElement.innerHTML = counter;
                productPriceElement.innerHTML = (counter * price).toFixed(2);
            }
        }
    </script>
    @vite(['resources/js/slider.js'])
@endsection
