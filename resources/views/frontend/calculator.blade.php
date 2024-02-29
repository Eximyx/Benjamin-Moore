@extends('frontend.layout')
@section('content')
    @include('frontend.breadcrumbs')
    <h2 class="section-title" id="calculator-page__title">@lang('calc.title')</h2>
    <h3 class="section-subtitle">
        @lang('calc.subTitle')
    </h3>
    <section class="calculator-section">
        <div class="calculator-section__survey-block">
            <div class="calculator-section__survey-block__buttons">
                <h4>@lang('Do you know the area to be painted?')</h4>
                <div class="spacing">
                    <button class="survey-button-outlined button-outlined active-survey-button"
                            id="confirm-button">@lang("calc.buttons.know")
                    </button>
                    <button class="survey-button-outlined button-outlined"
                            id="decline-button">@lang("calc.buttons.dontKnow")</button>
                </div>
            </div>
            <div class="calculator-section__survey-block__area">
                <h4>@lang('calc.form.squareParams')</h4>
                <div class="spacing display-none" id="_area-block">
                    <div class="calculator-section__survey-block__inner-block">
                        <label for="width">@lang('calc.form.length')</label>
                        <input class="survey-input" id="width" type="text">
                    </div>
                    <div class="calculator-section__survey-block__inner-block">
                        <label for="height">@lang('calc.form.height')</label>
                        <input class="survey-input" id="height" type="text">
                    </div>
                </div>
                <div class="calculator-section__survey-block__inner-block" id="area-block">
                    <label for="area">@lang('calc.results.square')</label>
                    <input class="survey-input" id="area" type="text">
                </div>
            </div>
            <div class="calculator-section__survey-block__other">
                <h4>@lang('calc.form.doors/windows')</h4>
                <p>@lang('calc.form.subDoors/windows')</p>
                <div class="spacing">
                    <div class="calculator-section__survey-block__inner-block">
                        <label for="doors">@lang('calc.form.doors')</label>
                        <input class="survey-input" id="doors" type="text">
                        <p>@lang('calc.form.doorsSize')</p>
                    </div>
                    <div class="calculator-section__survey-block__inner-block">
                        <label for="windows">@lang('calc.form.windows')</label>
                        <input class="survey-input" id="windows" type="text">
                        <p>@lang('calc.form.windowsSize')</p>
                    </div>
                </div>
            </div>
            <button class="survey-button-filled button-filled"
                    id="survey-submit">@lang('calc.buttons.calculate')</button>
            <div class="calculator-section__survey-block__warning">
                <img src="{{Vite::asset("resources/icons/warning-sign.svg")}}" alt="warning">
                <p>
                    @lang('calc.form.warning')
                </p>
            </div>
        </div>
        <div class="calculator-section__survey-block__rightside">
            <div class="calculator-section__painting-area">
                <h3>@lang('calc.results.firstTitle')</h3>
                <h2 id="painting-area">000</h2>
                <p>@lang('calc.results.square')</p>
            </div>
            <div class="calculator-section__recommended-volume">
                <h3>@lang('calc.results.secTitle')</h3>
                <div class="spacing">
                    <div>
                        <h2 id="gallons">000</h2>
                        <p>@lang('calc.results.gallons')</p>
                    </div>
                    <div>
                        <h2 id="quart">000</h2>
                        <p>@lang('calc.results.quart')</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    @vite('resources/js/calculator.js')
@endsection
