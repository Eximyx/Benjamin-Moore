@extends('site.layouts.site')
@section('content')
    @include('site.components.breadcrumbs')
{{--  TODO: лэнги для страницы красок  --}}
    <h4 class="section-title">Выберите цвет</h4>
    <div class="colors-wrapper">
        @foreach($data["colors"] as $value)
            <div id="color_{{$value -> id}}" class="color-block" style="background-color: {{{$value->hex_code}}};">
                <a href="#" class="svg-cart hidden">
                    <svg class="svg-cart" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path style="fill: #fff;" d="M0 1.875C0 1.70924 0.065848 1.55027 0.183058 1.43306C0.300269 1.31585 0.45924 1.25 0.625 1.25H2.5C2.63941 1.25004 2.77481 1.29669 2.88466 1.38253C2.99452 1.46837 3.07251 1.58848 3.10625 1.72375L3.6125 3.75H18.125C18.2174 3.75006 18.3087 3.77061 18.3922 3.81019C18.4758 3.84977 18.5495 3.90738 18.6081 3.97887C18.6666 4.05037 18.7086 4.13397 18.731 4.22365C18.7534 4.31333 18.7556 4.40686 18.7375 4.4975L17.4875 10.7475C17.4602 10.8838 17.3882 11.0071 17.2829 11.0979C17.1776 11.1886 17.0451 11.2417 16.9062 11.2487L5.16 11.8387L5.51875 13.75H16.25C16.4158 13.75 16.5747 13.8158 16.6919 13.9331C16.8092 14.0503 16.875 14.2092 16.875 14.375C16.875 14.5408 16.8092 14.6997 16.6919 14.8169C16.5747 14.9342 16.4158 15 16.25 15H5C4.85429 14.9999 4.71321 14.9488 4.60114 14.8557C4.48907 14.7626 4.41306 14.6332 4.38625 14.49L2.5125 4.50875L2.0125 2.5H0.625C0.45924 2.5 0.300269 2.43415 0.183058 2.31694C0.065848 2.19973 0 2.04076 0 1.875ZM3.8775 5L4.9275 10.5988L16.3575 10.025L17.3625 5H3.8775ZM6.25 15C5.58696 15 4.95107 15.2634 4.48223 15.7322C4.01339 16.2011 3.75 16.837 3.75 17.5C3.75 18.163 4.01339 18.7989 4.48223 19.2678C4.95107 19.7366 5.58696 20 6.25 20C6.91304 20 7.54893 19.7366 8.01777 19.2678C8.48661 18.7989 8.75 18.163 8.75 17.5C8.75 16.837 8.48661 16.2011 8.01777 15.7322C7.54893 15.2634 6.91304 15 6.25 15ZM15 15C14.337 15 13.7011 15.2634 13.2322 15.7322C12.7634 16.2011 12.5 16.837 12.5 17.5C12.5 18.163 12.7634 18.7989 13.2322 19.2678C13.7011 19.7366 14.337 20 15 20C15.663 20 16.2989 19.7366 16.7678 19.2678C17.2366 18.7989 17.5 18.163 17.5 17.5C17.5 16.837 17.2366 16.2011 16.7678 15.7322C16.2989 15.2634 15.663 15 15 15ZM6.25 16.25C6.58152 16.25 6.89946 16.3817 7.13388 16.6161C7.3683 16.8505 7.5 17.1685 7.5 17.5C7.5 17.8315 7.3683 18.1495 7.13388 18.3839C6.89946 18.6183 6.58152 18.75 6.25 18.75C5.91848 18.75 5.60054 18.6183 5.36612 18.3839C5.1317 18.1495 5 17.8315 5 17.5C5 17.1685 5.1317 16.8505 5.36612 16.6161C5.60054 16.3817 5.91848 16.25 6.25 16.25ZM15 16.25C15.3315 16.25 15.6495 16.3817 15.8839 16.6161C16.1183 16.8505 16.25 17.1685 16.25 17.5C16.25 17.8315 16.1183 18.1495 15.8839 18.3839C15.6495 18.6183 15.3315 18.75 15 18.75C14.6685 18.75 14.3505 18.6183 14.1161 18.3839C13.8817 18.1495 13.75 17.8315 13.75 17.5C13.75 17.1685 13.8817 16.8505 14.1161 16.6161C14.3505 16.3817 14.6685 16.25 15 16.25Z" fill="black"/>
                    </svg>
                </a>
                <div class="color-block__info" style="background-color: {{{$value->hex_code}}};">
                    <h6 class="color-block__title">{{$value -> title}}</h6>
                    <p class="color-block__id">{{$value -> id}}</p>
                </div>
            </div>
        @endforeach
    </div>
@endsection
@push('scripts')
    @vite('resources/js/components/colors.js')
@endpush
