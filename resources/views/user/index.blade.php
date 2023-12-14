@extends('layouts.admin')
@section('contents')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Пользователи</h2>
                </div>
                <div class="pull-right mb-2">
                    <a class="btn btn-success" onClick="add()" href="javascript:void(0)">Добавить</a>
                </div>
            </div>
        </div>
        <div class="">
            <table class="m-0 w-100 table table-striped" id="datatable">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Имя</th>
                        <th>Email</th>
                        <th>Права</th>
                        <th>Дата создания</th>
                        <th>Дата изменения</th>
                        <th></th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    <div class="modal fade" id="Form-Modal" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-lg " style="max-width:20rem">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="modal_title" class="modal-title">User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="javascript:void(0)" id="Form" name="Form" class="form" method="POST"
                        enctype="multipart/form-data">
                        <input type="hidden" name="id" id="id">
                        <div class="form-group">
                            <input name="name" type="text" class="form-control form-control-user" id="name"
                                placeholder="Имя" required>
                        </div>
                        <div class="form-group">
                            <input name="email" type="email" class="form-control form-control-user" id="email"
                                placeholder="Email" required>
                        </div>
                        <div class="form-group">
                            <input name="password" type="password" class="form-control form-control-user" id="password"
                                placeholder="Пароль">
                        </div>
                        <div>
                            <select class="form-select" name="role_id" id="select" aria-label="Default select example"
                                required>
                                @foreach ($roles as $id => $role)
                                    <option {{ $id == 0 ? 'selected' : '' }} value="{{ $id }}">{{ $role }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="my-2">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отменить</button>
                            <button type="submit" class="btn btn-primary">Подтвердить</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer"></div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#datatable').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: "{{ url('admin/users/') }}",
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'role_id',
                        name: 'role_id'
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


        function add() {
            $('span[id="error"]').remove();
            $('#Form')[0].reset();
            $("#select").prop("selectedIndex", 0);
            $('#summernote-content').summernote('reset');
            $('#FormModal').html("Add User");
            $('#modal_title').html("Add User");
            $('#Form-Modal').modal('show');
            $('#id').val('');
        }

        function editFunc(id) {
            $.ajax({
                type: "POST",
                url: "{{ url('admin/users/edit') }}",
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(res) {
                    console.log(res);
                    $('#Form')[0].reset();
                    $('#modal_title').html("Edit User");
                    $('#Form-Modal').modal('show');
                    $.each(res, function(key,value) {
                        if (key.includes('_id') ) {
                            $("#select").find(`option[value='${value}']`).attr("selected", true);

                        }else {
                            $('#'+key).val(value);

                        }
                    });
                    $('span[id="error"]').remove();
                    // TODO IMPLEMENT CATEGORY_SELECT
                    $('#password').val(res.password);
                }
            });
        }

        function deleteFunc(id) {
            var id = id;
            Swal.fire({
                title: 'Do you really want to delete this user?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#DC3545',
                confirmButtonText: 'Delete'
            }).then((result) => {
                if (result['isConfirmed']) {
                    $.ajax({
                        type: "POST",
                        url: "{{ url('admin/users/delete') }}",
                        data: {
                            id: id
                        },
                        dataType: 'json',
                        success: function(res) {
                            console.log(res)
                            var oTable = $('#datatable').dataTable();
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
                url: "{{ url('admin/users/store') }}",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: (data) => {
                    console.log(data);
                    newCategories = []
                    $("#Form-Modal").modal('hide');
                    var oTable = $('#datatable').dataTable();
                    oTable.fnDraw(false);
                    $("#btn-save").html('Submit');
                    $("#btn-save").attr("disabled", false);
                },
                error: function(data) {
                    console.log(data);
                    $('span[id="error"]').remove();
                    $.each(data.responseJSON.errors, function(field_name, error) {
                        $(document).find('[name=' + field_name + ']').after(
                            '<span id="error" class="text-strong text-danger">' + error +
                            '</span>')
                    })
                }
            });
        });
    </script>
@endsection
