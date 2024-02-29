@extends('frontend.layout')
@section('content')
    @include('frontend.breadcrumbs')
    <div class="catalog-block">
        <button class="mobile-filter__button button-outlined">
            <img src="{{Vite::asset('resources/icons/filter-icon.svg')}}"
                 alt="filter-icon">@lang('catalog.filter.title')
        </button>
        <form class="catalog-form">
            <label class="form-label" for="series">@lang('catalog.filter.series')</label>
            <div class="dropdown_with-chk">
                <button type="button" class="dropdown_with-chk__button">@lang('catalog.filter.defaultValue')</button>
                <ul class="dropdown_with-chk__list" id="series">
                    <li class="dropdown_with-chk__list-item">
                        <input type="checkbox" name="i-1" id="i-1" class="dropdown_with-chk__list-item_label">
                        <label for="i-1" class="dropdown_with-chk__list-item_label">Aura</label>
                    </li>
                    <li class="dropdown_with-chk__list-item">
                        <input type="checkbox" name="i-2" id="i-2" class="dropdown_with-chk__list-item_label">
                        <label for="i-2" class="dropdown_with-chk__list-item_label">Shm aura</label>
                    </li>
                    <li class="dropdown_with-chk__list-item">
                        <input type="checkbox" name="i-3" id="i-3" class="dropdown_with-chk__list-item_label">
                        <label for="i-3" class="dropdown_with-chk__list-item_label">Maura</label>
                    </li>
                    <li class="dropdown_with-chk__list-item">
                        <input type="checkbox" name="i-4" id="i-4" class="dropdown_with-chk__list-item_label">
                        <label for="i-4" class="dropdown_with-chk__list-item_label">neAura</label>
                    </li>
                </ul>
            </div>
            <label class="form-label" for="jobs">Работы</label>
            <div class="dropdown_with-chk">
                <button type="button" class="dropdown_with-chk__button">@lang('catalog.filter.defaultValue')</button>
                <ul class="dropdown_with-chk__list" id="jobs">
                    <li class="dropdown_with-chk__list-item">
                        <input type="checkbox" name="i-1-1" id="i-1-1" class="dropdown_with-chk__list-item_label">
                        <label for="i-1-1" class="dropdown_with-chk__list-item_label">Aura</label>
                    </li>
                    <li class="dropdown_with-chk__list-item">
                        <input type="checkbox" name="i-2-1" id="i-2-1" class="dropdown_with-chk__list-item_label">
                        <label for="i-2-1" class="dropdown_with-chk__list-item_label">Shmaura</label>
                    </li>
                    <li class="dropdown_with-chk__list-item">
                        <input type="checkbox" name="i-3-1" id="i-3-1" class="dropdown_with-chk__list-item_label">
                        <label for="i-3-1" class="dropdown_with-chk__list-item_label">Maura</label>
                    </li>
                    <li class="dropdown_with-chk__list-item">
                        <input type="checkbox" name="i-4-1" id="i-4-1" class="dropdown_with-chk__list-item_label">
                        <label for="i-4-1" class="dropdown_with-chk__list-item_label">neAura</label>
                    </li>
                </ul>
            </div>
            <label class="form-label" for="colors">@lang('catalog.filter.colors')</label>
            <div class="dropdown_with-chk">
                <button type="button" class="dropdown_with-chk__button">@lang('catalog.filter.defaultValue')</button>
                <ul class="dropdown_with-chk__list" id="colors">
                    <li class="dropdown_with-chk__list-item">
                        <input type="checkbox" name="i-1-2" id="i-1-2" class="dropdown_with-chk__list-item_label">
                        <label for="i-1-2" class="dropdown_with-chk__list-item_label">Aura</label>
                    </li>
                    <li class="dropdown_with-chk__list-item">
                        <input type="checkbox" name="i-2-2" id="i-2-2" class="dropdown_with-chk__list-item_label">
                        <label for="i-2-2" class="dropdown_with-chk__list-item_label">Shmaura</label>
                    </li>
                    <li class="dropdown_with-chk__list-item">
                        <input type="checkbox" name="i-3-2" id="i-3-2" class="dropdown_with-chk__list-item_label">
                        <label for="i-3-2" class="dropdown_with-chk__list-item_label">Maura</label>
                    </li>
                    <li class="dropdown_with-chk__list-item">
                        <input type="checkbox" name="i-4-2" id="i-4-2" class="dropdown_with-chk__list-item_label">
                        <label for="i-4-2" class="dropdown_with-chk__list-item_label">neAura</label>
                    </li>
                    <li class="dropdown_with-chk__list-item">
                        <input type="checkbox" name="i-1-2" id="i-1-2" class="dropdown_with-chk__list-item_label">
                        <label for="i-1-2" class="dropdown_with-chk__list-item_label">Aura</label>
                    </li>
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
            <p>
                Покрытиям на водной основе из серии Aura® присвоен класс качества: Super Premium.
                Это 100% акриловые интерьерные краски созданыс применением запатентованной технологии Color Lock® и
                системы колорантов Gennex®.Инновационные технологии позволяют создать особый защитный слойсвязывающий
                составляющие краски на молекулярном уровнеи обеспечивающий высочайшие рабочие характеристики и стойкость
                цвета красок этой серии.
                Непревзойденная долговечность, устойчивость к постоянному мытью, истиранию, выцветанию, легкость при
                удалении пятен, противостояние плесени —все это характеристики краски качества Super Premium.
                Кроме того для краски данной серииразработана персональная Цветовая Коллекция «Aura® Color Stories®»,в
                которую включены полноспектральные цвета,которые обладают усиленной реакцией на изменение освещения.
            </p>
            <div class="catalog-wrapper__products-block">
                <div class="product-card">
                    <img src="{{Vite::asset('resources/images/paint-can.png')}}" alt="paint can">
                    <h4 class="product-card__header">Ben® Premium Interior Latex Semi-Gloss Finish (W627)</h4>
                    <p class="product-card__details">Степень блеска «полуглянцевая»</p>
                    <div class="product-card__price-block">
                        <p class="product-card__price-block__price">$ 5199.00</p>
                        <a href="product-details.html">
                            <button class="button-filled">@lang('catalog.buttons.order')</button>
                        </a>
                    </div>
                </div>
            </div>
            <div class="pagination">
                <ul class="pagination-ul">
                    <li class="pagination-item disabled">
                        <a href="#">
                            <svg width="6" height="12" viewBox="0 0 6 12" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M5 1L1 6L5 11" stroke="white" stroke-width="1.5" stroke-linecap="round"/>
                            </svg>
                        </a>
                    </li>
                    <li class="pagination-item disabled"><a href="#">1</a></li>
                    <li class="pagination-item-active"><a href="#">2</a></li>
                    <li class="pagination-item"><a href="#">4</a></li>
                    <li class="pagination-item"><a href="#">5</a></li>
                    <li class="pagination-item"><a href="#">6</a></li>
                    <li>...</li>
                    <li class="pagination-item"><a href="#" id="pagination-last-page">14</a></li>
                    <li class="pagination-item">
                        <a href="#">
                            <svg width="6" height="12" viewBox="0 0 6 12" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 11L5 6L1 1" stroke="white" stroke-width="1.5" stroke-linecap="round"/>
                            </svg>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    @vite(['resources/js/filter.js', 'resources/js/custom-select.js']);
@endsection
