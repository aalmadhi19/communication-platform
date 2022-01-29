<!doctype html>
<html dir="rtl" lang="ar">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>تسجيل</title>

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
    <form class="form-signin" method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
        @csrf

        <div class="text-center mb-4">
            <img class="mb-2" src="{{ asset('styles/img/logo_mu.svg') }}" alt="" width="144" height="88">
            <h1 class="h3 mb-3 font-weight-normal">تسجيل</h1>
        </div>

        <div class="form-label-group">
            <input type="text" id="inputName" name="name" class="form-control @error('name') is-invalid @enderror"
                required autofocus value="{{ old('name') }}">
            <label for="inputName">الاسم</label>

            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

         <div class="form-label-group">
              <div class="custom-file">
            <input type="file" id="inputavatar" name="avatar"  class="custom-file-input @error('avatar') is-invalid @enderror" id="customFileLangHTML">
            <label style="color: #495057;font-weight: 400; ine-height: 1.5;" class="custom-file-label btn-file" for="inputavatar" data-browse="استعراض"> الصورة الشخصية</label>

        </div>
            @error('avatar')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-label-group">
            <input type="email" id="inputEmail" name="email" class="form-control @error('email') is-invalid @enderror"
                required autocomplete="email"  value="{{ old('email') }}" >
            <label for="inputEmail">البريد الإلكتروني</label>

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-label-group">
            <input type="text" id="inputPhone" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}"
                required >
            <label for="inputPhone">الجوال</label>
            <small class="text-left float-right">ex:05XXXXXXXX</small><br>
            @error('phone')
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

        <div class="form-label-group">
            <input type="password" id="password_confirmation" name="password_confirmation"
                class="form-control @error('password_confirmation') is-invalid @enderror" required>
            <label for="password_confirmation">تأكيد كلمة المرور </label>

            @error('password_confirmation')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <button type="submit" class="btn-green btn-lg btn-block text-white hvr-wobble-horizontal">
            تسجيل
        </button>


        <hr>
        <p class="mt-5 mb-3 text-center" style="font-size:14px;">&copy; تطوير عبدالعزيز الماضي</p>

    </form>
    <!-- end - login -->
    @extends('layouts.js')
</body>

</html>
