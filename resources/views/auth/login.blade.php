<!doctype html>
<html dir="rtl" lang="ar">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>منصة التواصل الجامعي</title>

    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('styles/css/login_02.css') }}">
    @include('layouts.main-css')
    <link rel="icon" href="{{ asset('styles/img/favicon.png') }}">
</head>


<body>
    <!--[if lte IE 9]>
                    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
                <![endif]-->
    <!-- login -->
    <form class="form-signin" method="POST" action="{{ route('login') }}">
        @csrf

        <div class="text-center mb-4">
            <img class="mb-2" src="{{ asset('styles/img/logo_mu.svg') }}" alt="" width="144" height="88">
            <h1 class="h3 mb-3 font-weight-normal">تسجيل الدخول</h1>
        </div>
        @if (session('error'))
        <div class="alert alert-danger" role="alert">
            {{session('error')}}
        </div>
        @endif
        @if (session('success'))
        <div class="alert alert-success " role="alert">
            {{session('success')}}
        </div>
        @endif


        <div class="form-label-group">
            <input type="email" id="inputEmail" name="email" class="form-control @error('email') is-invalid @enderror"
                required autocomplete="email" autofocus>
            <label for="inputEmail">البريد الإلكتروني</label>

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-label-group">
            <input type="password" id="inputPassword" name="password"
                class="form-control @error('password') is-invalid @enderror" required autocomplete="current-password">
            <label for="inputPassword">كلمة المرور </label>

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <button type="submit" class="btn-green btn-lg btn-block text-white hvr-wobble-horizontal">
            تسجيل دخول
        </button>
        <hr>

        <a href="{{ route('register') }}" class="mt-5 mb-3 text-center" style="font-size:14px;">ليس لديك حساب ؟ اضغط هنا</a>

        <p class="mt-5 mb-3 text-center" style="font-size:14px;">&copy; تطوير عبدالعزيز الماضي</p>

    </form>
    <!-- end - login -->
    @extends('layouts.js')
</body>

</html>
