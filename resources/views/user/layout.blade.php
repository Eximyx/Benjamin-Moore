<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    @include('../layouts.scripts')
</head>
<body>
    <div class="container p-0">
        @include('user.navbar')
        @include('user.style')
        <div id="content" class="container p-0 ">
            @yield('contents')
        </div>

        <div id="footer">
            @include('user.footer')
        </div>
        {{-- <nav></nav> --}}
    </div>
</body>
@yield('scripts')
</html>