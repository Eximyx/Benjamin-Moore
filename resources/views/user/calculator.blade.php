@extends('user.layout')
@section('contents')
    <div class="calc">
        <div class="row justify-content-between w-100 py-5 m-0 p-0">
            <h1>@lang('calc.title')</h1>
            <h3>@lang('calc.subTitle')</h3>
            <div class="col-sm-12 col-md-7 col-lg-5 border border-2 rounded-4 border-black-75 row m-0 p-0 my-4">
                <p class="text-center fs-5 my-2">@lang('calc.form.paintingSquare')</p>
                <div class="m-0 p-0 row w-75 mx-auto my-2">
                    <button class="buttonA m-0 select-square rounded-4 py-2 mx-auto btn btn-outline-danger "
                            style="width:40%">@lang('calc.buttons.know')
                    </button>
                    <button class="buttonB m-0 select-square rounded-4 py-2 mx-auto btn btn-outline-danger active "
                            style="width:40%">@lang('calc.buttons.dontKnow')
                    </button>
                </div>
                <div class="squareC my-2">
                    <p class="text-center fs-5">@lang('calc.form.squareParams')</p>
                    <div class="m-0 p-0 row w-75 mx-auto">
                        <div class="w-50 mx-auto">
                            <p class="m-0 text-center">@lang('calc.form.length')</p>
                            <input id="length" type="text"
                                   class="number border-1 border-black rounded-4 text-center mx-auto w-100 py-2"
                                   placeholder="0">
                        </div>
                        <div class="w-50 mx-auto">
                            <p class="m-0 text-center">@lang('calc.form.height')</p>
                            <input id="height" type="text"
                                   class="number border-1 border-black rounded-4 text-center mx-auto w-100 py-2"
                                   placeholder="0">
                        </div>
                    </div>
                </div>
                <div class="squareK my-2 d-none">
                    <p class="text-center fs-5 my-2">@lang('calc.form.indicateTheArea')</p>
                    <div class="m-0 p-0 row">
                        <div class="w-50 mx-auto">
                            <p class="m-0 text-center">@lang('calc.form.square')</p>
                            <input id="squareS" type="text"
                                   class="number border-1 border-black rounded-4 text-center mx-auto w-100 py-2"
                                   placeholder="0">
                        </div>
                    </div>
                </div>
                <p class="text-center fs-5 my-2">@lang('calc.form.doors/windows')</p>
                <p class="text-center fs-6 ">@lang('calc.form.subDoors/windows')</p>
                <div class="w-75 mx-auto row justify-content-between my-2">
                    <div class="w-50 mx-auto">
                        <p class="m-0 text-center">@lang('calc.form.doors')</p>
                        <input id="doors" type="text"
                               class="number border-1 border-black rounded-4 text-center w-100 mx-auto py-2"
                               placeholder="0">
                        <p class="m-0 text-center opacity-75">@lang('calc.form.doorsSize')</p>
                    </div>
                    <div class="w-50 mx-auto">
                        <p class="m-0 text-center">@lang('calc.form.windows')</p>
                        <input id="windows" type="text"
                               class="number border-1 border-black rounded-4 text-center w-100 mx-auto py-2"
                               placeholder="0">
                        <p class="m-0 text-center opacity-75">@lang('calc.form.windowsSize')</p>
                    </div>
                </div>
                <button class="btn fs-5 btn-danger w-auto px-5 mx-auto mt-4">
                    @lang('calc.buttons.calculate')
                </button>
                <div class="align-items-center justify-content-center m-0 my-4">
                    <p class="text-secondary m-0 p-0 fs-7">
                        <i class="fa fa-info-circle text-secondary m-0"></i>
                        @lang('calc.form.warning')
                    </p>
                </div>
            </div>
            <div class="col-md-1 d-md-flex d-none"></div>
            <div class="col-sm-12 col-md-4 align-items-center justify-content-between row m-0 p-0 mx-lg-1 my-sm-3">
                <div class="col-sm-5 col-md-12 border border-2 rounded-4 border-black-75 ">
                    <h4 class="text-center p-4">@lang('calc.results.firstTitle')</h4>
                    <p id="area" class="text-center"><span
                            class="square text-nowrap text-danger fs-3 fw-bold py-4 ">0</span><br> @lang('calc.results.square')
                    </p>
                </div>
                <div class="col-sm-5 col-md-12 border border-2 rounded-4 border-black-75 ">
                    <h4 class="number text-center py-4">@lang('calc.results.secTitle')</h4>
                    <div class="row justify-content-center">
                        <p class="col-6 text-center"><span
                                class="gallon text-nowrap text-danger fs-3 fw-bold">0</span><br>@lang('calc.results.gallons')
                        </p>
                        <p class="col-6 text-center"><span
                                class="quart text-nowrap text-danger fs-3 fw-bold">0</span><br>
                            @lang('calc.results.quart')
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        let isSelect = 0;

        $('.number').on('input', function () {
            var length = 5;
            $(this).val($(this).val().replace(/[A-Za-zА-Яа-яЁё.,]/, ''))
            if (this.id == "squareS") {
                length = 10;
            }
            if (this.value.length > length) {
                this.value = this.value.slice(0, length);
            }
        });
        $('.select-square').on('click', function () {
            $('.select-square').removeClass('active');
            $(this).addClass('active');

        })
        $('.buttonA').on('click', function () {
            isSelect = 1;
            $('.squareK').removeClass('d-none');
            $('.squareC').addClass('d-none');
        })
        $('.buttonB').on('click', function () {
            isSelect = 0;
            $('.squareC').removeClass('d-none');
            $('.squareK').addClass('d-none');
        })

        $('.btn-danger').on('click', function () {
            var length = parseFloat($('#length').val()) || 0;
            var height = parseFloat($('#height').val()) || 0;
            var windows = parseFloat($('#windows').val()) || 0;
            var doors = parseFloat($('#doors').val()) || 0;
            if (!isSelect) {
                var totalArea = length * height - doors * 0.9 * 2 - windows * 1.3 * 1.5 * 2;
            } else {
                var totalArea = parseFloat($('#squareS').val()) || 0;
            }


            var recommendedGallons = Math.floor(totalArea / 20);
            var remainingArea = totalArea % 20;
            var recommendedQuarts = Math.ceil(remainingArea / 5);


            if (recommendedQuarts > 2) {
                recommendedGallons++;
                recommendedQuarts = 0;
            }
            $('.square').text(totalArea < 0 ? 0 : totalArea.toFixed(0));


            $('.gallon').text(recommendedGallons < 0 ? 0 : recommendedGallons.toFixed(0));
            $('.quart').text(recommendedQuarts < 0 ? 0 : recommendedQuarts.toFixed(0));
        })
    </script>
@endsection
