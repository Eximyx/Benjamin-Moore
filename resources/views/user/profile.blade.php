@extends('user.layout')
@section('contents')
    <h1 class="mt-2 mb-0">Profile</h1>
    <hr />
    <form method="post" enctype="multipart/form-data" id="profile_setup_frm" action="javascript:void(0)">
        <div class="row">
            <div class="col-md-12 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Profile Settings</h4>
                    </div>
                    <div class="row" id="res"></div>
                    <div class="row mt-2">

                        <div class="col-md-6">
                            <label class="labels">Name</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="first name"
                                value="{{ auth()->user()->name }}">
                        </div>
                        <div class="col-md-6">
                            <label class="labels">Email</label>
                            <input type="text" name="email" id="email" class="form-control" value="{{ auth()->user()->email }}"
                                placeholder="Email">
                        </div>
                        <div class="col-md-6">
                            <label class="labels">Password</label>
                            <input type="text" name="password" id="password" class="form-control" placeholder="Password">
                        </div>
                    </div>
                    <div class="mt-5 text-center"><button id="btn" class="btn btn-primary profile-button"
                            type="submit">Save Profile</button></div>
                </div>
            </div>
        </div>
    </form>

    <script>

        $(document).ready(function() {
            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
            $('#profile_setup_frm').submit(function(e) {
                e.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    type: 'post',
                    url: "{{ url('admin/profile_set') }}",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: (data) => {
                        console.log(data);
                        $('#profile').html(data['name']);
                    },
                    error: function(data) {
                        console.log(data);
                    }
                });
            });

        });
    </script>
@endsection
