@if(count($data['products']))
    <div class="catalog-wrapper__products-block">
        @foreach($data['products'] as $index => $value)
            @include('site.components.product-card')
        @endforeach
    </div>
    {{$data['products']->links('site.components.pagination')}}
@else
    Ничего не найдено
@endif
