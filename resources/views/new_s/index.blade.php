@extends('layouts.admin')
@section('contents')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Laravel 10 Ajax DataTables CRUD (Create Read Update and Delete) </h2>
                </div>
                <div class="pull-right mb-2">
                    <a class="btn btn-success" onClick="add()" href="javascript:void(0)"> Create Employee</a>
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
                    <th>title</th>
                    <th>category_id</th>
                    <th>created_at</th>
                    <th>updated_at</th>
                    <th>Action</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>

    <!-- boostrap employee model -->
    <div class="modal fade" id="employee-modal" aria-hidden="true" style="z-index: 1045" tabindex="-1">
        <div class="modal-dialog modal-lg modal-fullscreen m-0" style="max-width: none">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Employee</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="javascript:void(0)" id="EmployeeForm" name="EmployeeForm" class="form-horizontal"
                          method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" id="id">
                        <div class="row">
                            <div class="col-lg">
                                <label for="title">Title</label>
                                <input type="text" name="title" id="title" class="form-control" placeholder="title"
                                       required>
                            </div>
                            <input type="hidden" name="categoriesArr" id="categoryArr">
                        </div>

                        <div class="my-2">
                            <label for="content">Content</label>
                            <textarea type="text" name="content" class="form-control" id="summernote-content"
                                      placeholder="content" required></textarea>
                        </div>
                        <div class="my-2">
                            <label for="category">Category</label>
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button"
                                        data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                    Категории
                                </button>
                                <ul class="dropdown-menu pb-0">
                                    <select class="form-select" size="5" aria-label="size 5 select example"
                                            id="category"
                                            name="category_id" required>
                                    </select>
                                    <li>
                                        <div class="input-group mb-0">
                                            <input type="text" id="category_add" class="m-0 form-control"
                                                   placeholder="Add a new category">
                                            <button class="m-0 btn btn-primary"
                                                    type="button"
                                                    id="addCategory">Button
                                            </button>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="my-2">
                            <label for="main_image">Select Avatar</label>
                            <input type="file" name="main_image" class="form-control" id="main_image">
                            <img class="h-25 w-25 img-thumbnail m-0"
                                 id="result">
                        </div>
                        <div class="my-2">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add Employee</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer"></div>
            </div>
        </div>
    </div>
    <!-- end bootstrap model -->
    <script>


        $(document).ready(function () {
            fetchAllcategories()
            // Ajax setups
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // DataTable setups
            // TODO CHANGE COLOR OF SELECTED ROWS https://datatables.net/forums/discussion/37959/background-color-of-selected-row
            // $('#ajax-crud-datatable tbody tr.selected').css('background-color','yellow');

            $('#ajax-crud-datatable').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                scrollX: true,
                select: true,
                ajax: "{{ url('admin/newss/ajax-crud-datatable') }}",
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'title', name: 'title'},
                    {data: 'category_id', name: 'category_id'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'updated_at', name: 'updated_at'},
                    {data: 'action', name: 'action', orderable: false},
                ],
                order: [[0, 'desc']]
            });
        });
        $('#ajax-crud-datatable tbody').on('click', 'tr', function () {
            if ($(this).hasClass('selected')) {
                $(this).removeClass('selected');
            } else {
                $('#ajax-crud-datatable tbody tr.selected').removeClass('selected');
                $(this).addClass('selected');
            }
        });

        $('#ajax-crud-datatable tbody').on('dblclick', 'tr', function () {
        });

        // Checking an escape button after summernote (BUG FIXED)
        document.addEventListener('keydown', function (event) {
            if (event.code == 'Escape') {
                // document.getElementsByClassName("note-editor note-frame panel panel-default")[0].style.position = 'fixed';
                if ($('#summernote-content').summernote('fullscreen.isFullscreen')) {
                    document.getElementsByClassName("note-editor note-frame panel panel-default")[0].style.position = 'static';
                    $('#summernote-content').summernote('fullscreen.toggle');
                }
            }
        });
        let newCategories = [];

        const options = $('#category')[0];

        // Adjusting category options
        function add_categories(categories) {
            document.querySelector('#category').innerHTML = '';
            for (let i = 0; i < categories.length; i++) {
                $('#category').append(`<option value="${categories[i]['id']}">${categories[i]['title']}</option>`)
            }
        }

        const categories = () => {
            let data = {'categories': []};
            for (let i = 0; i < options.length; i++) {
                data['categories'].push(options[i].text)
            }
            data['last_value'] = parseInt(options[options.length - 1].value);
            return data;
        }


        //TODO ONLY CATEGORIES

        function fetchAllcategories() {
            $.ajax({
                url: '{{url('admin/newss/categories')}}',
                method: 'get',
                error: function () {
                    console.log('Something went wrong');
                },
                success: function (response) {
                    console.log(response);
                    add_categories(response);
                }
            });
        }


        // Adding new category
        $('#addCategory').on('click', () => {
            const input = document.querySelector('#category_add');
            const data = categories();
            console.log(data);
            if (input.value != '' && !(data['categories'].includes(input.value))) {
                $('#category').append($('<option>',
                    {
                        value: data["last_value"] + 1,
                        text: input.value
                    }));
                data['categories'].push(input.value);
                newCategories.push(input.value);
            }
            input.value = '';
        })

        // Fullscreen Button for summernote (BUG FIXED)
        const OpenFullScreen = function (context) {
            const ui = $.summernote.ui;

            const button = ui.button({
                contents: '<i class="align-items-center fa fa-expand"/>',
                tooltip: 'FullScreen',
                click: function () {
                    $('#summernote-content').summernote('fullscreen.toggle');
                    if ($('#summernote-content').summernote('fullscreen.isFullscreen')) {
                        document.getElementsByClassName("note-editor note-frame panel panel-default fullscreen")[0].style.backgroundColor = '#fff';
                        document.getElementsByClassName("note-editor note-frame panel panel-default fullscreen")[0].style.position = 'fixed';
                    } else {
                        document.getElementsByClassName("note-editor note-frame panel panel-default")[0].style.position = 'static';
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


        const upload = document.querySelector('#main_image');
        const result = document.querySelector('#result');
        const default_image = "{{url('storage/image/default_post.jpg')}}";

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
            $('#EmployeeForm')[0].reset();
            document.querySelector('#result').src = default_image;
            $("#mySelect").prop("selectedIndex", -1);
            $('#summernote-content').summernote('reset');
            $('#EmployeeModal').html("Add Employee");
            $('#employee-modal').modal('show');
            $('#id').val('');
        }

        function editFunc(id) {
            $.ajax({
                type: "POST",
                url: "{{ url('admin/newss/edit') }}",
                data: {id: id},
                dataType: 'json',
                success: function (res) {
                    $('#EmployeeForm')[0].reset();
                    $("#category").find(`option[value='${res.category_id}']`).attr("selected", true);
                    $('#EmployeeModal').html("Edit Employee");
                    $('#employee-modal').modal('show');
                    $('#summernote-content').summernote('code', res.content);
                    $('#id').val(res.id);
                    $('#title').val(res.title);
                    result.src = `{{url('storage/image/')}}/${res.main_image}`;
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
                        url: "{{ url('admin/newss/delete') }}",
                        data: {id: id},
                        dataType: 'json',
                        success: function (res) {
                            console.log(res)
                            var oTable = $('#ajax-crud-datatable').dataTable();
                            oTable.fnDraw(false);
                        }
                    });
                }
            })
        }

        $('#EmployeeForm').submit(function (e) {
            e.preventDefault();
            if (newCategories.length != 0) {
                $('#categoryArr').val(newCategories);
            }
            var formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: "{{ url('admin/newss/store')}}",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: (data) => {
                    newCategories = []

                    $("#employee-modal").modal('hide');
                    var oTable = $('#ajax-crud-datatable').dataTable();
                    oTable.fnDraw(false);
                    $("#btn-save").html('Submit');
                    $("#btn-save").attr("disabled", false);
                },
                error: function (data) {
                    console.log(data);
                }
            });
        });


    </script>
@endsection
