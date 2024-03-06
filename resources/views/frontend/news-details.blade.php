@extends('frontend.layout')


@section('breadcrumbs', $entity->title ?? 'ENTITY_TITLE')

@section('content')
    @include('frontend.breadcrumbs')
    <div class="news-details">
        <div class="news-details__news-block">
            <h2 class="section-title">
                {{ $entity->title ?? 'ENTITY_TITLE'}}
            </h2>
            <div class="news-card__details">
                <p class="news-card__details-author">Udemy •</p>
                <img class="news-card__details-clock-image" src="{{Vite::asset('resources/icons/clock.svg')}}"
                     alt="clock image">
                <p class="news-card__details-date">27 января 2021</p>
            </div>
            <img class="news-image" src="{{Vite::asset('resources/images/news-png.png')}}" alt="news image">
            <p class="content">
                {{ $entity->content ?? 'ENTITY_CONTENT'}}
            </p>
        </div>
        <article class="last-news-block">
            <h2 class="section-title">@lang('news.lastNews')</h2>
            <div class="news-card-link news-card">
                <img src="{{Vite::asset('resources/images/news-mock-image.png')}}" alt="news preview">
                <div class="news-card__details">
                    <p class="news-card__details-author">Udemy •</p>
                    <img class="news-card__details-clock-image" src="{{Vite::asset('resources/icons/clock.svg')}}"
                         alt="clock image">
                    <p class="news-card__details-date">27 января 2021</p>
                </div>
                <h4 class="news-card__header">
                    Какие IT - професси будут востребованы в 2022 году
                </h4>
                <p class="news-card__description">
                    Предварительные выводы неутешительны: существующая теория требует анализа новых предложений.
                </p>
                <a href="news-details.html">
                    <button class="button-outlined">Подробнее</button>
                </a>
            </div>
            <a href="{{route('user.news')}}">
                <button class="button-filled">@lang('news.allNews')</button>
            </a>
        </article>
    </div>
@endsection

@section('scripts')

@endsection
