@extends('site.layouts.site')
@section('breadcrumbs', $data['entity']->title ?? 'ENTITY_TITLE')
@section('content')
    @include('site.components.breadcrumbs')
    <section class="product-details-section">
        <div class="product-images-block">
            <img src="" alt="main-image" class="main-product-image">
            <div class="product-images">
                <img src="../assets/images/product-image.png" alt="">
                <img src="../assets/images/product-image.png" alt="">
                <img src="../assets/images/product-image.png" alt="">
                <img src="../assets/images/product-image.png" alt="">
            </div>
        </div>
        <div class="product-details">
            <h2 class="section-header">{{$data['entity']->title}}</h2>
            <p class="product-status">@lang('catalog.product-details.isAvailable.' . $data['entity']->is_toggled ?? 0)</p>
            <p class="product-description">
                {{$data['entity']->sub_content}}
            </p>
            <p class="product-description">@lang('catalog.product-details.amount')</p>
            <div class="product-counter">
                <button class="counter-button sub">–</button>
                <p id="counter">1</p>
                <button class="counter-button add">+</button>
            </div>
            <div class="product-price-block">
                <div class="product-price-block__inner-text"><p class="product-price">$</p>
                    <p id="product-price">{{$data['entity']->price}}</p></div>
                <button class="button-filled call-modal">@lang('catalog.product-details.call')</button>
            </div>
        </div>
    </section>
    <section class="tab-container">
        <div class="tab">
            <input checked id="tab-btn-1" name="tab-btn" type="radio" value="">
            <label for="tab-btn-1">@lang('catalog.product-details.specs')</label>
            <input id="tab-btn-2" name="tab-btn" type="radio" value="">
            <label for="tab-btn-2">@lang('catalog.product-details.options')</label>
            <div class="tab-content" id="content-1">
                {{$data['entity']->content}}
            </div>
            <div class="tab-content" id="content-2">
                <div class="tab-content-block">
                    <div class="tab-content-block__inner-text">
                        <h4>@lang('admin.keys.code')</h4>
                        <p>{{$data['entity']->code}}</p>
                        <h4>@lang('admin.keys.description')</h4>
                        <p>{{$data['entity']->description}}</p>
                        <h4>@lang('admin.keys.type')</h4>
                        <p>{{$data['entity']->type}}</p>
                        <h4>@lang('admin.keys.colors')</h4>
                        <p>
                            @if(count($data['entity']->colors) > 0)
                                @foreach($data['entity']->colors as $color)
                                    {{$color->title}}
                                @endforeach
                            @else
                                -
                            @endif
                        </p>
                        <h4>@lang('admin.keys.base')</h4>
                        <p>1-4</p>
                    </div>
                    <div class="tab-content-block__inner-text">
                        <h4>@lang('admin.keys.v_of_dry_remain')</h4>
                        <p>{{$data['entity']->v_of_dry_remain}}</p>
                        <h4>@lang('admin.keys.time_to_repeat')</h4>
                        <p>{{$data['entity']->time_to_repeat}}</p>
                        <h4>@lang('admin.keys.consumption')</h4>
                        <p>{{$data['entity']->consumption}}</p>
                        <h4>@lang('admin.keys.thickness')</h4>
                        <p>{{$data['entity']->thickness}}</p>
                    </div>
                </div>
                <button class="button-filled" id="pdf_button">@lang('catalog.product-details.download')</button>
            </div>
        </div>
    </section>
    <section class="carousel-section">
        {{-- TODO BOTH: ? Почему тут два враппера одинаковых, но у второго есть какой-то класс. Если они ничем не отличаются, то можно сделать шаблон, при этом второй не отрабатывает--}}
        <div>
            <h2 class="section-header">@lang('catalog.product-details.similar')</h2>
            <div class="wrapper">
                <i class="left"><img src="../assets/icons/arrow-right.svg" alt="arrow left"></i>
                <ul class="carousel">
                    @foreach($data['similar'] as $similar)
                        <li class="card">
                            <div class="product-card">
                                <img src="{{Vite::asset("resources/images/paint-can.png")}}" alt="paint can">
                                <h4 class="product-card__header">{{$similar->title}}</h4>
                                <p class="product-card__details">{{$similar->gloss_level}}</p>
                                <div class="product-card__price-block">
                                    <p class="product-card__price-block__price">${{$similar->price}}</p>
                                    <a href="{{route('user.catalog.show', $similar->slug)}}">
                                        <button class="button-filled">@lang('catalog.buttons.order')</button>
                                    </a>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
                <i class="right"><img src="../assets/icons/arrow-right.svg" alt="arrow right"></i>
            </div>
        </div>
        <div>
            <h2 class="section-header">@lang('catalog.product-details.recommend')</h2>
            <div class="recommendedWrapper wrapper">
                <i class="left"><img src="../assets/icons/arrow-right.svg" alt="arrow left"></i>
                <ul class="carousel">
                    @foreach($data['latest'] as $latest)
                        <li class="card">
                            <div class="product-card">
                                <img src="{{Vite::asset("resources/images/paint-can.png")}}" alt="paint can">
                                <h4 class="product-card__header">{{$latest->title}}</h4>
                                <p class="product-card__details">С{{$latest->gloss_level}}</p>
                                <div class="product-card__price-block">
                                    <p class="product-card__price-block__price">${{$latest->price}}</p>
                                    <a href="{{route('user.catalog.show', $latest->slug)}}">
                                        <button class="button-filled">@lang('catalog.buttons.order')</button>
                                    </a>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
                <i class="right"><img src="../assets/icons/arrow-right.svg" alt="arrow right"></i>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    @vite('resources/js/components/slider.js')
    @vite('resources/js/widgets/product-counter.js')
    @vite('resources/js/widgets/modal-window.js')
@endpush
