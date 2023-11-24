@extends('layouts.layout')
@section('content')
    <div style="height: 300px"></div>
{{--    <main class="main">--}}
{{--        <div class="main-screen" style="background-image:url();background-size: cover;">--}}
{{--            <div class="main-screen-content" style="background:rgba(0,0,0,.2)">--}}

{{--                <button class="play-video" type="button" style="display:None">--}}
{{--                    <svg width="26" height="26" viewBox="0 0 26 26">--}}
{{--                        <use xlink:href="#play"></use>--}}
{{--                    </svg>--}}

{{--                </button>--}}
{{--            </div>--}}

{{--            <video >--}}
{{--                <source src="{{Vite::asset('media/Bird-See-the-Love-Benjamin-Moore.mp4')}}" type="video/mp4">--}}
{{--            </video>--}}
{{--            <div class="modal modal-video">--}}
{{--                <div class="modal-content">--}}
{{--                    <div class="modal-content-wrap">--}}
{{--                        <div class="modal-header">--}}
{{--                            <button class="close-modal">--}}
{{--                            </button>--}}
{{--                        </div>--}}
{{--                        <iframe width="560" height="315" src="" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen="">--}}

{{--                        </iframe>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="select-color">--}}
{{--            <div class="images-selector">--}}
{{--                <h2>Выберите свой цвет</h2>--}}
{{--                <div class="texts text-1">--}}
{{--                    <p>Нажмите на цвет и вы увидите как меняется комната.<br>--}}
{{--                        Это поможет Вам с выбором краски Benjamin Moore.</p>--}}
{{--                </div>--}}
{{--                <div class="texts text-2">--}}
{{--                    <p>Нажмите на цвет и вы увидите как меняется комната.<br>--}}
{{--                        Это поможет Вам с выбором краски Benjamin Moore.</p>--}}
{{--                </div>--}}
{{--                <div class="texts text-3">--}}
{{--                    <p>Нажмите на цвет и вы увидите как меняется комната.<br>--}}
{{--                        Это поможет Вам с выбором краски Benjamin Moore.</p>--}}
{{--                </div>--}}
{{--                <div class="texts text-4">--}}
{{--                    <p>Нажмите на цвет и вы увидите как меняется комната.<br>--}}
{{--                        Это поможет Вам с выбором краски Benjamin Moore.</p>--}}
{{--                </div>--}}
{{--                <div class="texts text-5">--}}
{{--                    <p>Нажмите на цвет и вы увидите как меняется комната.<br>--}}
{{--                        Это поможет Вам с выбором краски Benjamin Moore.</p>--}}
{{--                </div>--}}

{{--                <div class="images-selector-buttons">--}}
{{--                    <button type="button" class="images-selector-button active" data-image-id="1" data-color="#474747">--}}
{{--                                    <span class="image-wrap">--}}
{{--                                        <img src="images/HC-173.png" loading="lazy" alt="">--}}
{{--                                    </span>--}}
{{--                        <span class="text">--}}
{{--                                                               Edgecomb Gray<br>--}}
{{--                       HC-173<br>--}}
{{--<br>--}}
{{--                                       </span>--}}
{{--                    </button>--}}
{{--                    <button type="button" class="images-selector-button " data-image-id="2" data-color="#474747">--}}
{{--                                    <span class="image-wrap">--}}
{{--                                        <img src="images/2124-70.png" loading="lazy" alt="">--}}
{{--                                    </span>--}}
{{--                        <span class="text">--}}
{{--                                                                Distant Gray<br>--}}
{{--                        2124-70<br>--}}
{{--                                       </span>--}}
{{--                    </button>--}}
{{--                    <button type="button" class="images-selector-button " data-image-id="3" data-color="#474747">--}}
{{--                                    <span class="image-wrap">--}}
{{--                                        <img src="images/AF-355.png" loading="lazy" alt="">--}}
{{--                                    </span>--}}
{{--                        <span class="text">--}}
{{--                                                                Etruscan<br>--}}
{{--                        AF-355                                       </span>--}}
{{--                    </button>--}}
{{--                    <button type="button" class="images-selector-button " data-image-id="4" data-color="#474747">--}}
{{--                                    <span class="image-wrap">--}}
{{--                                        <img src="images/HC-118.png" loading="lazy" alt="">--}}
{{--                                    </span>--}}
{{--                        <span class="text">--}}
{{--                                                                Sherwood Green<br>--}}
{{--                        HC-118                                       </span>--}}
{{--                    </button>--}}
{{--                    <button type="button" class="images-selector-button " data-image-id="5" data-color="#f9f9f9">--}}
{{--                                    <span class="image-wrap">--}}
{{--                                        <img src="images/HC-154.png" loading="lazy" alt="">--}}
{{--                                    </span>--}}
{{--                        <span class="text">--}}
{{--                                                                Hale Navy<br>--}}
{{--                        HC-154                                       </span>--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="images images-list">--}}
{{--                <div class="image image-1">--}}
{{--                    <picture>--}}
{{--                        <source srcset="images/edgecomb_gray_hc173_mobile.webp" media="(max-width: 768px)" type="image/webp">--}}
{{--                        <source srcset="images/edgecomb_gray_hc173_mobile.jpg" media="(max-width: 768px)" type="image/jpeg">--}}
{{--                        <source srcset="images/background-3.webp" type="image/webp">--}}
{{--                        <source srcset="images/background-3-2.jpg" type="image/jpeg">--}}
{{--                        <img loading="lazy" srcset="images/background-3-2.jpg" width="100%" alt="My default image">--}}
{{--                    </picture>--}}
{{--                </div>--}}
{{--                <div class="image image-2">--}}
{{--                    <picture>--}}
{{--                        <source srcset="images/distant_gray_2124_70_mobile.webp" media="(max-width: 768px)" type="image/webp">--}}
{{--                        <source srcset="images/distant_gray_2124_70_mobile.jpg" media="(max-width: 768px)" type="image/jpeg">--}}
{{--                        <source srcset="images/background-2-1.webp" type="image/webp">--}}
{{--                        <source srcset="images/background-2-1.jpg" type="image/jpeg">--}}
{{--                        <img loading="lazy" srcset="images/background-2-1.jpg" width="100%" alt="My default image">--}}
{{--                    </picture>--}}
{{--                </div>--}}
{{--                <div class="image image-3">--}}
{{--                    <picture>--}}
{{--                        <source srcset="images/etruscan_af355_mobile.webp" media="(max-width: 768px)" type="image/webp">--}}
{{--                        <source srcset="images/etruscan_af355_mobile.jpg" media="(max-width: 768px)" type="image/jpeg">--}}
{{--                        <source srcset="images/background-1-1.webp" type="image/webp">--}}
{{--                        <source srcset="images/background-1.jpg" type="image/jpeg">--}}
{{--                        <img loading="lazy" srcset="images/background-1.jpg" width="100%" alt="My default image">--}}
{{--                    </picture>--}}
{{--                </div>--}}
{{--                <div class="image image-4">--}}
{{--                    <picture>--}}
{{--                        <source srcset="images/sherwood_green_hc118_mobile.webp" media="(max-width: 768px)" type="image/webp">--}}
{{--                        <source srcset="images/sherwood_green_hc118_mobile.jpg" media="(max-width: 768px)" type="image/jpeg">--}}
{{--                        <source srcset="images/background-4.webp" type="image/webp">--}}
{{--                        <source srcset="images/background-4.jpg" type="image/jpeg">--}}
{{--                        <img loading="lazy" srcset="images/background-4.jpg" width="100%" alt="My default image">--}}
{{--                    </picture>--}}
{{--                </div>--}}
{{--                <div class="image image-5">--}}
{{--                    <picture>--}}
{{--                        <source srcset="images/hale_navy_hc154_mobile.webp" media="(max-width: 768px)" type="image/webp">--}}
{{--                        <source srcset="images/hale_navy_hc154_mobile.jpg" media="(max-width: 768px)" type="image/jpeg">--}}
{{--                        <source srcset="images/background-5.webp" type="image/webp">--}}
{{--                        <source srcset="images/background-5.jpg" type="image/jpeg">--}}
{{--                        <img loading="lazy" srcset="images/background-5.jpg" width="100%" alt="My default image">--}}
{{--                    </picture>--}}
{{--                </div>--}}

{{--            </div>--}}

{{--        </div>--}}

{{--        <div class="map">--}}
{{--            <div class="map-info">--}}
{{--                <p style="text-align: center;">Республика Беларусь, г. Минск, ул. Восточная, д. 41</p>--}}
{{--                <p style="text-align: center;">понедельник — пятница�&nbsp;10:00 — 19:00 (�&nbsp;суббота-воскресенье выходной )</p>--}}
{{--            </div>--}}
{{--            <div id="mapBox"></div>--}}
{{--            <button type="button" class="request-call">--}}
{{--                <svg width="26" height="26" viewBox="0 0 26 26">--}}
{{--                    <use xlink:href="#call-request"></use>--}}
{{--                </svg>--}}
{{--                Заказать звонок--}}
{{--            </button>--}}
{{--        </div>--}}

{{--    </main>--}}
@endsection
