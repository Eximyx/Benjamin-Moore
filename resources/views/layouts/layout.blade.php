<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,minimum-scale=1,user-scalable=no">
    <meta http-equiv="x-ua-compatible" content="IE=edge">
    <meta name="author" content="bvvell.ru">
    <title>Benjamin Moore</title>
    <meta name="robots" content="noindex, nofollow">
    <link rel="https://api.w.org/" href="https://benjaminmoore.by/wp-json/"><link rel="alternate" type="application/json" href="https://benjaminmoore.by/wp-json/wp/v2/pages/7"><link rel="EditURI" type="application/rsd+xml" title="RSD" href="https://benjaminmoore.by/xmlrpc.php?rsd">
    <meta name="generator" content="WordPress 6.4.1">
    <link rel="canonical" href="https://benjaminmoore.by/">
    <link rel="shortlink" href="https://benjaminmoore.by/">
    <link rel="alternate" type="application/json+oembed" href="https://benjaminmoore.by/wp-json/oembed/1.0/embed?url=https%3A%2F%2Fbenjaminmoore.by%2F">
    <link rel="alternate" type="text/xml+oembed" href="https://benjaminmoore.by/wp-json/oembed/1.0/embed?url=https%3A%2F%2Fbenjaminmoore.by%2F&amp;format=xml">

    @vite([
                'resources/css/1main.css',
                'resources/css/sbi-styles.min.css',
                'resources/js/alerting.js',
                'resources/js/index.js',
                'resources/js/tag.js',
                'resources/js/vendor.js',
          ])
</head>
<body>
<header class="main">
    <div style="background-color:rgba(0,0,0,.2);margin-bottom: 100px" class="container">
        <div class="left-side">
            <a href="/" class="logo">
                <svg width="180" height="27" viewBox="0 0 180 27">
                    <use xlink:href="#logo-white"></use>
                </svg>
            </a>
            <a href="tel:+375 (29) 608-40-00" class="phone">+375 (29) 608-40-00</a>
        </div>
        <div class="right-side">
            <button type="button" class="menu-toggle">
                открыть меню
            </button>
            <nav>
                <ul class="menu"><li id="menu-item-83" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-83">
                        <a style="user-select: none" onclick=openSubMenu()>
                            Каталог
                        </a>
                        <ul class="sub-menu" >
                            <li id="menu-item-324" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-324"><a href="">Внутренние работы</a></li>
                            <li id="menu-item-325" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-325"><a href="">Наружные работы</a></li>
                        </ul>
                    </li>
                    <li id="menu-item-15" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-15"><a href="{{route('news')}}">Новости</a></li>
                    <li id="menu-item-218" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-218"><a href="{{route('calc')}}">Калькулятор</a></li>
                    <li id="menu-item-137" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-137"><a href="https://benjaminmoore.by/colors/">Цвет</a></li>
                    <li id="menu-item-101" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-101"><a href="https://benjaminmoore.by/contacts/">Где купить</a></li>
                </ul>
            </nav>
        </div>
    </div>
</header>
<main class="main">
    <div>
        @yield('content')
    </div>
</main>
<footer class="footer  main">
    <div class="container footer__nav">
        <a href="" class="logo">
            <svg width="180" height="27" viewBox="0 0 180 27">
                <use xlink:href="#logo"></use>
            </svg>
        </a>
        <nav>
            <a class="" href="https://benjaminmoore.by/%d1%81%d0%b5%d1%80%d0%b8%d1%8f-regal-select/">Внутренние работы</a><a class="" href="https://benjaminmoore.by/%d0%bf%d1%80%d0%be%d0%bf%d0%b8%d1%82%d0%ba%d0%b0-arborcoat/">Наружные работы</a><a class="" href="https://benjaminmoore.by/news/">Новости</a><a class="" href="https://benjaminmoore.by/calculator/">Калькулятор</a><a class="" href="https://benjaminmoore.by/colors/">Цвет</a><a class="" href="https://benjaminmoore.by/contacts/">Где купить</a>        </nav>
    </div>
    <div class="container footer__info">
        <div class="left-side">
            <div class="footer-contacts">
                <div class="footer-contacts__item">
                    <svg width="14" height="12" viewBox="0 0 14 12">
                        <use xlink:href="#mail"></use>
                    </svg>
                    <a href="mailto:sales@benjaminmoore.by">sales@benjaminmoore.by</a>
                </div>
                <div class="footer-contacts__item">
                    <svg width="12" height="15" viewBox="0 0 12 15">
                        <use xlink:href="#phoneIcon"></use>
                    </svg>
                    <a href="mailto:+375 (29) 608-40-00">+375 (29) 608-40-00</a>
                </div>
                <div class="footer-contacts__item">
                    <svg width="12" height="15" viewBox="0 0 12 15">
                        <use xlink:href="#location"></use>
                    </svg>
                    <span>&nbsp;, Минск, Восточная, 41 <br>
ИП Осипков П.В. УНП 191708810 от 26.06.2013</span>
                </div>
            </div>
        </div>
        <div class="right-side">
            <p class="copy">
                Все права защищены © 2022 Benjamin Moore
            </p>
        </div>
    </div>
</footer>
<script src={{Vite::asset('resources/js/index.js')}}></script>
<script src={{Vite::asset('resources/js/alerting.js')}}></script>
<script src={{Vite::asset('resources/js/tag.js')}}></script>
<script src={{Vite::asset('resources/js/vendor.js')}}></script>

</body>
</html>
