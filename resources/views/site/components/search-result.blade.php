<h2 class="section-title">Серия Aura®</h2>
<div class="catalog-wrapper__products-block">
    @foreach($data['products'] as $index => $value)
        <div class="product-card">
            <img src="{{Vite::asset('resources/images/paint-can.png')}}" alt="paint can">
            <h4 class="product-card__header">{{$value->title}}</h4>
            <p class="product-card__details">{{$value->gloss_level}}</p>
            <div class="product-card__price-block">
                <p class="product-card__price-block__price">$ {{$value->price}}</p>
                <a href="{{route('user.catalog.show', $value->slug)}}">
                    <button class="button-filled">@lang('catalog.buttons.order')</button>
                </a>
            </div>
        </div>
    @endforeach
</div>
{{$data['products']->links('site.components.pagination')}}
