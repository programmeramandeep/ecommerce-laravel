<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <base href="{{ config('app.url', 'http://localhost:8000') }}">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Lily+Script+One" rel="stylesheet">

    <!-- place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="img/icon/favicon.png" />

    <!-- Google Font css -->
    <link href="https://fonts.googleapis.com/css?family=Lily+Script+One" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    {{-- Styles --}}
    @include('partials/_stylesheets')

    @stack('extra_css')
</head>

<body>
    <div id="app" class="wrapper">
        {{-- Header --}}
        @include('partials/_header')

        {{-- Main Content --}}
        <main>
            @yield('content')
        </main>

        {{-- Brand Logo --}}
        @include('partials/_brand-logo')

        {{-- Footer --}}
        @include('partials/_footer')
    </div>

    {{-- Scripts --}}
    @include('partials/_scripts')

    @stack('extra_js')
</body>

</html>