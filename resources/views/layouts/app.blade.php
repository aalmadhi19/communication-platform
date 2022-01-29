<!doctype html>
<html dir="rtl" lang="ar">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" href="{{ asset('styles/img/logo_mu.svg') }}">
        <title></title>
        @include('layouts.main-css')
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </head>
    <body>
        @include('sweet::alert')
        @guest
        @else
        @include('layouts.header')
        @endguest
            <div class="body-content">
                @yield('content')
            </div>
        @include('layouts.js')
    </body>
</html>
