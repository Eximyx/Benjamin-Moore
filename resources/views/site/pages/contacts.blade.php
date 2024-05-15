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
        <div class="contact-section__banner"
             style="background-image: url('{{{$data['banner']->image ?? Vite::asset('resources/images/news-mock-image.png')}}}');">
        </div>
    </section>
    @include('site.components.lead-form-map')
@endsection
