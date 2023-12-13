@extends('layouts.admin')
@section('contents')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Laravel 10 Ajax DataTables CRUD (Create Read Update and Delete) </h2>
                </div>
                <div class="pull-right mb-2">
                    <a class="btn btn-success" onClick="add()" href="javascript:void(0)"> Create User</a>
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <div class="">
            <table class="m-0 w-100 table table-striped" id="datatable">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>name</th>
                        <th>email</th>
                        <th>role</th>
                        <th>created_at</th>
                        <th>updated_at</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    <!--//TODO User NAMING EXIMYX -->

    <div class="modal fade" id="User-modal" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-lg " style="max-width:20rem">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="modal_title" class="modal-title">User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="javascript:void(0)" id="UserForm" name="UserForm" class="form" method="POST"
                        enctype="multipart/form-data">
                        <input type="hidden" name="id" id="id" @error('id')is-invalid @enderror>
                        @error('id')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                        <div class="form-group">
                            <input name="name" type="text"
                                class="form-control form-control-user @error('name')is-invalid @enderror" id="name"
                                placeholder="Name">
                            @error('name')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input name="email" type="email"
                                class="form-control form-control-user @error('email')is-invalid @enderror" id="email"
                                placeholder="Email Address">
                            @error('email')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input name="password" type="password"
                                class="form-control form-control-user @error('password')is-invalid @enderror" id="password"
                                placeholder="Password">
                            @error('password')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            {{-- @if (au) --}}
                            {{-- {{$id}} --}}
                            <select class="form-select" name="role" id="role" aria-label="Default select example">
                                @foreach ($roles as $id => $role)
                                    <option {{ $id == 0 ? 'selected' : '' }} value="{{ $id }}">{{ $role }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="my-2">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
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
                        data: 'role',
                        name: 'role'
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
            $('#UserForm')[0].reset();
            $('#summernote-content').summernote('reset');
            $('#UserModal').html("Add User");
            $('#modal_title').html("Add User");
            $('#User-modal').modal('show');
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
                    $('#UserForm')[0].reset();
                    $('#modal_title').html("Edit User");
                    $('#User-modal').modal('show');
                    $('#id').val(res.id);
                    $('#name').val(res.name);
                    $('#email').val(res.email);
                    $('#password').val(res.password);
                    // $('#role')
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

        $('#UserForm').submit(function(e) {
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
                    $("#User-modal").modal('hide');
                    var oTable = $('#datatable').dataTable();
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
