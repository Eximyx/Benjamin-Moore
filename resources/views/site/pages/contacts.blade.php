@extends('site.layouts.site')
@section('content')
    @include('site.components.breadcrumbs')
    <section class="contact-section">
        <div class=" contacts-block">
            <h3 class="section-header">@lang('contacts.contacts')</h3>
            <div class="contacts-inner-block">
                <img src="{{Vite::asset('resources/icons/phone.svg')}}" alt="">
                <p>{{$data['settings']->phone}}</p>
            </div>
            <div class="contacts-inner-block">
                <img src="{{Vite::asset('resources/icons/point.svg')}}" alt="">
                <p>{{$data['settings']->location}}</p>
            </div>
            <div class="contacts-inner-block">
                <img src="{{Vite::asset('resources/icons/mail.svg')}}" alt="">
                <p>{{$data['settings']->email}}</p>
            </div>
            <div class="contacts-inner-block">
                <img src="{{Vite::asset('resources/icons/inst.svg')}}" alt="">
                <p>{{$data['settings']->instagram}}</p>
            </div>
            @if (count($data['partners']))
                <div class="contacts-block">
                    <h4>@lang('contacts.partners')</h4>
                    @foreach($data['partners'] as $index => $partner)
                        @if($loop->index == 2)
                            @break
                        @endif
                        <div class="contacts-inner-block">
                            <img src="{{Vite::asset('resources/icons/point.svg')}}" alt="">
                            <p>{{$partner->location}}</p>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
        {{-- TODO FRONT: тут должен быть баннер! add an image placeholder for this {{$data['banner']->image ?? Vite::asset('resources/images/news-mock-image.png')}} --}}
        <iframe class="contact-section__map"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3974.4625306992025!2d23.828172970410048!3d53.67853919301063!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46dfd62f1aae4493%3A0x67ef838fce252f24!2z0J_Qu9C-0YjRh9CwINCh0LDQstC10YbQutCw0Y8!5e0!3m2!1sru!2sby!4v1705934120557!5m2!1sru!2sby"
                style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
        </iframe>
    </section>
    @include('site.components.lead-form')
@endsection
