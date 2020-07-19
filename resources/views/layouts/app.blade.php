<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Lily+Script+One" rel="stylesheet">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/icon/favicon.png') }}">
    <!-- Google Font css -->

    {{-- Styles --}}
    @include('partials/_stylesheets')
</head>

<body>
    <div id="app" class="wrapper">
        {{-- Header --}}
        @include('partials/_header')

        {{-- Breadcrumd --}}
        {{-- @include('partials/_breadcrumb') --}}

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
</body>

</html>