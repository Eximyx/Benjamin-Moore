@if(count($data['products']))
    <h2 class="section-title">Серия Aura®</h2>
    <div class="catalog-wrapper__products-block">
        @foreach($data['products'] as $index => $value)
            @include('site.components.product-card')
        @endforeach
    </div>
    {{$data['products']->links('site.components.pagination')}}
    @else
    Ничего не найдено
@endif
