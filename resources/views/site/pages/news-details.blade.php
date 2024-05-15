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
                <p class="news-card__details-author">{{ $data['entity']->user_name}}</p>
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
                @include('site.components.news-card')
            @endforeach
            <a href="{{route('user.news.index')}}">
                <button class="button-filled">@lang('news.allNews')</button>
            </a>
        </article>
    </div>
@endsection
