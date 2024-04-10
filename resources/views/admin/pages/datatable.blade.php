@extends('admin.layouts.admin')
@section('title', trans($data['data']['ModelName']))
@section('contents')
    <div class="container-fluid p-0">
        <table class="m-0 w-100 table table-bordered table-striped" id="table">
            <thead>
            <tr>
                @foreach ($data['data']['datatable_data'] as $key => $value)
                    @if(str_contains($value, '_id'))
                        <th>@lang('admin.keys.category')</th>
                    @else
                        <th>@lang('admin.keys.'.$value)</th>
                    @endif
                @endforeach
                <th>@lang('admin.keys.created_at')</th>
                <th>@lang('admin.keys.updated_at')</th>
                <th></th>
            </tr>
            </thead>
        </table>
    </div>
    <div class="modal fade" id="Form-modal" aria-hidden="true" style="z-index: 1045" tabindex="-1">
        <div class="modal-dialog modal-lg modal-fullscreen m-0" style="max-width: none">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="window_title" class="modal-title ml-2 p-1">@lang($data['data']['ModelName'])</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="errors"></div>
                    <form action="javascript:void(0)" id="Form" name="Form" class="form-horizontal" method="POST"
                          enctype="multipart/form-data">
                        <input type="hidden" name="id" id="id">

                        @foreach ($data['data']['form_data'] as $key => $value)
                            <div class="col-lg mt-2">
                                @if(str_contains($value, '_id'))
                                    <label for="{{ $value }}">@lang('admin.keys.category')</label>
                                @elseif(str_contains($value, 'color'))
                                    <div class="row">
                                        <div class="col">
                                            <label class="m-0 p-0 align-items-center"
                                                   for="{{ $value }}">@lang('admin.keys.'.$value)</label>
                                        </div>
                                        <div class="col-11 row" id="color_boxes_row">

                                        </div>
                                    </div>
                                @else
                                    <label for="{{ $value }}">@lang('admin.keys.'.$value)</label>
                                @endif
                                @if ($value === 'content')
                                    <textarea type="text" name="content" class="form-control" id="summernote-content"
                                              placeholder="@lang('admin.keys.content')"></textarea>
                                @elseif($value == 'hex_code')
                                    <input type="color" name="{{$value}}" class="color-input" id="{{$value}}"
                                           style="width: 150px">
                                    <div class="color-picker__button form-control">
                                        Chose color
                                    </div>
{{--        Colors create form        --}}
                                @elseif($value == 'colors')
                                    <div class="dropdown_with-chk-admin">
                                        <button type="button" id="colors-button-admin" class="dropdown_with-chk__button">@lang('catalog.filter.defaultValue')</button>
                                        <ul class="dropdown_with-chk__list" id="colors">
                                            @foreach($data['tags'] as $item)
                                                <li class="dropdown_with-chk__list-item">
                                                    <input type="checkbox" name="color_id" id="{{$item->id}}" class="dropdown_with-chk__list-item_label">
                                                    <label for="{{$item->id}}" class="dropdown_with-chk__list-item_label">{{$item->title}}</label>
                                                    <div id="preview_{{$item->id}}" style="width: 10px; height: 10px; margin-left: auto; margin-right: 15px; background-color: {{$item->hex_code}}"></div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @elseif($value == 'description')
                                    <textarea type="text" name="description" class="form-control" id="description"
                                              rows="3" placeholder="@lang('admin.keys.'.$value)"
                                    ></textarea>
                                @elseif(str_contains($value, '_id'))
                                    <div>
                                        <select class="form-select" name="{{ $value }}" id="select">
                                            <option data="default" value="">
                                                Не выбрано
                                            </option>
                                            @foreach ($data['selectable'] as $item)
                                                <option value="{{ $item['id'] }}">
                                                    {{ $item['title'] }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                @elseif($value == 'sub_images')
                                    <input type="file" name="{{$value}}[]" class="form-control" id="sub_images"
                                           multiple>
                                    {{--<img class="my-2 img-thumbnail m-0" id="result"
                                         style="max-width: 20rem;max-height:20rem">--}}
                                @elseif(str_contains($value, 'image'))
                                    <input type="file" name="{{ $value }}" class="form-control" id="image">
                                    <img class="my-2 img-thumbnail m-0" id="result"
                                         style="max-width: 20rem;max-height:20rem">
                                @else
                                    <input type="text" name="{{ $value }}" id="{{ $value }}"
                                           class="form-control" placeholder="@lang('admin.keys.'.$value)">
                                @endif
                            </div>
                        @endforeach
                        <div class="col-lg mt-2">
                            <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">@lang('admin.buttons.close')</button>
                            <button type="submit" class="btn btn-primary">@lang('admin.buttons.submit')</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer"></div>
            </div>
        </div>
    </div>

    <script>
        const urls = "{{ url(request()->getPathInfo()) }}"

        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            console.log(urls);
            console.log();
            $('#table').DataTable({

                @if (App::currentLocale() !== "en")
                language: @json(config('datatable_'.App::currentLocale())),
                @endif
                processing: true,
                serverSide: true,
                responsive: true,
                ajax:
                urls,
                columns:
                    [
                        @foreach ($data['datatable_columns'] as $item) @json($item),
                            @endforeach

                        {
                            "data":
                                'created_at',
                            "name":
                                'created_at'
                        }
                        ,
                        {
                            "data":
                                'updated_at',
                            "name":
                                'updated_at'
                        }
                        ,
                        {
                            "data":
                                'action',
                            "name":
                                'action',
                            "orderable":
                                false
                        }
                        ,
                    ],
                "order":
                    [
                        [0, 'desc']
                    ],
            })
            ;
        });

        document.addEventListener('keydown', function (event) {
            if (event.code == 'Escape') {
                // document.getElementsByClassName("note-editor note-frame panel panel-default")[0].style.position = 'fixed';
                if ($('#summernote-content').summernote('fullscreen.isFullscreen')) {
                    document.getElementsByClassName("note-editor note-frame panel panel-default")[0].style
                        .position = 'static';
                    $('#summernote-content').summernote('fullscreen.toggle');
                }
            }
        });

        const OpenFullScreen = function (context) {
            const ui = $.summernote.ui;
            if (ui) {
                const button = ui.button({
                    contents: '<i class="align-items-center fa fa-expand"/>',
                    tooltip: 'FullScreen',
                    click: function () {
                        $('#summernote-content').summernote('fullscreen.toggle');
                        if ($('#summernote-content').summernote('fullscreen.isFullscreen')) {
                            document.getElementsByClassName(
                                "note-editor note-frame panel panel-default fullscreen")[0].style
                                .backgroundColor = '#fff';
                            document.getElementsByClassName(
                                "note-editor note-frame panel panel-default fullscreen")[0].style.position =
                                'fixed';
                        } else {
                            document.getElementsByClassName("note-editor note-frame panel panel-default")[0]
                                .style.position = 'static';
                        }
                    }
                })
                return button.render();
            }

        }
        // Summernote setups
        $('#summernote-content').summernote({
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['fontname', ['fontname']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['summernote_fullscreen', 'codeview']],
            ],
            buttons: {
                summernote_fullscreen: OpenFullScreen
            }
        });

        const result = $('#result');
        const default_image = "{{ url('storage/image/default_post.jpg') }}";

        $('#image').on("change", (e) => {
            console.log(e.target.files[0]);
            if (!previewFunc(e.target.files[0])) {
                $('#image').val('');
                $('#result').attr("src", default_image);
            }
        });

        function previewFunc(file) {
            if (file === undefined || !file.type.match(/image.*/)) {
                return false
            }
            const reader = new FileReader();
            reader.addEventListener("load", (e) => {
                $('#result').attr("src", e.target.result);
            });
            reader.readAsDataURL(file);
            return true;
        }

        function add() {
            $('#Form')[0].reset();
            $('#result').attr("src", default_image);
            $('#window_title').text('@lang('admin.modal.create')');
            $("#select").prop("selectedIndex", 0);
            $('#summernote-content').summernote('reset');
            $('#Form-modal').modal('show');
            $('#id').val('');
        }

        function editFunc(id) {
            delSelected();
            $.ajax({
                type: "GET",
                url: urls + `/${id}` + '/edit',
                dataType: 'json',
                success: function (res) {
                    console.log(this.url);
                    res = res['data'];
                    console.log(res);
                    $('#Form')[0].reset();
                    $('#window_title').text('@lang('admin.modal.edit')');
                    $('#Form-modal').modal('show');
                    $.each(res, function (key, value) {
                            if (!key.includes('image')) {

                                if (key.includes('_id')) {
                                    $("#select").find(`option[value='${value}']`).attr('selected', true);
                                } else if (key.includes('colors')) {
                                    $(value).each((key, value) => {
                                        console.log(value);
                                        $("#colors").find(`option[value='${value['id']}']`).attr('selected', true);
                                    })
                                    $("#color_boxes_row").html('');
                                    $(value).each((key, value) => {
                                            let htmlCode = " <div class='border border-dark m-1 p-0' onclick = 'delColor(this.id)' id='color_" + value['id'] + "' style='width:32px; height:32px'> <p class=' border border-3 border-white m-0' style='width:30px; height:30px; background:" + value['hex_code'] + "'></p></div>"
                                        $(htmlCode).appendTo("#color_boxes_row");
                                    })
                                } else {
                                    $('#' + key).val(value);
                                }
                            } else {
                                console.log(typeof (value));
                                if (typeof value == "string") {
                                    result.attr("src", `/${value}`);
                                }
                            }
                            $("#select option:selected").insertAfter("#select option[data='default']");
                            $("#colors option:selected").insertAfter("#color option[data='default']");
                        }
                    )

                    $('#summernote-content').summernote('code', res.content);
                },
                error:

                    function (data) {
                        console.log(data);
                    }
            });
        }

        // TODO If u want to delete a category, u will see the error  "SQLSTATE[23000]: Integrity constraint violation: 1451 Cannot delete or update a parent row:

        function deleteFunc(id) {
            var id = id;
            Swal.fire({
                title: '@lang('messages.messages.delete')',
                icon: 'warning',
                showCancelButton: true,
                cancelButtonText: '@lang('messages.buttons.cancel')',
                confirmButtonColor: '#DC3545',
                confirmButtonText: '@lang('messages.buttons.delete')',
            }).then((result) => {
                if (result['isConfirmed']) {
                    $.ajax({
                        type: "DELETE",
                        url: urls + '/delete',
                        data: {
                            id: id
                        },
                        dataType: 'json',
                        success: function (res) {
                            console.log(res)
                            var oTable = $('#table').dataTable();
                            oTable.fnDraw(false);
                        },
                        error: function (res) {
                            // TODO IMPLEMENT DISPLAY WINDOW WTIH ERROR FOR DELETING BANNERS OR SMTHG WHAT WE CANT TO DO!
                        }
                    });
                }
            })
        }

        function toggle(id) {
            var id = id;
            Swal.fire({
                title: '@lang('messages.messages.toggle')',
                icon: 'warning',
                showCancelButton: true,
                cancelButtonText: '@lang('messages.buttons.cancel')',
                confirmButtonColor: '#DC3545',
                confirmButtonText: '@lang('messages.messages.toggle')',
            }).then((result) => {
                if (result['isConfirmed']) {
                    $.ajax({
                        type: "POST",
                        url: urls + '/toggle',
                        data: {
                            id: id
                        },
                        dataType: 'json',
                        success: function (res) {
                            console.log(res);
                            var oTable = $('#table').dataTable();
                            oTable.fnDraw(false);
                        }
                    });
                }
            })
        }

        function delSelected() {
            $('#select option:selected').each((key, value) => {
                $(value).removeAttr('selected')
            });
            $('#colors option:selected').each((key, value) => {
                $(value).removeAttr('selected')
            });
        }

        function delColor(id) {
            console.log(id);
            document.getElementById(id).remove();
            let color = id.substring(6);
            $("#colors").find(`option[value='${color}']`).removeAttr('selected');
        }

        async function deleteErrors() {
            return await $(document).find("li.alert").remove();
        }

        $('#Form').submit(function (e) {
            e.preventDefault();
            deleteErrors();
            let formData = new FormData(this);
            let url = '';
            let type = 'POST';
            let id = $('#id').val();
            if (id !== '') {
                url += `/${id}?_method=PATCH`;
            }
            delSelected();
            $.ajax({
                type: type,
                url: urls + url,
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: (data) => {
                    console.log(data);
                    $("#Form-modal").modal('hide');
                    var oTable = $('#table').dataTable();
                    oTable.fnDraw(false);
                    $("#btn-save").html('Submit');
                    $("#btn-save").attr("disabled", false);
                },
                error: function (data) {
                    $("#errors").append("<li class='alert alert-danger'>" + data.responseJSON.message + "</li>")
                },
            });
        });

    </script>
@endsection
@push('scripts')
    @vite('public/admin_assets/js/custom-select-admin.js')
@endpush
