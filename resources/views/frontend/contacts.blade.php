@extends('frontend.layout')
@section('content')
    @include('frontend.breadcrumbs')
    <section class="contact-section">
        <div class=" contacts-block">
            <h3 class="section-header">@lang('contacts.contacts')</h3>
            <div class="contacts-inner-block">
                <img src="{{Vite::asset('resources/icons/phone.svg')}}" alt="">
                <p>+375 (29) 444-32-32</p>
            </div>
            <div class="contacts-inner-block">
                <img src="{{Vite::asset('resources/icons/point.svg')}}" alt="">
                <p>г. Минск, ул. Восточная 41</p>
            </div>
            <div class="contacts-inner-block">
                <img src="{{Vite::asset('resources/icons/mail.svg')}}" alt="">
                <p>support@mot.ru</p>
            </div>
            <div class="contacts-inner-block">
                <img src="{{Vite::asset('resources/icons/inst.svg')}}" alt="">
                <p>@benjaminmoore.by</p>
            </div>
            <div class="contacts-block">
                <h4>@lang('contacts.partners')</h4>
                <div class="contacts-inner-block">
                    <img src="{{Vite::asset('resources/icons/point.svg')}}" alt="">
                    <p>г. Могилев "HouseMaster"</p>
                </div>
                <div class="contacts-inner-block">
                    <img src="{{Vite::asset('resources/icons/point.svg')}}" alt="">
                    <p>г. Гродно "LuxDecor"</p>
                </div>
            </div>
        </div>
        <iframe class="contact-section__map"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3974.4625306992025!2d23.828172970410048!3d53.67853919301063!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46dfd62f1aae4493%3A0x67ef838fce252f24!2z0J_Qu9C-0YjRh9CwINCh0LDQstC10YbQutCw0Y8!5e0!3m2!1sru!2sby!4v1705934120557!5m2!1sru!2sby"
                style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
        </iframe>
    </section>
    @include('frontend.lead_form')
@endsection
