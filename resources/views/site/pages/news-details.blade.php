@extends('site.layouts.site')

@section('breadcrumbs', $data['entity']->title)

@section('content')
    @include('site.components.breadcrumbs')
    <div class="news-details">
        <div class="news-details__news-block">
            <h2 class="section-title">
                {{ $data['entity']->title}}
            </h2>
            <div class="news-card__details">
                <p class="news-card__details-author">Udemy •</p>
                <img class="news-card__details-clock-image" src="{{Vite::asset('resources/icons/clock.svg')}}"
                     alt="clock image">
                <p class="news-card__details-date">{{date_format($data['entity']->created_at, 'd m y')}}</p>
            </div>
            <img class="news-image" src="{{Vite::asset('resources/images/news-png.png')}}" alt="news image">
            <p class="content">
                {!! $data['entity']->content !!}
            </p>
        </div>
        <article class="last-news-block">
            <h2 class="section-title">@lang('news.lastNews')</h2>
            @foreach($data['latest'] as $value)
                <div class="news-card-link news-card">
                    <img src="{{Vite::asset('resources/images/news-mock-image.png')}}" alt="news preview">
                    <div class="news-card__details">
                        <p class="news-card__details-author">Udemy •</p>
                        <img class="news-card__details-clock-image" src="{{Vite::asset('resources/icons/clock.svg')}}"
                             alt="clock image">
                        <p class="news-card__details-date">{{$value->created_at->format('d.m.y')}}</p>
                    </div>
                    <h4 class="news-card__header">
                        {{$value->title}}
                    </h4>
                    <p class="news-card__description">
                        {{$value->content}}
                    </p>
                    <a href="{{route('user.news.show', $value->slug)}}">
                        <button class="button-outlined">@lang('news.more')</button>
                    </a>
                </div>
            @endforeach
            <a href="{{route('user.news.index')}}">
                <button class="button-filled">@lang('news.allNews')</button>
            </a>
        </article>
    </div>
@endsection
@section('scripts')
@endsection
