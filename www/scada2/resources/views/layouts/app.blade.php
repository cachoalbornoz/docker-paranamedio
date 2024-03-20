<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @auth
        <title>@yield('title')</title>
    @else
        <title>Scada - Parana Medio</title>
        {!! htmlScriptTagJsApi() !!}
    @endauth

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/favicon/apple-touch-icon.png?v=20220524') }}">
    <link rel="icon" type="image/png" sizes="32x32"
        href="{{ asset('images/favicon/favicon-32x32.png?v=20220524') }}">
    <link rel="icon" type="image/png" sizes="16x16"
        href="{{ asset('images/favicon/favicon-16x16.png?v=20220524') }}">
    <link rel="mask-icon" href="{{ asset('images/favicon/safari-pinned-tab.svg?v=20220524') }}" color="#7f39fb">
    <link rel="shortcut icon" href="{{ asset('images/favicon/favicon.ico?v=20220524') }}">


    @auth
        <link rel="stylesheet" href="{{ asset('assets/css/jquery.dataTables.min.css') }}">
    @endauth

    <link rel="stylesheet" href="{{ asset('assets/alertifyjs/css/alertify.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/alertifyjs/css/themes/default.min.css') }}" />


    @vite(['resources/sass/app.scss', 'resources/js/app.js'])


</head>

<body>
    <div id="app">

        @include('layouts.navbar')

        <main class="py-4">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        @yield('content')
                    </div>
                </div>
            </div>
        </main>
    </div>

    @auth

        <script type="module">
            @if (Session::has('message'))
                var type = "{{ Session::get('alert-type') }}";
                switch (type) {

                    case 'success':
                        alertify.notify("{{ Session::get('message') }}", 'success', 3, function() {});
                        break;

                    case 'error':
                        alertify.notify("{{ Session::get('message') }}", 'error', 3, function() {});
                        break;
                }
            @endif
        </script>
    @endauth

    @yield('js')

    <script>
        var APP_URL = {!! json_encode(url('/')) !!};
    </script>

    <!-- JavaScript -->
    <script src="{{ asset('assets/alertifyjs/alertify.js') }}"></script>

</body>

</html>
