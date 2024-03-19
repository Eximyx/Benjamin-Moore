@extends('site.layouts.site')
@section('content')
    @include('site.components.breadcrumbs')
    {{-- TODO BOTH: 23. Обсудить, как будем данные фильтров передавать --}}
    <div class="catalog-block">
        <button class="mobile-filter__button button-outlined">
            <img src="{{Vite::asset('resources/icons/filter-icon.svg')}}"
                 alt="filter-icon">@lang('catalog.filter.title')
        </button>
        {{--TODO FRONT: Странно работает форма --}}
        <form id="catalog" action="" class="catalog-form" enctype="multipart/form-data">
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
            @include('site.components.search-result')
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        document.getElementById("catalog-form").addEventListener("submit", function () {
            e.preventDefault()
            for (var item of new FormData(this).entries()) {
                console.log(item[1])
            }
        });
    </script>
    @vite(['resources/js/filter.js', 'resources/js/custom-select.js'])
@endpush
