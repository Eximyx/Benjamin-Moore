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
