@extends('user.layout')
@section('contents')
    {{-- //TODO back вы знаете площадь окрашивания --}}
    <div class="" style="padding-bottom:7vh">

        <div class="row justify-content-between h-100 pb-1">
            <div class="pb-5">
                <h2 class="col-sm-12">Калькулятор расхода краски</h2>
                <h4 class="col-sm-12">Не переплачивайте за краску, расчитайте её точно</h4>
            </div>

            <div class="col-sm-12 col-md-8 col-lg-4 border border-2 rounded-4 border-black-75 row m-0 p-0">
                {{-- <p class="text-center fs-5 my-2">Вы знаете площадь окрашивания?</p>
            <div class="col-sm-12 mx-auto row justify-content-between ">
                <button class="col-4 mx-auto btn btn-outline-danger">Да, знаю</button>
                <button class="col-4 mx-auto btn btn-outline-secondary ">Нет, не знаю</button>
            </div> --}}
                <p class="text-center fs-5 my-2">Введите параметры площади</p>
                <div class="col-sm-12 mx-auto row justify-content-between ">
                    <div class="col-4 py-2 mx-4">
                        <p class="m-0 text-center">Длина (м)*</p>
                        <input id="length" type="text"
                            class="text border-1 border-black rounded-4 text-center w-100 py-3" placeholder="0">
                    </div>
                    <div class="col-4 py-2 mx-4">
                        <p class="m-0 text-center">Высота (м)*</p>
                        <input id="height" type="text" pattern="[0-9]{3}"
                            class="text border-1 border-black rounded-4 text-center w-100 py-3" placeholder="0">
                    </div>
                </div>
                <p class="text-center fs-5 my-2">Укажите количество (двери/окна)</p>
                <p class="text-center fs-6">Для расчёта используются размеры</p>
                <div class="col-sm-12 mx-auto row justify-content-between ">
                    <div class="col-4 py-2 mx-4">
                        <p class="m-0 text-center">Двери (шт)*</p>
                        <input id="doors" type="text"
                            class="text border-1 border-black rounded-4 text-center w-100 py-3" placeholder="0">
                        <p class="m-0 text-center opacity-75">900*2000 мм</p>
                    </div>
                    <div class="col-4 py-2 mx-4">
                        <p class="m-0 text-center">Окна (шт)*</p>
                        <input id="windows" type="text"
                            class="text border-1 border-black rounded-4 text-center w-100 py-3" placeholder="0">
                        <p class="m-0 text-center opacity-75">1300*1500 мм</p>
                    </div>
                </div>
                <button class="btn fs-5 btn-danger w-auto px-5 mx-auto mt-4">
                    Рассчитать
                </button>
                <div class="col-12 row align-items-center justify-content-center m-0 my-4">
                    <i class="col-1 fa fa-info-circle text-secondary m-0"></i>
                    <p class="col-10 text-secondary m-0 p-0" style="font-size:13px; line-height:12px">Расход указан с учетом
                        нанесения покрытий малярным инструментом (валик, кисть) на подготовленные под покраску поверхности!
                    </p>
                </div>

            </div>
            <div class="col col-md-4 col-lg-8 align-items-center justify-content-between row ">
                <div class="col-sm-12 border border-2 rounded-4 border-black-75 w-auto mx-auto py-4">
                    <h4 class="text-center p-4">Окрашиваемая площадь</h4>
                    <p id="area" class="text-center"><span
                            class="square text-nowrap text-danger fs-3 fw-bold py-4 ">0</span><br> квадратных
                        метров</p>
                </div>
                <div class="col-sm-12 border border-2 rounded-4 border-black-75 w-auto my-2 py-2 mx-auto ">
                    <h4 class="text text-center py-4">Рекомендуемый объём краски</h4>
                    <div class="row justify-content-center">
                        <p class="col-6 text-center"><span class="gallon text-nowrap text-danger fs-3 fw-bold">0</span><br>
                            галлонов</p>
                        <p class="col-6 text-center"><span class="quart text-nowrap text-danger fs-3 fw-bold">0</span><br>
                            кварт
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $('.text').on('input', function() {
            $(this).val($(this).val().replace(/[A-Za-zА-Яа-яЁё.,]/, ''))
        });
        $('.btn-danger').on('click', function() {
            var length = parseFloat($('#length').val()) || 0;
            var height = parseFloat($('#height').val()) || 0;
            var windows = parseFloat($('#windows').val()) || 0;
            var doors = parseFloat($('#doors').val()) || 0;
            var totalArea = length * height - doors * 0.9 * 2 - windows * 1.3 * 1.5 * 2;


            var recommendedGallons = Math.floor(totalArea / 20);
            var remainingArea = totalArea % 20;
            var recommendedQuarts = Math.ceil(remainingArea / 5);


            if (recommendedQuarts > 2) {
                recommendedGallons++;
                recommendedQuarts = 0;
            }
            $('.square').text(totalArea < 0 ? 0 : totalArea.toFixed(2));


            $('.gallon').text(recommendedGallons);
            $('.quart').text(recommendedQuarts);

        })
    </script>
@endsection
