@if(count($data['products']))
    {{count($data['categories'])}}
    <div class="search-result__section">
        @if(count($data['categories']) == 1)
            <h2 class="section-title">{{$data['categories'][0]['title']}}</h2>
        @else
            <h2 class="section-title">@lang('catalog.filter.series')</h2>
        @endif
        @include('.site.components.sort-buttons')
    </div>
    <div class="catalog-wrapper__products-block">
        @foreach($data['products'] as $index => $value)
            @include('site.components.product-card')
        @endforeach
    </div>
    {{$data['products']->links('site.components.pagination')}}
@else
    Ничего не найдено
@endif
