@if(count($data['products']))
    <div class="search-result__section">
        <h2 class="section-title">Серия Aura®</h2>
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
