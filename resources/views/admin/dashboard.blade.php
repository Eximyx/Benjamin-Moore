@extends('layouts.admin')
@section('contents')
    <div class="container-fluid">
        <div class="row my-2">
            <div class="col m-0 p-0">
                <ul class="nav nav-tabs">
                    <li><a data-toggle="tab" href="#contact-info" class="btn">Контакты</a></li>
                    <li><a data-toggle="tab" href="#about-us" class="btn">Немного о нас</a></li>
                    <li><a data-toggle="tab" href="#banners" class="btn">Баннеры</a></li>
                </ul>
            </div>
            <div class="col-auto m-0 p-0 d-none d-md-block">
                <button type="submit" class="btn btn-primary">Подтвердить</button>
            </div>
        </div>
        <div class="tab-content text-gray-800 mt-2 p-0">
            <div id="contact-info" class="tab-pane fade">
                <form action="javascript:void(0)" id="Form" name="Form" class="form form-horizontal" method="POST"
                      enctype="multipart/form-data">
                    <div class="row justify-content-between">
                        <div class="col-md-6">
                            <label for="email">Email</label>
                            <input type="email" name="email" value="" id="email" class="form-control"
                                   placeholder="email">
                        </div>
                        <div class="col-md-6">
                            <label for="phone">Номер телефона</label>
                            <input type="text" name="phone" id="phone" class="form-control"
                                   placeholder="phone-number">
                        </div>
                        <div class="col-md-6">
                            <label for="work_time">Время работы</label>
                            <input type="text" name="work_time" id="work_time" class="form-control"
                                   placeholder="work time">
                        </div>
                        <div class="col-md-6">
                            <label for="location">Местоположение</label>
                            <input type="text" name="location" id="location" class="form-control"
                                   placeholder="location">
                        </div>
                        <div class="col-md-6">
                            <label for="instagram">Instagram</label>
                            <input type="text" name="instagram" id="instagram" class="form-control"
                                   placeholder="instagram">
                        </div>
                    </div>
                </form>
            </div>
            <div id="about-us" class="tab-pane fade">
                <form action="javascript:void(0)" id="Form" name="Form" class="form form-horizontal row"
                      method="POST"
                      enctype="multipart/form-data">
                    <div class="col-md-8">
                        <div class="row justify-content-between">
                            <div class="col-md-6">
                                <label for="">Доступные</label>
                                <select class="form-select overflow-auto " size="6"
                                        aria-label="size 6 select example">
                                    <option selected>Open this select menu</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="2">Two</option>
                                    <option value="2">Two</option>
                                    <option value="2">Two</option>
                                    <option value="2">Two</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                            <ul class="row col-12 col-md nav m-0">
                                <li class="d-none  d-md-flex "><a class="d-none  d-md-flex btn"><i
                                            class="fa fa-arrow-right"></i></a>
                                </li>
                                <li class="d-none d-md-flex "><a class="btn"><i class="fa fa-arrow-left"></i></a></li>
                                <li class="d-none d-md-flex "><a class="d-flex d-md-none btn"><i
                                            class="fa fa-arrow-down"></i></a></li>
                                <li class="d-none d-md-flex "><a class="d-flex d-md-none btn"><i
                                            class="fa fa-arrow-up"></i></a></li>
                                <li><a class="btn"><i class="fa fa-trash"></i></a></li>
                            </ul>

                            <div class="col-md">
                                <label for="">Активные</label>
                                <select class="form-select overflow-auto" size="6"
                                        aria-label="select example">
                                </select>
                            </div>
                        </div>
                        <div class="row m-0 justify-content-end">
                            <label for="">Секция</label>
                            <input type="text" id="section_title" class="form-control" placeholder="">
                            <textarea type="text" id="section_description" class="form-control"
                                      rows="4" placeholder="Описание"></textarea>
                            <button type="button" class=" mt-2 w-auto btn btn-primary">
                                Добавить
                            </button>
                        </div>
                    </div>
                    <div class="col-lg">
                        <label for="">Файл 1</label>
                        <div class="row  m-0 p-0">
                            <label class="form-control col" style="cursor: pointer">Обзор
                                <input type="file" name="fileImage" class="image form-control"
                                       style="visibility: hidden">
                            </label>
                            <button class="form-control col-auto w-auto text-wrap ">
                                <i class="fa fa-expand"></i>
                            </button>
                        </div>
                        <label for="">Файл 2</label>
                        <div class="row col m-0 p-0">
                            <label class="form-control col" style="cursor: pointer">Обзор
                                <input type="file" name="fileImage" class="image form-control"
                                       style="visibility: hidden">
                            </label>
                            <button class="form-control col-auto w-auto text-wrap ">
                                <i class="fa fa-expand"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div id="banners" class="tab-pane fade">
                <form action="javascript:void(0)" id="Form" name="Form" class="form form-horizontal row"
                      method="POST"
                      enctype="multipart/form-data">
                    <div class="col-lg-8">
                        <div class="row justify-content-between">
                            <div class="col-md-5">
                                <label for="">Доступные</label>
                                <select class="form-select overflow-auto " size="6"
                                        aria-label="size 6 select example">
                                    <option selected>Open this select menu</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="2">Two</option>
                                    <option value="2">Two</option>
                                    <option value="2">Two</option>
                                    <option value="2">Two</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                            <div
                                class="col-md-1 row m-0 p-0 align-items-center justify-content-center align-self-center">
                                <a class="w-auto d-none d-md-block btn"><i class="fa fa-arrow-right"></i></a>
                                <a class="w-auto d-none d-md-block btn"><i class="fa fa-arrow-left"></i></a>
                                <a class="w-auto d-block d-md-none btn"><i class="fa fa-arrow-down"></i></a>
                                <a class="w-auto d-block d-md-none btn"><i class="fa fa-arrow-up"></i></a>
                                <a class="w-auto btn"><i class="fa fa-trash"></i></a>
                            </div>
                            <div class="col-md-6">
                                <label for="">Активные</label>
                                <select class="form-select overflow-auto" size="6"
                                        aria-label="select example">
                                </select>
                            </div>
                        </div>
                        <div class="row m-0 justify-content-end">
                            <div class="row m-0 p-0">
                                <label for="">Секция</label>
                                <input type="text" id="section_title" class="form-control" placeholder="">
                                <textarea type="text" id="section_description" class="form-control"
                                          rows="4" placeholder="Описание"></textarea>
                            </div>
                            <div class="row justify-content-between m-0 p-0 mt-2">
                                <div class="row col m-0 p-0">
                                    <label class="form-control col" style="cursor: pointer">Обзор
                                        <input type="file" name="fileImage" class="image form-control"
                                               style="visibility: hidden">
                                    </label>
                                    <button class="form-control col-auto w-auto text-wrap ">
                                        <i class="fa fa-expand"></i>
                                    </button>
                                </div>
                                <div class="col-auto justify-content-between m-0 ml-1 p-0">
                                    <button type="button" class="w-auto btn btn-primary align-self-end">
                                        Добавить
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
        <div class="row m-0 p-0 justify-content-end mt-2">
            <button type="submit" class="d-block d-md-none btn btn-primary align-self-end w-auto">Подтвердить</button>
        </div>
    </div>
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

