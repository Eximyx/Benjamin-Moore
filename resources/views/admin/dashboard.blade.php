@extends('layouts.admin')
@section('contents')
    <div class="container-fluid">
        <div class="row my-2">
            <div class="col p-0">
                <ul class="nav nav-tabs">
                    <li><a data-toggle="tab" href="#contact-info" id="contact-info-click" class="tab btn">Контакты</a>
                    </li>
                    <li><a data-toggle="tab" href="#about-us" id="about-us-click" class="tab btn">Немного о нас</a></li>
                    <li><a data-toggle="tab" href="#banners" id="banners-click" class="tab btn">Баннеры</a></li>
                </ul>
            </div>
        </div>
        <div class="tab-content text-gray-800 mt-2">
            <div id="contact-info" class="tab-pane fade">
                <form action="javascript:void(0)" id="Form" name="Form" class="form form-horizontal row"
                      method="POST"
                      enctype="multipart/form-data">
                    <div class="row m-0 my-2">
                        <h4 class="col p-0">Контакты</h4>
                        <button type="submit" class="col-auto d-none d-md-block btn btn-primary align-self-end w-auto">
                            Подтвердить
                        </button>
                    </div>
                    <div class="row justify-content-between m-0 p-0">
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
                    <div class="m-0 row justify-content-end mt-2">
                        <button type="submit" class="d-block d-md-none btn btn-primary align-self-end w-auto">
                            Подтвердить
                        </button>
                    </div>
                </form>
            </div>
            <div id="about-us" class="tab-pane fade">
                <form action="javascript:void(0)" id="Form" name="Form" class="form form-horizontal row"
                      method="POST"
                      enctype="multipart/form-data">
                    <div class="row m-0 my-2">
                        <h4 class="col p-0">Немного о нас</h4>
                        <button type="submit" class="col-auto d-none d-md-block btn btn-primary align-self-end w-auto">
                            Подтвердить
                        </button>
                    </div>
                    <div class="col-md-12 col-lg-8 row m-0 p-0">
                        <div class="row m-0">
                            <div class="col-md-6 p-0">
                                <label class="m-0">Доступные</label>
                                <select id="available" class="form-select form-control overflow-auto" size="8"
                                        aria-label="select example">
                                    @foreach($sections as $value)
                                        @if(!$value->position)
                                            <option value="{{$value->id}}">{{$value->title}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <ul class="flex-md-column col-12 col-md-1 nav align-items-center justify-content-md-around justify-content-center p-0 pt-md-4 m-0">
                                <li class="forward-arrow justify-content-center d-none d-md-flex"><a class="btn"><i
                                            class="fa fa-arrow-right"></i></a></li>
                                <li class="back-arrow justify-content-center d-none d-md-flex "><a class="btn"><i
                                            class="fa fa-arrow-left"></i></a></li>
                                <li class="forward-arrow col-auto p-0 d-md-none"><a class="btn"><i
                                            class="fa fa-arrow-down"></i></a>
                                </li>
                                <li class="back-arrow col-auto p-0 d-md-none"><a class="btn"><i
                                            class="fa fa-arrow-up"></i></a>
                                </li>
                                <li class="delete col-auto p-0 d-md-none"><a class="btn"><i class="fa fa-trash"></i></a>
                                </li>
                                <li class="col-auto p-0 d-md-none"><a class="btn"><i class="fa fa-edit"></i></a>
                                </li>
                                <li class="col-auto p-0 d-md-none"><a class="btn"><i class="fa fa-plus"></i></a></li>
                                <li class="delete justify-content-center d-none d-md-flex"><a class="btn"><i
                                            class="fa fa-trash"></i></a></li>
                                <li class="d-none d-md-flex"><a class="btn"><i class="fa fa-edit"></i></a></li>
                                <li class="d-none d-md-flex"><a class="btn"><i class="add-button fa fa-plus"></i></a>
                                </li>
                            </ul>
                            <div class="col-md p-0">
                                <label for="active" class="row justify-content-between m-0">Активные <i
                                        class="col text-right align-self-center" style="font-size:12px">(максимум
                                        3)</i></label>
                                <select id="active" class="form-select form-control overflow-auto"
                                        size="8"
                                        aria-label="select example">
                                    @foreach($activeSections as $value)
                                        <option value="{{$value->id}}">{{$value->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row m-0 d-none">
                            <div class="row m-0 p-0 align-items-center justify-content-between my-2">
                                <label class="col text-left align-self-center p-0" for="">Секция</label>
                                <button type="button" class="my-auto col-auto add-button btn btn-primary">
                                    Подтвердить
                                </button>
                            </div>
                            <textarea type="text" id="section_description" class="form-control"
                                      rows="4" placeholder="Описание"></textarea>
                        </div>
                    </div>
                    <div class="col-lg">
                        <div class="row m-0 p-0">
                            <label class="p-0">Файл 1</label>
                            <div class="row m-0 p-0">
                                <input type="file" class="fileImage form-control col" data="1"/>
                                <button type="button" class="image-view form-control w-auto"><i
                                        class="fa fa-expand"></i>
                                </button>
                            </div>
                        </div>
                        <div class="row m-0 p-0">
                            <label class="p-0">Файл 1</label>
                            <div class="row m-0 p-0">
                                <input type="file" class="fileImage form-control col" data="2"/>
                                <button type="button" class="image-view form-control w-auto"><i
                                        class="fa fa-expand"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="m-0 row justify-content-end mt-2">
                        <button type="submit" class="d-block d-md-none btn btn-primary align-self-end w-auto">
                            Подтвердить
                        </button>
                    </div>
                </form>
            </div>
            <div id="banners" class="tab-pane fade">
                <form action="javascript:void(0)" id="Form" name="Form" class="form form-horizontal row"
                      method="POST"
                      enctype="multipart/form-data">
                    <div class="row m-0 my-2">
                        <h4 class="col p-0">Баннеры</h4>
                        <button type="submit" class="col-auto d-none d-md-block btn btn-primary align-self-end w-auto">
                            Подтвердить
                        </button>
                    </div>
                    <div class="col-md-12 col-lg-8 row m-0 p-0">
                        <div class="row m-0">
                            <div class="col-md-6 p-0">
                                <label class="m-0">Доступные</label>
                                <select id="available" class="form-select form-control overflow-auto" size="8">
                                    @foreach($banners as $value)
                                        @if(!$value->position)
                                            <option value="{{$value->id}}">{{$value->title}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <ul class="flex-md-column col-12 col-md-1 nav align-items-center justify-content-md-around justify-content-center p-0 pt-md-4 m-0">
                                <li class="forward-arrow justify-content-center d-none d-md-flex"><a class="btn"><i
                                            class="fa fa-arrow-right"></i></a></li>
                                <li class="back-arrow justify-content-center d-none d-md-flex "><a class="btn"><i
                                            class="fa fa-arrow-left"></i></a></li>
                                <li class="forward-arrow col-auto p-0 d-md-none"><a class="btn"><i
                                            class="fa fa-arrow-down"></i></a>
                                </li>
                                <li class="back-arrow col-auto p-0 d-md-none"><a class="btn"><i
                                            class="fa fa-arrow-up"></i></a>
                                </li>
                                <li class="delete col-auto p-0 d-md-none"><a class="btn"><i class="fa fa-trash"></i></a>
                                </li>
                                <li class="col-auto p-0 d-md-none"><a class="btn"><i class="fa fa-edit"></i></a>
                                </li>
                                <li class="col-auto p-0 d-md-none"><a class="btn"><i class="fa fa-plus"></i></a></li>
                                <li class="delete justify-content-center d-none d-md-flex"><a class="btn"><i
                                            class="fa fa-trash"></i></a></li>
                                <li class="d-none d-md-flex"><a class="btn"><i class="fa fa-edit"></i></a></li>
                                <li class="d-none d-md-flex"><a class="btn"><i class="fa fa-plus"></i></a></li>
                            </ul>
                            <div class="col-md p-0">
                                <label class="row justify-content-between m-0" for="active">Активные <i
                                        class="col text-right align-self-center" style="font-size:12px">(максимум
                                        3)</i></label>
                                <select id="active" name="active" class="form-select form-control overflow-auto"
                                        size="8">
                                    @foreach($activeBanners as $value)
                                        <option value="{{$value->id}}">{{$value->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row m-0 d-none">
                            <div class="row m-0 p-0 align-items-center justify-content-between my-2">
                                <label class="col text-left align-self-center p-0" for="">Секция</label>
                                <button type="button" class="my-auto col-auto add-button btn btn-primary">
                                    Подтвердить
                                </button>
                            </div>
                            <textarea type="text" id="section_description" class="form-control"
                                      rows="4" placeholder="Описание"></textarea>
                        </div>
                    </div>
                    <div class="m-0 row justify-content-end mt-2">
                        <button type="submit" class="d-block d-md-none btn btn-primary align-self-end w-auto">
                            Подтвердить
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <button type="button" class="btn-close position-absolute align-self-end"
                        data-bs-dismiss="modal"
                ></button>
                <img id="output" class="container-fluid p-0" style="background-size: contain"
                     src="" alt="">
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            let available_select = $('#available');
            let active_select = $('#active');
            let items = '#contact-info';

            const output = $('#output');


            $('#about-us-click').click();

            $('.tab').on('click', (e) => {
                items = $(e.target).attr('href');
                let tab = $(`${items}`);

                available_select = tab.find('#available');
                active_select = tab.find('#active');
            });

            $('.forward-arrow').on('click', (e) => {
                if (active_select.find('option').length < 3) {
                    active_select.prepend(available_select.find('option:selected'));
                }
            })

            $('.back-arrow').on('click', (e) => {
                available_select.prepend(active_select.find('option:selected'));
            })

            $('.add-button').on('click', (e) => {

            })


            $('.image-view').on('click', (e) => {
                let input = $(e.target).closest('div').find('input');
                console.log(input);
                let file = input[0].files[0];
                let value = input.attr('data');
                let reader = new FileReader();

                reader.addEventListener('load', (e) => {
                    output.attr('src', reader.result);
                })

                if (file) {
                    reader.readAsDataURL(file);
                } else {
                    output.attr('src', "{{url('storage/image/sections/')}}" + "/section_image_" + value + '.jpg')
                }

                $('#imageModal').modal('show');

            })

            $('.delete').on('click', (e) => {
                var selected = available_select.val();
                console.log(selected == null);
                console.log("{{route('settings')}}/" + items + '/' + selected)
                if (selected != null) {
                    $.ajax({
                        type: "POST",
                        url: `{{route('settings')}}/delete`,
                        dataType: 'json',
                        data: {
                            'tab_id': items.replace('#', ''),
                            'id': selected
                        },
                        success: function (res) {
                            available_select.find(`option[value=${selected}]`).remove();
                            console.log(res);
                        },
                        error: function (res) {
                            console.log("error:", res)
                        }
                    });
                }
            })

            $('.form').submit((e) => {
                e.preventDefault();

                let formData = new FormData(e.target);

                let urls = "{{route('settings.contacts')}}";

                if (items !== '#contact-info') {
                    formData.append(`files[]`, {});
                    formData.append('tab_id', items.replace('#', ''));
                    $(e.target).find('.fileImage').each((key, value) => {
                            let file = value.files[0];
                            if (file) {
                                formData.append(`files[]`, value.files[0], value.getAttribute('data'));
                                console.log(value.getAttribute('data'));
                            }
                        }
                    );
                    let selected_options = [];

                    active_select.find('option').each((key, value) => {
                        selected_options.push(value.value);
                    })

                    selected_options.forEach((value) => {
                        formData.append('active_items[]', value)
                    })
                    urls = "{{route('settings.toggle')}}"
                }


                $.ajax({
                    url: urls,
                    type: 'POST',
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
        })
        ;
    </script>
@endsection

