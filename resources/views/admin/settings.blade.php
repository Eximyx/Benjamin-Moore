@extends('layouts.admin')
@section('contents')
    <div class="container-fluid">
        <div class="row my-2">
            <div class="col p-0">
                <ul class="nav nav-tabs">
                    <li><a data-toggle="tab" href="#contact-info" id="contact-info-click"
                           class="tab btn">@lang('admin.titles.contacts')</a>
                    </li>
                    <li><a data-toggle="tab" href="#about-us" id="about-us-click"
                           class="tab btn">@lang('admin.titles.aboutUs')</a></li>
                </ul>
            </div>
        </div>
        <div class="tab-content text-gray-800 mt-2">
            <div id="contact-info" class="tab-pane fade">
                <form action="javascript:void(0)" id="Form" name="Form" class="form form-horizontal row"
                      method="POST"
                      enctype="multipart/form-data">
                    <div class="row m-0 my-2">
                        <h4 class="col p-0">@lang('admin.titles.contacts')</h4>
                        <button type="submit" class="col-auto d-none d-md-block btn btn-primary align-self-end w-auto">
                            @lang('admin.buttons.submit')
                        </button>
                    </div>
                    <div class="row justify-content-between m-0 p-0">
                        <div class="col-md-6">
                            <label for="email">@lang('admin.keys.email')</label>
                            <input type="email" name="email" value="{{$contacts->email}}" id="email"
                                   class="form-control"
                                   placeholder="email">
                        </div>
                        <div class="col-md-6">
                            <label for="phone">@lang('admin.keys.phoneNumber')</label>
                            <input type="text" name="phone" value="{{$contacts->phone}}" id="phone" class="form-control"
                                   placeholder="phone-number">
                        </div>
                        <div class="col-md-6">
                            <label for="work_time">@lang('admin.keys.workTime')</label>
                            <input type="text" name="work_time" id="work_time" value="{{$contacts->work_time}}"
                                   class="form-control"
                                   placeholder="@lang('admin.keys.workTime')">
                        </div>
                        <div class="col-md-6">
                            <label for="location">@lang('admin.keys.location')</label>
                            <input type="text" name="location" id="location" value="{{$contacts->location}}"
                                   class="form-control"
                                   placeholder="@lang('admin.keys.location')">
                        </div>
                        <div class="col-md-6">
                            <label for="instagram">@lang('admin.keys.instagram')</label>
                            <input type="text" name="instagram" id="instagram" value="{{$contacts->instagram}}"
                                   class="form-control"
                                   placeholder="instagram">
                        </div>
                    </div>
                    <div class="m-0 row justify-content-end mt-2">
                        <button type="submit" class="d-block d-md-none btn btn-primary align-self-end w-auto">
                            @lang('admin.buttons.submit')
                        </button>
                    </div>
                </form>
            </div>
            <div id="about-us" class="tab-pane fade">
                <form action="javascript:void(0)" id="Form" name="Form" class="form form-horizontal row"
                      method="POST"
                      enctype="multipart/form-data">
                    <div class="row m-0 my-2">
                        <h4 class="col p-0">@lang('admin.titles.aboutUs')</h4>
                        <button type="submit" class="col-auto d-none d-md-block btn btn-primary align-self-end w-auto">
                            @lang('admin.buttons.submit')
                        </button>
                    </div>
                    <div class="col-lg-8">
                        <div class="row m-0 p-0">
                            <label class="p-0">@lang('admin.keys.file') 1</label>
                            <div class="row m-0 p-0">
                                <input type="file" class="fileImage form-control col"
                                       data="/sections/section_image_1.jpg"/>
                                <button type="button" class="image-view form-control w-auto"><i
                                        class="fa fa-expand"></i>
                                </button>
                            </div>
                        </div>
                        <div class="row m-0 p-0">
                            <label class="p-0">@lang('admin.keys.file') 2</label>
                            <div class="row m-0 p-0">
                                <input type="file" class="fileImage form-control col"
                                       data="/sections/section_image_2.jpg"/>
                                <button type="button" class="image-view form-control w-auto"><i
                                        class="fa fa-expand"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="m-0 row justify-content-end mt-2">
                        <button type="submit" class="d-block d-md-none btn btn-primary align-self-end w-auto">
                            @lang('admin.button.submit')
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="imageModal" tabindex="-1" style="z-index: 1045">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content ">
                <div class="modal-header">
                    <h5 id="window_title" class="modal-title ml-2 p-1"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img id="output" class="container-fluid p-0">
                </div>
                <div class="modal-footer"></div>
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
            $('#contact-info-click').click();

            let imageModal = $('#imageModal');
            let tab_id = '#contact-info';
            let urls = '{{route('settings.contacts.set')}}';

            const output = $('#output');

            $('.tab').on('click', (e) => {
                tab_id = $(e.target).attr('href');
                let tab = $(`${tab_id}`);
                urls = "{{route('settings')}}/contacts"
                if (tab_id === '#about-us') {
                    urls = "{{route('settings')}}/about-us"
                }
            });


            $('.image-view').on('click', (e) => {
                let input = $(e.target).closest('div').find('input');
                let file = input[0].files[0];
                let value = input.attr('data');
                let reader = new FileReader();

                reader.addEventListener('load', (e) => {
                    output.attr('src', reader.result);
                })

                if (file) {
                    reader.readAsDataURL(file);
                    imageModal.modal('show');
                } else {
                    if (value) {
                        let url = '{{url('storage/image/')}}' + value;
                        output.attr('src', url)
                        imageModal.modal('show');
                    }
                }
            })

            function ajaxRequest(url, formData, successFunc = null, errorFunc = null) {
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: (data) => {
                        if (data['data']) {
                            data = data['data'];
                        }
                        console.log(data);
                    },
                    error: (data) => {
                        if (data['data']) {
                            data = data['data'];
                        }
                        console.log(data);
                    },
                });
            }

            $('.form').submit((e) => {
                e.preventDefault();
                let formData = new FormData(e.target);
                if (tab_id !== '#contact-info') {
                    formData.append(`files[]`, {});
                    $(e.target).find('.fileImage').each((key, value) => {
                            let file = value.files[0]
                                ? formData.append(`files[]`, value.files[0], value.getAttribute('data'))
                                : value.files[0];
                        }
                    );
                }
                let url = tab_id === '#contact-info' ? urls : urls + '/toggle';

                ajaxRequest(url, formData);
            })
        });


    </script>
@endsection

