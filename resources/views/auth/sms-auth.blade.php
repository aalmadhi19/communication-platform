<!doctype html>
<html dir="rtl" lang="ar">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>التحقق</title>

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
    <form class="form-signin" method="POST" action="{{ route('sms-auth-login') }}">
        @csrf

        <div class="text-center mb-4">
            <img class="mb-2" src="{{ asset('styles/img/logo_mu.svg') }}" alt="" width="144" height="88">
            <br>
            <h1 class="h3 mb-3 font-weight-normal">التحقق</h1>
        </div>
        @if (session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
        @endif
        @error('phone')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <input type="hidden" name="phone" value="{{ session('phone') }}">
        <input type="hidden" name="email" value="{{ session('email') }}">

        <div class="form-input-group">
            <label for="code" style="padding-top: -2rem;"> </label>
            <input type="text" id="code" name="code" class="form-control @error('code') is-invalid @enderror"
                placeholder="ادخل رمز التحقق المرسل الى جوالك" required autofocus> <br>
            @error('code')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>


        <button type="submit" onclick="submitForm(this);" class="btn-green btn-lg btn-block text-white hvr-wobble-horizontal">
            تحقق
        </button>
        <hr>


        <p class="mt-5 mb-3 text-center" style="font-size:14px;">&copy; تطوير عبدالعزيز الماضي</p>

    </form>
    <!-- end - Auth -->
    @extends('layouts.js')
</body>

<script>
    function submitForm(btn) {
        // disable the button
        btn.disabled = true;
        // submit the form
        btn.form.submit();
    }
</script>
</html>
