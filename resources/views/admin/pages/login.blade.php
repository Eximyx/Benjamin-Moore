<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>SB Admin 2 - Login</title>
    <!-- Custom fonts for this template-->
    <link href="{{ asset('admin_assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Commissioner:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('admin_assets/css/admin-panel.css')}}">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
{{--    <link href="{{ asset('admin_assets/css/sb-admin-2.min.css') }}" rel="stylesheet">--}}
</head>
<body class="login-body">
<div class="login-block">
    <h1>Welcome Back!</h1>
    <form action="{{ route('login.action') }}" method="POST" class="login-form">
        @csrf
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <input name="email" type="email"
               id="exampleInputEmail" aria-describedby="emailHelp"
               placeholder="Enter Email Address...">

        <input name="password" type="password"
               id="exampleInputPassword" placeholder="Password">

        <div class="custom-control custom-checkbox small">
            <input name="remember" type="checkbox"
                   id="customCheck">
            <label for="customCheck">Remember
                Me</label>
        </div>

        <button type="submit" class="button-filled">Login</button>
    </form>

</div>
<!-- Bootstrap core JavaScript-->
<script src="{{ asset('admin_assets/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('admin_assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- Core plugin JavaScript-->
<script src="{{ asset('admin_assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
<!-- Custom scripts for all pages-->
<script src="{{ asset('admin_assets/js/sb-admin-2.min.js') }}"></script>
</body>
</html>
