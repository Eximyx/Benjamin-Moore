@extends('layouts.admin')
@section('contents')
    <div class="" style="">
        <div class="container-fluid">
            <div class="m-0 mb-1 p-0">
                <h3 class="text-light">Manage Employees</h3>
                <button class="btn btn-primary" data-bs-toggle="modal" data-backdrop="false"
                        data-bs-target="#addEmployeeModal"><i
                        class="fas fa-plus"></i> Add a News Post
                </button>
                <button class="btn btn-secondary" data-bs-toggle="modal" data-backdrop="false"
                        data-bs-target="#addEmployeeModal"><i
                        class="fas fa-edit"></i> Edit the News Post
                </button>
                <button class="btn btn-danger" id="removeNewsPost">
                    <i class="fas fa-trash"></i> Remove the News Post
                </button>
            </div>
            <div>
                <table id="example" class="m-0 w-100 table table-striped ">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>title</th>
                        <th>category_id</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- new employee modal --}}
    <div class="modal fade"></div>
    <div class="modal" id="addEmployeeModal" style="z-index: 1049" tabindex="-1" aria-label="exampleModalLabel">
        <div style="max-width: none" class="m-0 modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Employee</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="#" method="POST" id="add_employee_form" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body p-4 bg-light ">
                        <div class="row">
                            <div class="col-lg">
                                <label for="title">Title</label>
                                <input type="text" name="title" class="form-control" placeholder="title" required>
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
                            <img class="h-25 w-25 img-thumbnail m-0" src="../storage/image/default_post.jpg"
                                 id="result">
                        </div>
                        <div class="my-2">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" id="add_employee_btn" class="btn btn-primary">Add Employee</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

    {{-- edit employee modal --}}
    <div class="modal fade" id="editEmployeeModal" tabindex="-1" style="" aria-labelledby="exampleModalLabel"
         data-bs-backdrop="static" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Employee</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="#" method="POST" id="edit_employee_form" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="emp_id" id="emp_id">
                    <input type="hidden" name="emp_avatar" id="emp_avatar">
                    <div class="modal-body p-4 bg-light">
                        <div class="row">
                            <div class="col-lg">
                                <label for="fname">First Name</label>
                                <input type="text" name="fname" id="fname" class="form-control" placeholder="First Name"
                                       required>
                            </div>
                            <div class="col-lg">
                                <label for="lname">Last Name</label>
                                <input type="text" name="lname" id="lname" class="form-control" placeholder="Last Name"
                                       required>
                            </div>
                        </div>
                        <div class="my-2">
                            <label for="email">E-mail</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="E-mail"
                                   required>
                        </div>


                        {{--                        <div class="mt-2" id="avatar"></div>--}}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" id="edit_employee_btn" class="btn btn-success">Update Employee</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script>
        const news_url = 'admin/news/'


        $(document).ready(function () {

            const summernote = $('#summernote-content');
            const options = $('#category')[0];

            fetchAllPosts();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            document.addEventListener('keydown', function (event) {
                if (event.code == 'Escape') {
                    // document.getElementsByClassName("note-editor note-frame panel panel-default")[0].style.position = 'fixed';
                    if ($('#summernote-content').summernote('fullscreen.isFullscreen')) {
                        document.getElementsByClassName("note-editor note-frame panel panel-default")[0].style.position = 'static';
                        $('#summernote-content').summernote('fullscreen.toggle');
                    }
                }
            });


            const categories = () => {
                let data = {'categories': []};
                for (let i = 0; i < options.length; i++) {
                    data['categories'].push(options[i].text)
                }
                data['last_value'] = parseInt(options[options.length-1].value);
                return data;
            }

            const newCategories = [];

            $('#addCategory').on('click', () => {
                const input = document.querySelector('#category_add');
                const data = categories();
                console.log(data);
                if (input.value != '' && !(data['categories'].includes(input.value))) {
                    // const object = {value:options.length+1,text:input};
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

            // $('#add_employee_form').on('shown.bs.modal', function () {
            //     $('#summernote-content').summernote();
            // })

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



            //TODO Добавить нормальные возможности для редактирования текста





            const upload = document.querySelector('#main_image');
            const result = document.querySelector('#result');
            const error_message = $('#image-error-message');

            const default_image = "{{url('storage/image/default_post.jpg')}}";

            result.src = default_image;

            upload.addEventListener("change", (e) => {
                error_message.addClass('invisible');
                if (!previewFunc(e.target.files[0])) {
                    error_message.removeClass('invisible').addClass('visible');
                    upload.value = '';
                    result.src = default_image;
                } else {
                    error_message.addClass('invisible');
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

            //TODO CHANGE TO ONE POST

            function categoryIdToTitle(posts, categories) {
                const categories_id = [];
                const categories_title = [];
                categories['title'] = [];
                categories.forEach((i) => {
                  categories_id.push(i['id']);
                  categories_title.push(i['title'])
                });

                for (let i = 0; i < posts.length; i++){
                    posts[i]['category_id'] = categories_title[categories_id.indexOf(posts[i]['category_id'])];
                }
                return posts;
            }

            function add_categories(categories) {
                const category = $('#category')
                document.querySelector('#category').innerHTML = '';
                for (let i = 0; i < categories.length; i++) {
                    category.append(`<option value="${categories[i]['id']}">${categories[i]['title']}</option>`)
                }
            }


            //TODO DELETE
            $.extend(true, DataTable.defaults, {
                searching: true,
                ordering: true,
                select: true,
                columns: [
                    {data: 'id'},
                    {data: 'title'},
                    {data: 'category_id'}
                ]
            });


            $('#example tbody').on('click', 'tr', function () {
                if ($(this).hasClass('selected')) {
                    $(this).removeClass('selected');
                } else {
                    $('#example tbody tr.selected').removeClass('selected');
                    $(this).addClass('selected');
                }
            });
            $('#example tbody').on('dblclick', 'tr', function () {

            });

            let table = null;

            function create_table(data) {
                table = new DataTable('#example', {
                    data: categoryIdToTitle(data['posts'], data['categories']),
                })
            };
            //TODO DELETE
            //TODO ONLY CATEGORIES

            function fetchAllPosts() {

                $.ajax({
                    url: '{{route('news.fetchall')}}',
                    method: 'get',
                    error: function () {
                        console.log('Something went wrong');
                    },
                    success: function (response) {
                        let data = {};
                        data['posts'] = response[0];
                        data['categories'] = response[1];
                        // console.log(data['categories']);
                        add_categories(data['categories']);
                        if (table == null) {
                            create_table(data);
                        }


                    }
                });
            }


            $("#add_employee_form").submit(function (e) {
                e.preventDefault();
                if (newCategories.length !== 0) {
                    document.querySelector('#categoryArr').value = newCategories;
                }
                const fd = new FormData(this);
                $("#add_employee_btn").text('Adding...');
                $.ajax({
                    url: '{{route('news.store')}}',
                    method: 'post',
                    data: fd,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    success: function (response) {
                        console.log(response);
                        $("#add_employee_btn").text('Add Employee');
                        $('#addEmployeeModal').modal('hide');
                        $('#add_employee_form')[0].reset();
                        $('#summernote-content').summernote('reset');
                        // TABLE ADD
                        table.row.add({"id":response['id'],'title':response['title'],'category_id':response['category_id']}).draw();

                        fetchAllPosts();
                    }
                });

            });

        });
    </script>
@endsection
