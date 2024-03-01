@extends('frontend.layout')
@section('content')
    @include('frontend.breadcrumbs')
    <section class="news-section">
        <h2 class="section-title">@lang('news.title')</h2>
        <div class="news-section__wrapper">
            @foreach($newsPosts as $key => $value)
                <div class="news-card-link news-card">
                    <img src="{{url('storage/image').'/'.$value->main_image}}" alt="news preview">
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
                    <a href="{{route('user.news-show', $value->slug ?? 1)}}">
                        <button class="button-outlined">@lang('news.more')</button>
                    </a>
                </div>
            @endforeach
        </div>
        {{-- PAGINATION --}}
        {{$newsPosts->links('frontend.pagination')}}
    </section>
@endsection
