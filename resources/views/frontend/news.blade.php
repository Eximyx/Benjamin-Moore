@extends('frontend.layout')
@section('content')
    @include('frontend.breadcrumbs')
    <section class="news-section">
        <h2 class="section-title">@lang('news.title')</h2>
        <div class="news-section__wrapper">
            <div class="news-card-link news-card">
                <img src="{{Vite::asset('resources/images/news-mock-image.png')}}" alt="news preview">
                <div class="news-card__details">
                    <p class="news-card__details-author">Udemy •</p>
                    <img class="news-card__details-clock-image" src="{{Vite::asset('resources/icons/clock.svg')}}"
                         alt="clock image">
                    <p class="news-card__details-date">27 января 2021</p>
                </div>
                <h4 class="news-card__header">
                    Какие IT - професси будут востребованы в 2022 году
                </h4>
                <p class="news-card__description">
                    Предварительные выводы неутешительны: существующая теория требует анализа новых предложений.
                </p>
                <a href="news-details.html">
                    <button class="button-outlined">Подробнее</button>
                </a>
            </div>
            <div class="news-card-link news-card">
                <img src="../assets/images/news-mock-image.png" alt="news preview">
                <div class="news-card__details">
                    <p class="news-card__details-author">Udemy •</p>
                    <img class="news-card__details-clock-image" src="../assets/icons/clock.svg" alt="clock image">
                    <p class="news-card__details-date">27 января 2021</p>
                </div>
                <h4 class="news-card__header">
                    Какие IT - професси будут востребованы в 2022 году
                </h4>
                <p class="news-card__description">
                    Предварительные выводы неутешительны: существующая теория требует анализа новых предложений.
                </p>
                <a href="news-details.html">
                    <button class="button-outlined">Подробнее</button>
                </a>
            </div>
            <div class="news-card">
                <img src="../assets/images/news-mock-image.png" alt="news preview">
                <div class="news-card__details">
                    <p class="news-card__details-author">Udemy •</p>
                    <img class="news-card__details-clock-image" src="../assets/icons/clock.svg" alt="clock image">
                    <p class="news-card__details-date">27 января 2021</p>
                </div>
                <h4 class="news-card__header">
                    Какие IT - професси будут востребованы в 2022 году
                </h4>
                <p class="news-card__description">
                    Предварительные выводы неутешительны: существующая теория требует анализа новых предложений.
                </p>
                <a href="news-details.html">
                    <button class="button-outlined">Подробнее</button>
                </a>
            </div>
            <div class="news-card">
                <img src="../assets/images/news-mock-image.png" alt="news preview">
                <div class="news-card__details">
                    <p class="news-card__details-author">Udemy •</p>
                    <img class="news-card__details-clock-image" src="../assets/icons/clock.svg" alt="clock image">
                    <p class="news-card__details-date">27 января 2021</p>
                </div>
                <h4 class="news-card__header">
                    Какие IT - професси будут востребованы в 2022 году
                </h4>
                <p class="news-card__description">
                    Предварительные выводы неутешительны: существующая теория требует анализа новых предложений.
                </p>
                <a href="news-details.html">
                    <button class="button-outlined">Подробнее</button>
                </a>
            </div>
            <div class="news-card">
                <img src="../assets/images/news-mock-image.png" alt="news preview">
                <div class="news-card__details">
                    <p class="news-card__details-author">Udemy •</p>
                    <img class="news-card__details-clock-image" src="../assets/icons/clock.svg" alt="clock image">
                    <p class="news-card__details-date">27 января 2021</p>
                </div>
                <h4 class="news-card__header">
                    Какие IT - професси будут востребованы в 2022 году
                </h4>
                <p class="news-card__description">
                    Предварительные выводы неутешительны: существующая теория требует анализа новых предложений.
                </p>
                <a href="news-details.html">
                    <button class="button-outlined">Подробнее</button>
                </a>
            </div>
            <div class="news-card">
                <img src="../assets/images/news-mock-image.png" alt="news preview">
                <div class="news-card__details">
                    <p class="news-card__details-author">Udemy •</p>
                    <img class="news-card__details-clock-image" src="../assets/icons/clock.svg" alt="clock image">
                    <p class="news-card__details-date">27 января 2021</p>
                </div>
                <h4 class="news-card__header">
                    Какие IT - професси будут востребованы в 2022 году
                </h4>
                <p class="news-card__description">
                    Предварительные выводы неутешительны: существующая теория требует анализа новых предложений.
                </p>
                <a href="news-details.html">
                    <button class="button-outlined">Подробнее</button>
                </a>
            </div>
            <div class="news-card">
                <img src="../assets/images/news-mock-image.png" alt="news preview">
                <div class="news-card__details">
                    <p class="news-card__details-author">Udemy •</p>
                    <img class="news-card__details-clock-image" src="../assets/icons/clock.svg" alt="clock image">
                    <p class="news-card__details-date">27 января 2021</p>
                </div>
                <h4 class="news-card__header">
                    Какие IT - професси будут востребованы в 2022 году
                </h4>
                <p class="news-card__description">
                    Предварительные выводы неутешительны: существующая теория требует анализа новых предложений.
                </p>
                <a href="news-details.html">
                    <button class="button-outlined">Подробнее</button>
                </a>
            </div>
            <div class="news-card">
                <img src="../assets/images/news-mock-image.png" alt="news preview">
                <div class="news-card__details">
                    <p class="news-card__details-author">Udemy •</p>
                    <img class="news-card__details-clock-image" src="../assets/icons/clock.svg" alt="clock image">
                    <p class="news-card__details-date">27 января 2021</p>
                </div>
                <h4 class="news-card__header">
                    Какие IT - професси будут востребованы в 2022 году
                </h4>
                <p class="news-card__description">
                    Предварительные выводы неутешительны: существующая теория требует анализа новых предложений.
                </p>
                <a href="news-details.html">
                    <button class="button-outlined">Подробнее</button>
                </a>
            </div>
            <div class="news-card">
                <img src="../assets/images/news-mock-image.png" alt="news preview">
                <div class="news-card__details">
                    <p class="news-card__details-author">Udemy •</p>
                    <img class="news-card__details-clock-image" src="../assets/icons/clock.svg" alt="clock image">
                    <p class="news-card__details-date">27 января 2021</p>
                </div>
                <h4 class="news-card__header">
                    Какие IT - професси будут востребованы в 2022 году
                </h4>
                <p class="news-card__description">
                    Предварительные выводы неутешительны: существующая теория требует анализа новых предложений.
                </p>
                <a href="news-details.html">
                    <button class="button-outlined">Подробнее</button>
                </a>
            </div>
        </div>
        <div class="pagination">
            <ul class="pagination-ul">
                <li class="pagination-item disabled">
                    <a href="#">
                        <svg width="6" height="12" viewBox="0 0 6 12" fill="none" xmlns="http://www.w3.org/2000/svg">
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
                        <svg width="6" height="12" viewBox="0 0 6 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 11L5 6L1 1" stroke="white" stroke-width="1.5" stroke-linecap="round"/>
                        </svg>
                    </a>
                </li>
            </ul>
        </div>
    </section>
@endsection
