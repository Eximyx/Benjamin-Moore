@extends('admin.layouts.admin')
@section('contents')
    <div class="container-fluid">
        <div id="contact-info">
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
                        <input type="email" name="email" value="{{$data->email}}" id="email"
                               class="form-control"
                               placeholder="email">
                    </div>
                    <div class="col-md-6">
                        <label for="phone">@lang('admin.keys.phoneNumber')</label>
                        <input type="text" name="phone" value="{{$data->phone}}" id="phone" class="form-control"
                               placeholder="phone-number">
                    </div>
                    <div class="col-md-6">
                        <label for="work_time">@lang('admin.keys.workTime')</label>
                        <input type="text" name="work_time" id="work_time" value="{{$data->work_time}}"
                               class="form-control"
                               placeholder="@lang('admin.keys.workTime')">
                    </div>
                    <div class="col-md-6">
                        <label for="location">@lang('admin.keys.location')</label>
                        <input type="text" name="location" id="location" value="{{$data->location}}"
                               class="form-control"
                               placeholder="@lang('admin.keys.location')">
                    </div>
                    <div class="col-md-6">
                        <label for="instagram">@lang('admin.keys.instagram')</label>
                        <input type="text" name="instagram" id="instagram" value="{{$data->instagram}}"
                               class="form-control"
                               placeholder="instagram">
                    </div>
                </div>
                <div class="row m-0 my-2">
                    <h4 class="col p-0">@lang('admin.titles.aboutUs')</h4>
                </div>
                <div class="col-lg-8">
                    <div class="row m-0 p-0">
                        <label class="p-0">@lang('admin.keys.description')</label>
                        <textarea name="description" id="" cols="30" rows="10">{{$data->description}}</textarea>
                        <label class="p-0">@lang('admin.keys.file') 1</label>
                        <div class="row m-0 p-0">
                            <input type="file" name="file1" class="fileImage form-control col"
                                   data="section_image_1.jpg"/>
                            <button type="button" class="image-view form-control w-auto"><i
                                    class="fa fa-expand"></i>
                            </button>
                        </div>
                    </div>
                    <div class="row m-0 p-0">
                        <label class="p-0">@lang('admin.keys.file') 2</label>
                        <div class="row m-0 p-0">
                            <input type="file" name="file2" class="fileImage form-control col"
                                   data="section_image_2.jpg"/>
                            <button type="button" class="image-view form-control w-auto"><i
                                    class="fa fa-expand"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="m-0 row justify-content-end mt-2">
                    <button type="submit" class="d-block d-md-none btn btn-primary align-self-end w-auto">
                        @lang('admin.buttons.submit')
                    </button>
                </div>
            </form>
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

            let imageModal = $('#imageModal');
            let urls = '{{route('settings.set')}}';

            const output = $('#output');

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
                        let url = '{{url('storage/image/sections')}}/' + value;
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
                // formData.append(`file`, {});
                $(e.target).find('.fileImage').each((key, value) => {
                        let file = value.files[0]
                            ? formData.append(`file` + key, value.files[0], value.getAttribute('data'))
                            : value.files[0];
                    }
                );
                console.log(formData.getAll('file1'))

                ajaxRequest(urls, formData);
            })
        });


    </script>
@endsection

