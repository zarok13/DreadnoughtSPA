<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Dreadnought') }}</title>

    <!-- Styles -->
    <link href="{{ asset('scripts/admin/css/app.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('scripts/admin/css/adminlte.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('scripts/admin/css/main.css') }}">
    <!-- Plugins -->
    <link href="{{ asset('scripts/admin/css/icheck-bootstrap.min.css') }}" rel="stylesheet">
    <!-- Icons -->
    <link href="{{ asset('scripts/admin/css/fontawesome.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- Scripts - jQuery/Bootstrap -->
    <script src="{{ asset('scripts/admin/js/app.js') }}"></script>
</head>

<body class="hold-transition login-page">
    @yield('content')
    <!-- AdminLTE App -->
    <script src="{{ asset('scripts/admin/js/adminlte.min.js') }}"></script>
</body>

</html>
