@extends('layouts.admin')


@section('title', 'Настройки')

@section('contents')
    <form action="javascript:void(0)" id="Form" name="Form" class="form-horizontal" method="POST"
          enctype="multipart/form-data">
        <input type="hidden" name="id" id="id">
        <div class="col m-0 p-0" id="contact-info">
            <div class="row">
                <h5 class="text-gray-800">Контактная информация</h5>
                <div class="col-12 col-sm">
                    <label for="email">Email</label>
                    <input type="email" name="email" value="" id="email" class="form-control"
                           placeholder="email"
                    >
                </div>
                <div class="col-12 col-sm">
                    <label for="">Номер телефона</label>
                    <input type="text" name="phone" id="phone" class="form-control" placeholder="phone-number">
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm">
                    <label for="location">Местоположение</label>
                    <input type="text" name="location" id="location" class="form-control" placeholder="">
                </div>
                <div class="col-12 col-sm">
                    <label for="instagram">Instagram</label>
                    <input type="text" name="instagram" id="instagram" class="form-control" placeholder="">
                </div>
            </div>
        </div>
        <div class="row" id="about-us">
            <h5 class="text-gray-800">Немного о нас</h5>
            <div class="row m-0 p-0">
                <div class="col-12 col-sm">
                    <label for="">Секция 1</label>
                    <input type="text" name="" id="" class="form-control" placeholder="">
                    <textarea type="text" name="" class="form-control mt-1" id="" rows="3"></textarea>
                </div>
                <div class="col-12 col-sm">
                    <label for="">Секция 2</label>
                    <input type="text" name="" id="" class="form-control" placeholder="">
                    <textarea type="text" name="" class="form-control mt-1" id="" rows="3"></textarea>
                </div>
                <div class="col-12 col-sm">
                    <label for="">Секция 3</label>
                    <input type="text" name="section-3" id="" class="form-control" placeholder="">
                    <textarea type="text" name="section-3" class="form-control mt-1" id="section-3" rows="3"></textarea>
                </div>
            </div>
            <div class="row m-0 p-0">
                <div class="col-12 col-sm">
                    <label for="">Файл 1</label>
                    <input type="file" name="fileImage" class="form-control">

                </div>
                <div class="col-12 col-sm">
                    <label for="">Файл 2</label>
                    <input type="file" name="fileImage" class="form-control">

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-sm mt-0 mt-sm-2">
                <label for="">Баннер-1</label>
                <input type="text" name="" id="" class="form-control" placeholder="">

                <textarea type="text" name="" class="form-control mt-1" id="" rows="3"></textarea>
                <input type="file" name="fileImage" class="form-control">


            </div>
            <div class="col-12 col-sm mt-1 mt-sm-2">
                <label for="">Баннер-2</label>
                <input type="text" name="" id="" class="form-control" placeholder="">
                <textarea type="text" name="" class="form-control mt-1" id="" rows="3"></textarea>
                <input type="file" name="fileImage" class="form-control">

            </div>
        </div>

        <div class="mt-2">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Просмотреть</button>
            <button type="submit" class="btn btn-primary">Подтвердить</button>
        </div>
    </form>
    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#Form').submit(function (e) {
                e.preventDefault();
                let allfiles = $(this).find('input[name="fileImage"]');


                var formData = new FormData(this);
                for (let i = 0; i < allfiles.length; i++) {
                    if (allfiles[i].files[0]) {
                        formData.append('file_' + i, allfiles[i].files[0]);
                    }
                }

                $.ajax({
                    type: 'POST',
                    url: "{{route('settings.up')}}",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: (data) => {
                        console.log(data);
                    },
                    error: function (data) {
                        console.log(data);
                    },
                });
            })
        });
    </script>
@endsection

