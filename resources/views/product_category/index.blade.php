@extends('layouts.admin')
@section('contents')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Серии товара</h2>
                </div>
                <div class="pull-right mb-2">
                    <a class="btn btn-success" onClick="add()" href="javascript:void(0)">Добавить серию</a>
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
                        <th>Тип работы</th>
                        <th>Дата создания</th>
                        <th>Дата изменения</th>
                        <th></th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    <!--//TODO ProductCategory NAMING ERICHEK --> 

    <!-- boostrap ProductCategory model -->
    <div class="modal fade" id="ProductCategory-modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-fullscreen m-0" style="max-width: none">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Категория товара</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="javascript:void(0)" id="ProductCategoryForm" name="ProductCategoryForm" class="form-horizontal"
                        method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" id="id">
                        <div class="row">
                            <div class="col-lg">
                                <label for="title">Заголовок</label>
                                <input type="text" name="title" id="title" class="form-control" placeholder="Заголовок"
                                    required>
                            </div>
                        </div>
                        <div class="my-2">
                            <label for="description">Описание</label>
                            <textarea type="text" name="description" class="form-control" id="summernote-content" placeholder="Описание"
                                required></textarea>
                        </div>
                        <div class="my-2">
                            <label for="kind_of_work">Тип работы</label>
                            <div class="dropdown">
                                <select class="form-select" aria-label="Default select example" id="kind_of_work"
                                    name="kind_of_work" required>
                                    @foreach ($kinds as $id => $kind)
                                        <option value="{{$id}}">{{$kind}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="my-2">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                            <button type="submit" class="btn btn-primary">Подтвердить</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer"></div>
            </div>
        </div>
    </div>
    <!-- end bootstrap ProductCategory model -->

    <script>
        $(document).ready(function() {
            // Ajax setups
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#ajax-crud-datatable').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: "{{ url('admin/product_category/crud') }}",
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'title',
                        name: 'title'
                    },
                    {
                        data: 'kind_of_work',
                        name: 'kind_of_work'
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

        function add() {
            $('#ProductCategoryForm')[0].reset();
            $("#mySelect").prop("selectedIndex", -1);
            $('#summernote-content').summernote('reset');
            $('#ProductCategoryModal').html("Add ProductCategory");
            $('#ProductCategory-modal').modal('show');
            $('#id').val('');
        }

        function editFunc(id) {
            $.ajax({
                type: "POST",
                url: "{{ url('admin/product_category/edit') }}",
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(res) {
                    $('#ProductCategoryForm')[0].reset();
                    $("#kind_of_work").find(`option[value='${res.kind_of_work}']`).attr("selected", true);
                    $('#ProductCategoryModal').html("Edit ProductCategory");
                    $('#ProductCategory-modal').modal('show');
                    $('#summernote-content').summernote('code', res.description);
                    $.each(res, function(key,value) {
                        $('#'+key).val(value);
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
                        url: "{{ url('admin/product_category/delete') }}",
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

        $('#ProductCategoryForm').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: "{{ url('admin/product_category/store') }}",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: (data) => {
                    console.log(data);
                    $("#ProductCategory-modal").modal('hide');
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
