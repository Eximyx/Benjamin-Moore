<div class="news-card">
    <img src="{{url($value->main_image)}}" alt="news preview">
    <div class="news-card__details-block">
        <p class="news-card__details-author">{{$value->user_name}}</p>
        <div class="news-card__details">
            <div class="news-card__details-date-block">
                <img class="news-card__details-clock-image"
                     src="{{Vite::asset('resources/icons/clock.svg')}}"
                     alt="clock image">
                <p class="news-card__details-date">{{$value->created_at->format('d.m.y')}}</p>
            </div>
            <a class="news-card__link" href="{{route('user.news.show', $value->slug)}}">
                @lang('main.buttons.more')
            </a>
        </div>
    </div>
    <h4 class="news-card__header">
        {{$value->title}}
    </h4>
    <p class="news-card__description">
        {{$value->content}}
    </p>
</div>
