@extends('layouts.admin')
@section('contents')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Товар</h2>
                </div>
                <div class="pull-right mb-2">
                    <a class="btn btn-success" onClick="add()" href="javascript:void(0)">Добавить товар</a>
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <div class="">
            <table class="m-0 w-100 table table-striped" id="ajax-crud-datatable">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Заголовок</th>
                        <th>Код</th>
                        <th>Категория</th>
                        <th>Дата создания</th>
                        <th>Дата изменения</th>
                        <th></th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    <!--//TODO Product NAMING ERICHEK -->

    <!-- boostrap Product model -->
    <div class="modal fade" id="Product-modal" aria-hidden="true" style="z-index: 1045" tabindex="-1">
        <div class="modal-dialog modal-lg modal-fullscreen m-0" style="max-width: none">
            <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Товар</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="javascript:void(0)" id="Form" name="Form" class="form-horizontal"
                        method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" id="id">
                        <div class="col-lg mb-3">
                            <label for="title">Заголовок</label>
                            <input type="text" name="title" id="title" class="form-control" placeholder="Заголовок"
                                required>
                        </div>
                        <div class="col-lg mb-3">
                            <label for="content">Характеристики</label>
                            <textarea type="text" name="content" class="form-control" id="summernote-content" placeholder="Характеристики" required></textarea>
                        </div>
                        <div class="col-lg mb-3">
                            <label for="code">Код</label>
                            <input type="number" name="code" id="code" class="form-control" placeholder="Код"
                                required>
                        </div>
                        <div class="col-lg mb-3">
                            <label for="gloss_level">Степень блеска</label>
                            <input type="text" name="gloss_level" id="gloss_level" class="form-control" placeholder="Степень блеска" required>
                        </div>
                        <div class="col-lg mb-3">
                            <label for="type">Тип</label>
                            <input type="text" name="type" id="type" class="form-control" placeholder="Тип"
                                required>
                        </div>
                        <div class="col-lg mb-3">
                            <label for="colors">Цвета</label>
                            <input type="text" name="colors" id="colors" class="form-control" placeholder="Цвета"
                                required>
                        </div>
                        <div class="col-lg mb-3">
                            <label for="base">Базы</label>
                            <input type="text" name="base" id="base" class="form-control" placeholder="Базы"
                                required>
                        </div>
                        <div class="col-lg mb-3">
                            <label for="v_of_dry_remain">V сухого остатка</label>
                            <input type="text" name="v_of_dry_remain" id="v_of_dry_remain" class="form-control"
                                placeholder="V сухого остатка" required>
                        </div>
                        <div class="col-lg mb-3">
                            <label for="time_to_repeat">Повторное нанесение</label>
                            <input type="text" name="time_to_repeat" id="time_to_repeat" class="form-control"
                                placeholder="Повторное нанесение" required>
                        </div>
                        <div class="col-lg mb-3">
                            <label for="consumption">Расход кв.м/гал</label>
                            <input type="text" name="consumption" id="consumption" class="form-control"
                                placeholder="Расход кв.м/гал" required>
                        </div>
                        <div class="col-lg mb-3">
                            <label for="thickness">Толщина сухой пленки (милы)</label>
                            <input type="text" name="thickness" id="thickness" class="form-control"
                                placeholder="Толщина сухой пленки (милы)" required>
                        </div>
                        <div class="col-lg mb-3">
                            <label for="description">Описание</label>
                            <input type="text" name="description" id="description" class="form-control"
                                placeholder="Описание" required>
                        </div>
                        <div class="col-lg mb-3">
                            <label for="category">Серия</label>
                            <select class="form-select" aria-label="select example" id="category" name="category_id"
                                required style="max-width: 20rem">
                                @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg mb-3">
                            <label for="main_image">Выберите изображение</label>
                            <input type="file" name="main_image" class="form-control" id="main_image">
                            <img class="img-thumbnail m-0 mt-2" id="result" style="max-height: 20rem;max-width:20rem">
                        </div>
                        <div class="col-lg">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                            <button type="submit" class="btn btn-primary">Подтвердить</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer"></div>
            </div>
        </div>
    </div>
    <!-- end bootstrap Product model -->

    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#ajax-crud-datatable').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: "{{ url('admin/products/crud') }}",
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'title',
                        name: 'title'
                    },
                    {
                        data: 'code',
                        name: 'code'
                    },
                    {
                        data: 'product_category_id',
                        name: 'product_category_id'
                    },
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
                ]
            });
        });

        // Checking an escape button after summernote (BUG FIXED)
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


        // Fullscreen Button for summernote (BUG FIXED)
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
                ['view', ['summernote_fullscreen']],
            ],
            buttons: {
                summernote_fullscreen: OpenFullScreen
            }
        });


                //TODO IMAGE FIX BOTH


        const upload = document.querySelector('#main_image');
        const result = document.querySelector('#result');
        const default_image = "{{ url('storage/image/default_post.jpg') }}";

        upload.addEventListener("change", (e) => {
            console.log(e.target.files[0]);
            if (!previewFunc(e.target.files[0])) {
                upload.value = '';
                result.src = default_image;
            }
        });

        function previewFunc(file) {
            if (file === undefined || !file.type.match(/image.*/)) {
                return false
            }
            const reader = new FileReader();
            reader.addEventListener("load", (e) => {
                result.src = e.target.result;
            });
            reader.readAsDataURL(file);
            return true;
        }

        function add() {
            $('#Form')[0].reset();
            document.querySelector('#result').src = default_image;
            $("#mySelect").prop("selectedIndex", 0);
            $('#summernote-content').summernote('reset');
            $('#ProductModal').html("Add Product");
            $('#Product-modal').modal('show');
            $('#id').val('');
        }


        function editFunc(id) {
            $.ajax({
                type: "POST",
                url: "{{ url('admin/products/edit') }}",
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(res) {
                    $('#Form')[0].reset();
                    $("#category").find(`option[value='${res.product_category_id}']`).attr("selected", true);
                    $('#ProductModal').html("Edit Product");
                    $('#Product-modal').modal('show');
                    $('#summernote-content').summernote('code', res.content);
                    result.src = `{{ url('storage/image/') }}/${res.main_image}`;
                    $.each(res, function(key,value) {
                        if (!(key == 'main_image'))
                        {
                            $('#'+key).val(value);
                        }
                        
                    });
                    
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
                    // ajax
                    $.ajax({
                        type: "POST",
                        url: "{{ url('admin/products/delete') }}",
                        data: {
                            id: id
                        },
                        dataType: 'json',
                        success: function(res) {
                            console.log(res)
                            var oTable = $('#ajax-crud-datatable').dataTable();
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
                url: "{{ url('admin/products/store') }}",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: (data) => {
                    console.log(data);
                    $("#Product-modal").modal('hide');
                    var oTable = $('#ajax-crud-datatable').dataTable();
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
