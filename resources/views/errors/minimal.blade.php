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
    <script src="{{ secure_asset('js/app.js') }}" defer></script>

    <!-- place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ secure_asset('img/icon/favicon.png') }}">
    <!-- Google Font css -->

    {{-- Styles --}}
    @include('partials/_stylesheets')
</head>

<body>
    <div id="app" class="wrapper">
        {{-- Header --}}
        @include('partials/_header')

        {{-- Main Content --}}
        <main>
            <div class="error404-area pb-60 pt-20">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="error-wrapper text-center">
                                <div class="error-text">
                                    <h1>@yield('code')</h1>
                                    <h2>@yield('message')</h2>
                                    <p>Sorry but the page you are looking for does not exist, have been removed, name
                                        changed or is
                                        temporarily unavailable.</p>
                                </div>
                                {{-- <div class="search-error">
                                    <form id="search-form" action="#">
                                        <input type="text" placeholder="Search">
                                        <button><i class="fa fa-search"></i></button>
                                    </form>
                                </div> --}}
                                <div class="error-button">
                                    <a href="{{ url('/') }}">Back to home page</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
