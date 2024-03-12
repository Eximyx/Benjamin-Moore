<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="{{$data['meta']->meta_description}}">
    <meta name="keywords" content="{{$data['meta']->meta_keywords}}">

    <title>{{$data['meta']->title}}</title>

    <link href="https://fonts.googleapis.com/css2?family=Commissioner:wght@400;500&display=swap" rel="stylesheet">
    @vite('resources/css/style.css')
    @vite('resources/js/app.js')
</head>
<body>
<header class="header">
    <nav class="header__nav">
        <button class="menu">
            <svg width="30" height="30" viewBox="0 0 100 100">
                <path
                    class="line line1"
                    d="M 20,29.000046 H 80.000231 C 80.000231,29.000046 94.498839,28.817352 94.532987,66.711331 94.543142,77.980673 90.966081,81.670246 85.259173,81.668997 79.552261,81.667751 75.000211,74.999942 75.000211,74.999942 L 25.000021,25.000058"
                />
                <path class="line line2" d="M 20,50 H 80"/>
                <path
                    class="line line3"
                    d="M 20,70.999954 H 80.000231 C 80.000231,70.999954 94.498839,71.182648 94.532987,33.288669 94.543142,22.019327 90.966081,18.329754 85.259173,18.331003 79.552261,18.332249 75.000211,25.000058 75.000211,25.000058 L 25.000021,74.999942"
                />
            </svg>
        </button>
        <img src="{{Vite::asset('resources/icons/benjaminmoore-icon.svg')}}" alt="icon"/>
        <a class="logo-text" href="{{route('user.main.index')}}">Benjamin Moore</a>
        <ul class="header__nav-buttons">
            <li><a href="{{route('user.catalog')}}">@lang('nav-links.catalog')</a></li>
            <li><a href="{{route('user.news')}}">@lang('nav-links.news')</a></li>
            <li><a href="{{route('user.calc')}}">@lang('nav-links.calc')</a></li>
            <li><a href="{{route('user.contacts')}}">@lang('nav-links.contacts')</a></li>
        </ul>
    </nav>
    <div class="header__rightside">
        <div class="header__contacts">
            <div class="header__contacts-telephone">
                <img src="{{Vite::asset("resources/icons/phone-logo.svg")}}" alt="phone-svg"/>
                <a href="tel: {{$data['settings']->phone}}">{{$data['settings']->phone}}</a>
            </div>
            <p class="header__contacts-time">{{$data['settings']->phone}}</p>
        </div>
        @if(request()->url() != route('user.contacts'))
            <a href="{{route('user.contacts')}}" class="button-filled">
                @lang('nav-links.orderButton')
            </a>
        @endif
    </div>
</header>
<div class="burger-menu">
    <div class="burger-menu-div">
        <ul class="burger-links">
            <li><a href="{{route('user.main.index')}}">@lang('nav-links.main')</a></li>
            <li><a href="{{route('user.catalog')}}">@lang('nav-links.catalog')</a></li>
            <li><a href="{{route('user.news')}}">@lang('nav-links.news')</a></li>
            <li><a href="{{route('user.calc')}}">@lang('nav-links.calc')</a></li>
            <li><a href="{{route('user.contacts')}}">@lang('nav-links.contacts')</a></li>
        </ul>
    </div>
</div>
<div class="mobile-header">
    <button class="menu">
        <svg width="30" height="30" viewBox="0 0 100 100">
            <path
                class="line line1"
                d="M 20,29.000046 H 80.000231 C 80.000231,29.000046 94.498839,28.817352 94.532987,66.711331 94.543142,77.980673 90.966081,81.670246 85.259173,81.668997 79.552261,81.667751 75.000211,74.999942 75.000211,74.999942 L 25.000021,25.000058"
            />
            <path class="line line2" d="M 20,50 H 80"/>
            <path
                class="line line3"
                d="M 20,70.999954 H 80.000231 C 80.000231,70.999954 94.498839,71.182648 94.532987,33.288669 94.543142,22.019327 90.966081,18.329754 85.259173,18.331003 79.552261,18.332249 75.000211,25.000058 75.000211,25.000058 L 25.000021,74.999942"
            />
        </svg>
    </button>
    <a href="{{route('user.contacts')}}" class="button-filled">
        @lang('nav-links.orderButton')
    </a>
</div>
<main class="main">
    @yield('content')
</main>
<footer class="footer">
    <div class="footer__logo">
        <img src="{{Vite::asset('resources/icons/benjaminmoore-icon.svg')}}" alt="icon"/>
        <a class="logo-text" href="{{route('user.main.index')}}">Benjamin Moore</a>
        <p>{{$data['meta']->additional_text}}</p>
    </div>
    <div class="footer__buttons">
        <ul class="header__nav-buttons buttons-margin">
            <li><a href="{{route('user.catalog')}}">@lang('nav-links.catalog')</a></li>
            <li><a href="{{route('user.news')}}">@lang('nav-links.news')</a></li>
            <li><a href="{{route('user.calc')}}">@lang('nav-links.calc')</a></li>
            <li><a href="{{route('user.contacts')}}">@lang('nav-links.contacts')</a></li>
        </ul>
    </div>
    <div class="footer__contacts">
        <div class="footer__contacts__inner-div">
                <span><img src="{{Vite::asset('resources/icons/phone.svg')}}" alt="phone"><a
                        href="tel: {{$data['settings']->phone}}">{{$data['settings']->phone}}</a></span>
            <span><img src="{{Vite::asset('resources/icons/point.svg')}}"
                       alt="address">{{$data['settings']->location}}</span>
            <span><img src="{{Vite::asset('resources/icons/mail.svg')}}" alt="mail"><a
                    href="mailto: {{$data['settings']->email}}"></a>{{$data['settings']->email}}</span>
        </div>
    </div>
</footer>

@vite('resources/js/burger.js')
@yield('scripts')
</body>
</html>
