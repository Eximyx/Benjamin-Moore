@extends('frontend.layout')
@section('content')
    <section class="main__banner">
        <div class="main__banner-block">
            <h2 class="main__banner-text"><b>Benjamin Moore</b><br>Американские краски</h2>
            <p id="main__banner-p-desktop">Открой для себя мир удивительных красок</p>
            <p id="main_banner-p-mobile">Есть над чем задуматься: явные признаки победы ограничены исключительно образом
                мышления.</p>
            <div class="main__banner-buttons">
                <a href="{{route('user.catalog')}}">
                    <button class="button-filled">@lang('main.buttons.buy')</button>
                </a>
                <a href="">
                    <button class="button-outlined">@lang('main.buttons.allColors')</button>
                </a>
            </div>
        </div>
    </section>
    <section class="product">
        <div class="header-block">
            <div class="section-header">
                <h3>@lang('main.titles.products')</h3>
                <h2>@lang('main.titles.lastProducts')</h2>
            </div>
            <a href="{{route('user.catalog')}}">
                <button class="button-outlined">@lang("main.buttons.allProducts")</button>
            </a>
        </div>
        <div class="wrapper">
            <i class="left"><img src="{{Vite::asset('resources/icons/arrow-right.svg')}}" alt="arrow left"></i>
            <ul class="carousel">
                <li class="card product-card">
                    <img src="{{Vite::asset("resources/images/paint-can.png")}}" alt="paint can">
                    <h4 class="product-card__header">Ben® Premium Interior Latex Semi-Gloss Finish (W627)</h4>
                    <p class="product-card__details">Степень блеска «полуглянцевая»</p>
                    <div class="product-card__price-block">
                        <p class="product-card__price-block__price">$ 5199.00</p>
                        <a href="{{route('user.catalog')}}">
                            <button class="button-filled">@lang('main.buttons.order')</button>
                        </a>
                    </div>
                </li>
            </ul>
            <i class="right"><img src="{{Vite::asset('resources/icons/arrow-right.svg')}}" alt="arrow right"></i>
        </div>
    </section>
    <section class="about-us">
        <div style="display: flex; justify-content: space-between">
            <div class="about-us__block">
                <div class="section-header">
                    <h3>@lang('main.titles.aboutUs')</h3>
                    <h2>@lang('main.titles.aboutCompany')</h2>
                </div>
                <div class="flex-block">
                    <div class="about-us__image-placeholder-mobile"></div>
                    <div class="about-us__image-placeholder-mobile"></div>
                </div>
                <div class="about-us__inner-div">
                    <p>
                        Задача организации, в особенности же граница обучения кадров играет определяющее значение для
                        существующих финансовых и административных условий. Внезапно, предприниматели в сети интернет
                        функционально разнесены на независимые элементы.
                    </p>
                    <p>
                        Вот вам яркий пример современных тенденций — социально-экономическое развитие обеспечивает
                        актуальность
                        направлений прогрессивного развития. Внезапно, предприниматели в сети интернет функционально
                        разнесены
                        на независимые элементы.
                    </p>
                </div>
                <a href="">
                    <button class="button-outlined">@lang('main.buttons.more')</button>
                </a>
            </div>
            <div class="flex-block">
                <div class="about-us__image-placeholder"></div>
                <div class="about-us__image-placeholder"></div>
            </div>
        </div>
        <div class="about-us__quality-cards-wrapper">
            <div class="quality-card">
                <h4 class="quality-card__card-header">SECTION_NAME</h4>
                <p class="quality-card__card-details">
                    SECTION_NAME
                    SECTION_NAME SECTION_NAME SECTION_NAME SECTION_NAME
                </p>
            </div>
            <div class="quality-card">
                <h4 class="quality-card__card-header">Профессиональный подход</h4>
                <p class="quality-card__card-details">
                    Не следует, однако, забывать, что сплочённость команды профессионалов играет важную роль в
                    формировании глубокомысленных рассуждений.
                </p>
            </div>
            <div class="quality-card">
                <h4 class="quality-card__card-header">Профессиональный подход</h4>
                <p class="quality-card__card-details">
                    Не следует, однако, забывать, что сплочённость команды профессионалов играет важную роль в
                    формировании глубокомысленных рассуждений.
                </p>
            </div>
        </div>
    </section>
    <section>
        <div class="header-block">
            <div class="section-header">
                <h3>@lang('main.titles.news')</h3>
                <h2>@lang('main.titles.lastNews')</h2>
            </div>
            <button class="button-outlined"><a href="{{route('user.news')}}">@lang('main.buttons.allNews')</a></button>
        </div>
        <div class="news-wrapper">
            <div class="news-card">
                <img src="{{Vite::asset('resources/images/news-mock-image.png')}}" alt="news preview">
                <div class="news-card__details">
                    <p class="news-card__details-author">ADMIN_NAME •</p>
                    <img class="news-card__details-clock-image" src="{{Vite::asset('resources/icons/clock.svg')}}"
                         alt="clock image">
                    <p class="news-card__details-date">DATA</p>
                </div>
                <h4 class="news-card__header">
                    Какие IT - професси будут востребованы в 2022 году
                </h4>
                <p class="news-card__description">
                    Предварительные выводы неутешительны: существующая теория требует анализа новых предложений.
                </p>
                <a href="{{route('user.news')}}">
                    <button class="button-outlined">@lang('main.buttons.more')</button>
                </a>
            </div>
            <div class="news-card">
                <img src="{{Vite::asset('resources/images/news-mock-image.png')}}" alt="news preview">
                <div class="news-card__details">
                    <p class="news-card__details-author">ADMIN_NAME •</p>
                    <img class="news-card__details-clock-image" src="{{Vite::asset('resources/icons/clock.svg')}}"
                         alt="clock image">
                    <p class="news-card__details-date">DATA</p>
                </div>
                <h4 class="news-card__header">
                    Какие IT - професси будут востребованы в 2022 году
                </h4>
                <p class="news-card__description">
                    Предварительные выводы неутешительны: существующая теория требует анализа новых предложений.
                </p>
                <a href="{{route('user.news')}}">
                    <button class="button-outlined">@lang('main.buttons.more')</button>
                </a>
            </div>
            <div class="news-card">
                <img src="{{Vite::asset('resources/images/news-mock-image.png')}}" alt="news preview">
                <div class="news-card__details">
                    <p class="news-card__details-author">ADMIN_NAME •</p>
                    <img class="news-card__details-clock-image" src="{{Vite::asset('resources/icons/clock.svg')}}"
                         alt="clock image">
                    <p class="news-card__details-date">DATA</p>
                </div>
                <h4 class="news-card__header">
                    Какие IT - професси будут востребованы в 2022 году
                </h4>
                <p class="news-card__description">
                    Предварительные выводы неутешительны: существующая теория требует анализа новых предложений.
                </p>
                <a href="{{route('user.news')}}">
                    <button class="button-outlined">@lang('main.buttons.more')</button>
                </a>
            </div>
        </div>
        <button class="button-filled mobile-news-button"><a href="{{route('user.news')}}">Все новости</a></button>
    </section>
    <section class="reviews">
        <div class="section-header">
            <h3>@lang('main.titles.reviews')</h3>
            <h2>@lang('main.titles.subReviews')</h2>
        </div>
        <div class="reviewsWrapper">
            <i class="left"><img src="{{Vite::asset('resources/icons/arrow-right.svg')}}" alt="arrow left"></i>
            <ul class="carousel reviewsCarousel">
                <li class="card">
                    <div class="review-card">
                        <div class="review-card__header">
                            <img src="{{Vite::asset('resources/images/user-avatar.png')}}" alt="user avatar">
                            <h4>REVIEW_NAME</h4>
                        </div>
                        <p class="review-card__text">
                            Лишь многие известные личности освещают чрезвычайно интересные особенности картины в целом,
                            однако
                            конкретные выводы, разумеется, объективно рассмотрены соответствующими инстанциями.
                        </p>
                    </div>
                </li>
            </ul>
            <i class="right"><img src="{{Vite::asset('resources/icons/arrow-right.svg')}}" alt="arrow right"></i>
        </div>
    </section>
    <section class="banner">
        <a href="{{route('user.catalog')}}">
            <button class="button-outlined">@lang('main.titles.catalog')</button>
        </a>
    </section>
    @include('frontend.lead_form')
@endsection
@section('scripts')
    @vite('resources/js/main.js')
@endsection
