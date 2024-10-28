<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/customer-style.css')}}">
    <link rel="stylesheet" href="{{asset('css/home.css')}}">
    <title>@yield('title')</title>
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">

</head>
<body class="auth">
<!--============================
    HEADER START
==============================-->
<header>
    <div class="container">
        <div class="row align-items-center">
            <!-- Logo Section (Always Visible) -->
            <div class="col-12 col-md-2">
                <div class="logo">
                    <a class="company_logo" href="{{ route('products.index', ['lang' => app()->getLocale()]) }}">
                        <img src="{{ asset('images/logos/Dookan_logo.png') }}" alt="logo" class="img-fluid w-50">
                    </a>
                </div>
            </div>
        </div>
    </div>
</header>
<!--============================
    HEADER END
==============================-->

<div class="content">
    @yield('content')
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="{{ asset('js/check_inputs.js') }}"></script>

</body>
</html>
