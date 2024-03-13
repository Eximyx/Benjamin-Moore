@extends('site.layouts.site')
@section('content')
    @include('site.components.breadcrumbs')
    <section class="news-section">
        <h2 class="section-title">@lang('news.title')</h2>
        <div class="news-section__wrapper">
            @foreach($data['newsPosts'] as $key => $value)
                <div class="news-card-link news-card">
                    <img src="{{url('storage/image').'/'.$value->main_image}}" alt="news preview">
                    <div class="news-card__details-block">
                        <div class="news-card__details">
                            <p class="news-card__details-author">USER_NAME •</p>
                            <img class="news-card__details-clock-image"
                                 src="{{Vite::asset('resources/icons/clock.svg')}}"
                                 alt="clock image">
                            <p class="news-card__details-date">{{$value->created_at->format('d.m.y')}}</p>
                        </div>
                        <a class="news-card__link" href="{{route('user.news.show', $value->slug)}}">
                            @lang('news.more')
                        </a>
                    </div>
                    <h4 class="news-card__header">
                        {{$value->title}}
                    </h4>
                    <p class="news-card__description">
                        {{$value->description}}
                    </p>
                </div>
            @endforeach
        </div>
        {{-- TODO FRONT: нажатие на пагинации отрабатывает только при нажатии на текст! --}}
        {{$data['newsPosts']->links('site.components.pagination')}}
    </section>
@endsection
