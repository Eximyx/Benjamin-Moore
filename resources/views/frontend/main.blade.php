@extends('frontend.layout')
@php
    $settings = \App\Models\Settings::first();
@endphp
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
            {{--TODO FRONT: 2. Необходимо заполнять баннер этой картинкой --}}
            <img src="{{$resource['banners'][0]->image ?? url('storage/image/default_post.jpg')}}"
                 alt="{{$resource['banners'][0]->title ?? "Картинка"}}">
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
                {{--                TODO BOTH: Обсудить, как это слайдер рабатает, что ему отдавать--}}
                @foreach($resource['products'] as $key => $value)
                    <li class="card product-card">
                        <img src="{{Vite::asset("resources/images/paint-can.png")}}" alt="paint can">
                        <h4 class="product-card__header">{{$value[0]->title}}</h4>
                        <p class="product-card__details">{{$value[0]->gloss_level}}</p>
                        <div class="product-card__price-block">
                            <p class="product-card__price-block__price">$ {{$value[0]->price}}</p>
                            <a href="{{route('user.catalog-show', $value[0]->slug)}}">
                                <button class="button-filled">@lang('main.buttons.order')</button>
                            </a>
                        </div>
                    </li>
                @endforeach
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
                    <div class="about-us__image-placeholder-mobile">
                        <img src="" alt="">
                    </div>
                    <div class="about-us__image-placeholder-mobile"></div>
                </div>
                <div class="about-us__inner-div">
                    {!! str_replace('
','<br/>',$settings->description) !!}
                </div>
                <a href="">
                    <button class="button-outlined">@lang('main.buttons.more')</button>
                </a>
            </div>
            <div class="flex-block">
                {{--TODO FRONT: 4. Картинки расположить, юрл есть --}}
                <div class="about-us__image-placeholder"><img
                        src="{{url('storage/image/sections/section_image_1.jpg')}}"
                        alt=""></div>
                <div class="about-us__image-placeholder"><img
                        src="{{url('storage/image/sections/section_image_2.jpg')}}"
                        alt=""></div>
            </div>
        </div>
        <div class="about-us__quality-cards-wrapper">
            {{-- TODO FRONT: 3. Почему-то дублируются сущности в slider`е--}}
            @foreach($resource['sections'] as $key => $value)
                <div class="quality-card">
                    <h4 class="quality-card__card-header">{{$value->name}}</h4>
                    <p class="quality-card__card-details">
                        {{$value->content}}
                    </p>
                </div>
            @endforeach
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
            {{-- TODO: ADD an USER_NAME for post --}}
            @foreach($resource['news'] as $key => $value)
                <div class="news-card">
                    <img
                        src="{{url('storage/image').'/'.$value->main_image ?? Vite::asset('resources/image/news-mock-image.png')}}"
                        alt="news preview">
                    <div class="news-card__details">
                        <p class="news-card__details-author">USER_NAME •</p>
                        <img class="news-card__details-clock-image" src="{{Vite::asset('resources/icons/clock.svg')}}"
                             alt="clock image">
                        <p class="news-card__details-date">{{$value->created_at}}</p>
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
            @endforeach
        </div>
        <button class="button-filled mobile-news-button"><a
                href="{{route('user.news')}}">@lang('main.buttons.allNews')</a></button>
    </section>
    <section class="reviews">
        <div class="section-header">
            <h3>@lang('main.titles.reviews')</h3>
            <h2>@lang('main.titles.subReviews')</h2>
        </div>
        <div class="reviewsWrapper">
            <i class="left"><img src="{{Vite::asset('resources/icons/arrow-right.svg')}}" alt="arrow left"></i>
            <ul class="carousel reviewsCarousel">
                @foreach($resource['reviews'] as $key => $value)
                    <li class="card">
                        <div class="review-card">
                            <div class="review-card__header">
                                <img src="{{Vite::asset('resources/images/user-avatar.png')}}" alt="user avatar">
                                <h4>{{$value[0]->name}}</h4>
                            </div>
                            <p class="review-card__text">
                                {{$value[0]->description}}
                            </p>
                        </div>
                    </li>
                @endforeach
            </ul>
            <i class="right"><img src="{{Vite::asset('resources/icons/arrow-right.svg')}}" alt="arrow right"></i>
        </div>
    </section>
    <section class="banner">
        {{--TODO FRONT: 2. Необходимо заполнять баннер этой картинкой --}}
        <img src="{{$resource['banners'][1]->image ?? url('storage/image/default_post.jpg')}}"
             alt="{{$resource['banners'][1]->title ?? "Картинка"}}">
        <a href="{{route('user.catalog')}}">
            <button class="button-outlined">@lang('main.titles.catalog')</button>
        </a>
    </section>
    @include('frontend.lead_form')
@endsection
@section('scripts')
    @vite('resources/js/slider.js')
@endsection
