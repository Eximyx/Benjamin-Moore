@extends('layouts.admin')


@section('title', 'Настройки')

@section('contents')
    <form action="javascript:void(0)" id="Form" name="Form" class="form form-horizontal" method="POST"
          enctype="multipart/form-data">
        <div class="col-12 m-0 p-0" id="contact-info">
            <div class="row">
                <h5 class="text-gray-800">Контактная информация</h5>
                <div class="col-12 col-sm">
                    <label for="email">Email</label>
                    <input type="email" name="email" value="" id="email" class="form-control"
                           placeholder="email"
                    >
                </div>
                <div class="col-12 col-sm">
                    <label for="phone">Номер телефона</label>
                    <input type="text" name="phone" id="phone" class="form-control" placeholder="phone-number">
                </div>
                <div class="col-12 col-sm">
                    <label for="work_time">Время работы</label>
                    <input type="text" name="work_time" id="work_time" class="form-control" placeholder="work time">
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm">
                    <label for="location">Местоположение</label>
                    <input type="text" name="location" id="location" class="form-control" placeholder="location">
                </div>
                <div class="col-12 col-sm">
                    <label for="instagram">Instagram</label>
                    <input type="text" name="instagram" id="instagram" class="form-control" placeholder="">
                </div>
            </div>
        </div>
        <div class="my-2 d-flex justify-content-end align-items-end">
            <button type="submit" class="btn btn-primary ml-2">Подтвердить</button>
        </div>
    </form>
    <form action="javascript:void(0)" id="Form" name="Form" class="form form-horizontal" method="POST"
          enctype="multipart/form-data">
        <div class="row" id="about-us">
            <h5 class="text-gray-800">Немного о нас</h5>
            <div class="row m-0 p-0">
                <div class="row m-0 p-0">
                    <div class="col-md">
                        <label for="">Доступные</label>
                        <select class="form-select overflow-hidden" size="6" aria-label="size 6 select example">
                            <option selected>Open this select menu</option>
                            <option draggable="true" value="1">One</option>
                            <option value="2">Two</option>
                            <option value="2">Two</option>
                            <option value="2">Two</option>
                            <option value="2">Two</option>
                            <option value="2">Two</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                    <div class="col-md">
                        <label for="">Активные</label>
                        <select class="form-select overflow-hidden" size="6" aria-label="size 3 select example">
                        </select>
                    </div>

                </div>
                <div class="col-12">
                    <label for="">Секция</label>
                    <input type="text" id="section_title" class="form-control" placeholder="">
                    <textarea type="text" id="section_description" class="form-control" rows="4"></textarea>
                </div>
            </div>

            <div class="col-12 col-md">


                <div class="row m-0 p-0">
                    <div class="col">
                        <div class="col-12 col-sm-12 col-lg">
                            <label for="">Файл 1</label>
                            <div class="row m-0 p-0">
                                <label class="form-control col" style="cursor: pointer">Выберите файл №1
                                    <input type="file" name="fileImage" class="image form-control"
                                           style="visibility: hidden">
                                </label>
                                <button type="button" class="w-auto text-wrap form-control">
                                    Показать
                                </button>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-lg">
                            <label for="">Файл 1</label>
                            <div class="row m-0 p-0">
                                <label class="form-control col" style="cursor: pointer">Выберите файл №1
                                    <input type="file" name="fileImage" class="image form-control"
                                           style="visibility: hidden">
                                </label>
                                <button type="button" class="w-auto text-wrap form-control">
                                    Показать
                                </button>
                            </div>
                        </div>
                    </div>


                </div>

                <div class="my-2 d-flex justify-content-end align-items-end">
                    <button type="button" class="mx-2 btn btn-outline-danger">Удалить
                    </button>
                    <button type="submit" class="btn btn-primary">Добавить</button>
                </div>
            </div>
        </div>

        <div class="my-2 d-flex justify-content-end align-items-end">
            <button type="submit" class="btn btn-primary ml-2">Подтвердить</button>
        </div>
    </form>
    <form action="javascript:void(0)" id="Form" name="Form" class="form form-horizontal" method="POST"
          enctype="multipart/form-data">
        <div class="row m-0 p-0">
            <div class="col-12 col-sm mt-0 mt-sm-2">
                <label for="">Баннер-1</label>
                <input type="text" name="" id="" class="form-control" placeholder="">
                <textarea type="text" name="" class="form-control mt-1" id="" rows="3"></textarea>
                <div class="row m-0 p-0">
                    <input type="file" name="fileImage" class="col image form-control">
                    <button type="button" class="col-3 col-lg-4 text-wrap form-control">
                        Показать
                    </button>
                </div>
            </div>
            <div class="col-12 col-sm mt-1 mt-sm-2">
                <label for="">Баннер-2</label>
                <input type="text" name="" id="" class="form-control" placeholder="">
                <textarea type="text" name="" class="form-control mt-1" id="" rows="3"></textarea>
                <div class="row m-0 p-0">
                    <input type="file" name="fileImage" class="col image form-control">
                    <button type="button" class="col-3 col-lg-4 btn text-wrap form-control">
                        Показать
                    </button>
                </div>
            </div>
        </div>
        <div class="mt-my-2 d-flex justify-content-end align-items-end">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Показать</button>
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
            $('.image').on('change', (e) => {
                var output = $(e.target).parent().find('#output');
                output.html('asd');
                output.attr("src", URL.createObjectURL(e.target.files[0]));
                output.on('load', () => {
                    URL.revokeObjectURL(output.src)
                });

            })
            $('.form').submit(function (e) {
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

