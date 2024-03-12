@extends('site.layouts.site')
@section('content')
    @include('site.components.breadcrumbs')
    {{-- TODO BOTH: 23. Обсудить, как будем данные фильтров передавать --}}
    <div class="catalog-block">
        <button class="mobile-filter__button button-outlined">
            <img src="{{Vite::asset('resources/icons/filter-icon.svg')}}"
                 alt="filter-icon">@lang('catalog.filter.title')
        </button>
        <form class="catalog-form">
            <label class="form-label" for="jobs">@lang('catalog.filter.jobs')</label>
            <div class="dropdown_with-chk">
                <button type="button" class="dropdown_with-chk__button">@lang('catalog.filter.defaultValue')</button>
                <ul class="dropdown_with-chk__list" id="jobs">
                    <li class="dropdown_with-chk__list-item">
                        <input type="checkbox" name="kind_of_work_id[]" class="dropdown_with-chk__list-item_label">
                        <label class="dropdown_with-chk__list-item_label">@lang('catalog.filter.internalWork')</label>
                    </li>
                    <li class="dropdown_with-chk__list-item">
                        <input type="checkbox" name="kind_of_work_id[]" class="dropdown_with-chk__list-item_label">
                        <label class="dropdown_with-chk__list-item_label">@lang('catalog.filter.externalWork')</label>
                    </li>
                </ul>
            </div>
            <label class="form-label" for="series">@lang('catalog.filter.series')</label>
            <div class="dropdown_with-chk">
                <button type="button" class="dropdown_with-chk__button">@lang('catalog.filter.defaultValue')</button>
                <ul class="dropdown_with-chk__list" id="series">
                    @foreach($data['productCategories'] as $key => $value)
                        <li class="dropdown_with-chk__list-item">
                            <input type="checkbox" name="products_categories[]" id="{{$value->id}}"
                                   class="dropdown_with-chk__list-item_label">
                            <label for="{{$value->id}}"
                                   class="dropdown_with-chk__list-item_label">{{$value->title}}</label>
                        </li>
                    @endforeach
                </ul>
            </div>

            <label class="form-label" for="colors">@lang('catalog.filter.colors')</label>
            <div class="dropdown_with-chk">
                <button type="button" class="dropdown_with-chk__button">@lang('catalog.filter.defaultValue')</button>
                <ul class="dropdown_with-chk__list" id="colors">
                    @foreach($data['colors'] as $key => $value)
                        <li class="dropdown_with-chk__list-item">
                            <input type="checkbox" name="colorss[]" id="{{$value->id}}"
                                   class="dropdown_with-chk__list-item_label">
                            <label for="{{$value->id}}"
                                   class="dropdown_with-chk__list-item_label">{{$value->title}}</label>
                        </li>
                    @endforeach
                </ul>
            </div>
            <label class="form-label" for="budget">@lang('catalog.filter.prices.budget')</label>
            <div class="catalog-form__budget-block" id="budget">
                <input type="text" class="form-input" placeholder="@lang('catalog.filter.prices.from')">
                <p>-</p>
                <input type="text" class="form-input" placeholder="@lang('catalog.filter.prices.to')">
            </div>
            <div class="form-buttons">
                <button class="button-outlined form-button">@lang("catalog.buttons.submit")</button>
                <button class="button-filled form-button">@lang("catalog.buttons.reset")</button>
            </div>
        </form>
        <div class="catalog-wrapper">
            <h2 class="section-title">Серия Aura®</h2>
            <div class="catalog-wrapper__products-block">
                @foreach($data['products'] as $index => $value)
                    <div class="product-card">
                        <img src="{{Vite::asset('resources/images/paint-can.png')}}" alt="paint can">
                        <h4 class="product-card__header">{{$value->title}}</h4>
                        <p class="product-card__details">{{$value->gloss_level}}</p>
                        <div class="product-card__price-block">
                            <p class="product-card__price-block__price">$ {{$value->price}}</p>
                            <a href="{{route('user.catalog-show', $value->slug)}}">
                                <button class="button-filled">@lang('catalog.buttons.order')</button>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            {{$data['products']->links('frontend.pagination')}}

        </div>
    </div>
@endsection
@section('scripts')
    @vite(['resources/js/filter.js', 'resources/js/custom-select.js']);
@endsection
