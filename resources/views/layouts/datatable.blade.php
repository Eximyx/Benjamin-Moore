@extends('layouts.admin')
@section('contents')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="float-left">
                    <h2>{{ $data['ModelName'] }}</h2>
                </div>
                <div class="float-right mb-2">
                    <a class="btn btn-success" onClick="add()" href="javascript:void(0)">Добавить</a>
                </div>
            </div>
        </div>
        <div class="">
            <table class="m-0 w-100 table table-striped" id="table">
                <thead>
                    <tr>
                        <th>id</th>
                        @foreach ($data['datatable_data'] as $key)
                            <th>{{ $key }}</th>
                        @endforeach
                        <th>Дата создания</th>
                        <th>Дата изменения</th>
                        <th></th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

    <div class="modal fade" id="Form-modal" aria-hidden="true" style="z-index: 1045" tabindex="-1">
        <div class="modal-dialog modal-lg modal-fullscreen m-0" style="max-width: none">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="window_title" class="modal-title ml-2 p-1">{{ $data['ModelName'] }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="javascript:void(0)" id="Form" name="Form" class="form-horizontal" method="POST"
                        enctype="multipart/form-data">
                        <input type="hidden" name="id" id="id">
                        @foreach ($data['form_data'] as $key => $value)
                            <div class="col-lg mt-2">
                                <label for="{{ $key }}">{{ $value }}</label>
                                @if ($key == 'content')
                                    <textarea type="text" name="content" class="form-control" id="summernote-content" placeholder="content" required></textarea>
                                @elseif($key == 'description')
                                    <textarea type="text" name="description" class="form-control" id="description" rows="3" placeholder="content"
                                        required></textarea>
                                @elseif(str_contains($key, '_id'))
                                    <div>
                                        <select class="form-select" name="{{ $key }}" id="select"
                                            aria-label="Default select example" required>
                                            @foreach ($selectable as $item)
                                                <option value="{{ $item['id'] }}">
                                                    {{ $item['title'] }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                @elseif(str_contains($key, 'image'))
                                    <input type="file" name="{{ $key }}" class="form-control" id="image">
                                    <img class="my-2 img-thumbnail m-0" id="result"
                                        style="max-width: 20rem;max-height:20rem">
                                @else
                                    <input type="text" name="{{ $key }}" id="{{ $key }}"
                                        class="form-control" placeholder="{{ $value }}" required>
                                @endif
                            </div>
                        @endforeach
                        <div class="col-lg mt-2">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                            <button type="submit" class="btn btn-primary">Подтвердить</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer"></div>
            </div>
        </div>
    </div>
    <script>
        const urls = "{{ url(request()->getPathInfo()) }}"

        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            console.log(urls);
            $('#table').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: urls,
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    ...@json($datatable_columns),
                    {
                        data: 'created_at',
                        name: 'created_at'
                    },
                    {
                        data: 'updated_at',
                        name: 'updated_at'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false
                    },
                ],
                order: [
                    [0, 'desc']
                ],
            });
        });

        document.addEventListener('keydown', function(event) {
            if (event.code == 'Escape') {
                // document.getElementsByClassName("note-editor note-frame panel panel-default")[0].style.position = 'fixed';
                if ($('#summernote-content').summernote('fullscreen.isFullscreen')) {
                    document.getElementsByClassName("note-editor note-frame panel panel-default")[0].style
                        .position = 'static';
                    $('#summernote-content').summernote('fullscreen.toggle');
                }
            }
        });

        const OpenFullScreen = function(context) {
            const ui = $.summernote.ui;
            const button = ui.button({
                contents: '<i class="align-items-center fa fa-expand"/>',
                tooltip: 'FullScreen',
                click: function() {
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

        // const upload = $('#image');
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
            // document.querySelector('#result').src = default_image;
            $("#select").prop("selectedIndex", 0);
            $('#summernote-content').summernote('reset');
            $('#Form-modal').modal('show');
            $('#id').val('');
        }

        function editFunc(id) {
            $.ajax({
                type: "POST",
                url: urls + '/edit',
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(res) {
                    $('#Form')[0].reset();
                    $('#window_title').text("Edit News Post");
                    $('#Form-modal').modal('show');
                    $.each(res, function(key, value) {
                        if (key.includes('_id')) {
                            $("#select").find(`option[value='${value}']`).attr("selected", true);
                        } else {
                            $('#' + key).val(value);
                        }
                    });
                    $('#summernote-content').summernote('code', res.content);
                    // result.src = ;
                    result.attr("src", `{{ url('storage/image/') }}/${res.main_image}`);

                },
                error: function(data) {
                    console.log(data);
                }
            });
        }

        function deleteFunc(id) {
            var id = id;
            Swal.fire({
                title: 'Do you really want to delete this post?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#DC3545',
                confirmButtonText: 'Delete'
            }).then((result) => {
                if (result['isConfirmed']) {
                    $.ajax({
                        type: "POST",
                        url: urls + '/delete',
                        data: {
                            id: id
                        },
                        dataType: 'json',
                        success: function(res) {
                            console.log(res)
                            var oTable = $('#table').dataTable();
                            oTable.fnDraw(false);
                        }
                    });
                }
            })
        }

        function toggle(id) {
            var id = id;
            Swal.fire({
                title: 'Do you really want to toggle this static-page?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#DC3545',
                confirmButtonText: 'Submit'
            }).then((result) => {
                if (result['isConfirmed']) {
                    $.ajax({
                        type: "POST",
                        url: urls + '/toggle',
                        data: {
                            id: id
                        },
                        dataType: 'json',
                        success: function(res) {
                            console.log(res);
                            var oTable = $('#table').dataTable();
                            oTable.fnDraw(false);
                        }
                    });
                }
            })
        }

        $('#Form').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: urls + '/store',
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
                error: function(data) {
                    console.log(data);
                }
            });
        });
    </script>
@endsection
