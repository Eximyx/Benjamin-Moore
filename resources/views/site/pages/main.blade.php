@extends('site.layouts.site')
@section('content')
    <section class="main__banner">
        <div class="main__banner-block">
            <h2 class="main__banner-text"><b>Benjamin Moore</b><br>@lang('main.titles.paints')</h2>
            <p id="main__banner-p-desktop">{{$data['banners'][0]->content}}</p>
            <p id="main_banner-p-mobile">{{$data['banners'][0]->content}}</p>
            <div class="main__banner-buttons">
                <a href="{{route('user.catalog.index')}}">
                    <button class="button-filled">@lang('main.buttons.buy')</button>
                </a>
                {{-- TODO BOTH: Нужно реализовать страницу со всеми красками --}}
                <a href="">
                    <button class="button-outlined">@lang('main.buttons.allColors')</button>
                </a>
            </div>
            {{--TODO FRONT: 2. Необходимо заполнять баннер этой картинкой --}}
            <img src="{{$data['banners'][0]->image}}"
                 alt="{{$data['banners'][0]->title}}">
        </div>
    </section>
    <section class="product">
        <div class="header-block">
            <div class="section-header">
                <h3>@lang('main.titles.products')</h3>
                <h2>@lang('main.titles.lastProducts')</h2>
            </div>
            <a href="{{route('user.catalog.index')}}">
                <button class="button-outlined">@lang("main.buttons.allProducts")</button>
            </a>
        </div>
        <div class="wrapper">
            <i class="left"><img src="{{Vite::asset('resources/icons/arrow-right.svg')}}" alt="arrow left"></i>
            <ul class="carousel">
                @foreach($data['products'] as $value)
                    <li class="card product-card">
                        <img src="{{Vite::asset("resources/images/paint-can.png")}}" alt="paint can">
                        <h4 class="product-card__header">{{$value->title}}</h4>
                        <p class="product-card__details">{{$value->gloss_level}}</p>
                        <div class="product-card__price-block">
                            <p class="product-card__price-block__price">$ {{$value->price}}</p>
                            <a href="{{route('user.catalog.show', $value->slug)}}">
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
                        <img src="{{url('storage/image/sections/section_image_1.jpg')}}" alt="">
                    </div>
                    <div class="about-us__image-placeholder-mobile">
                        <img style="height:500px; width: 500px"
                             src="{{url('storage/image/sections/section_image_2.jpg')}}" alt="">
                    </div>
                </div>
                <div class="about-us__inner-div">
                    {!! nl2br(e($data['settings']->description)) !!}
                </div>
                {{-- TODO BOTH: 21. Необходимо обсудить, как у нас будут отображаться статические страницы--}}
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
            @foreach($data['sections'] as $key => $value)
                <div class="quality-card">
                    <h4 class="quality-card__card-header">{{$value->title}}</h4>
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
            <a href="{{route('user.news.index')}}">
                <button class="button-outlined">@lang('main.buttons.allNews')</button>
            </a>
        </div>
        <div class="news-wrapper">
            {{-- TODO: ADD an USER_NAME for post --}}
            @foreach($data['news'] as $value)
                <div class="news-card">
                    <img
                        src="{{url('storage/image').'main.blade.php/'.$value->main_image}}"
                        alt="news preview">
                    <div class="news-card__details-block">
                        <div class="news-card__details">
                            <p class="news-card__details-author">USER_NAME •</p>
                            <img class="news-card__details-clock-image"
                                 src="{{Vite::asset('resources/icons/clock.svg')}}"
                                 alt="clock image">
                            <p class="news-card__details-date">{{$value->created_at->format('d.m.y')}}</p>
                        </div>
                        <a class="news-card__link" href="{{route('user.news.index')}}">
                            @lang('main.buttons.more')
                        </a>
                    </div>
                    <h4 class="news-card__header">
                        {{$value->title}}
                    </h4>
                    <p class="news-card__description">
                        {{$value->content}}
                    </p>
                </div>
            @endforeach
        </div>
        <button class="button-filled mobile-news-button"><a
                href="{{route('user.news.index')}}">@lang('main.buttons.allNews')</a>
        </button>
    </section>
    <section class="reviews">
        <div class="section-header">
            <h3>@lang('main.titles.reviews')</h3>
            <h2>@lang('main.titles.subReviews')</h2>
        </div>
        <div class="reviewsWrapper">
            <i class="left"><img src="{{Vite::asset('resources/icons/arrow-right.svg')}}" alt="arrow left"></i>
            <ul class="carousel reviewsCarousel">
                @foreach($data['reviews'] as $value)
                    <li class="card">
                        <div class="review-card">
                            <div class="review-card__header">
                                <img src="{{Vite::asset('resources/images/user-avatar.png')}}" alt="user avatar">
                                <h4>{{$value->name}}</h4>
                            </div>
                            <p class="review-card__text">
                                {{$value->description}}
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
        <img src="{{$data['banners'][1]->image}}"
             alt="{{$data['banners'][1]->title}}">
        <a href="{{route('user.catalog.index')}}">
            <button class="button-outlined">@lang('main.titles.catalog')</button>
        </a>
    </section>
    @include('site.components.lead_form')
@endsection
@section('scripts')
    @vite('resources/js/slider.js')
@endsection
