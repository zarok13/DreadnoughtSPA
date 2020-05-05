<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Dreadnought') }}</title>

    <!-- Styles -->
    <link href="{{ asset('blade_components/admin/css/app.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('blade_components/admin/css/adminlte.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('blade_components/admin/css/main.css') }}">
    <!-- Plugins -->
    <link href="{{ asset('blade_components/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}" rel="stylesheet">
    <!-- Icons -->
    <link href="{{ asset('blade_components/admin/fonts/fontawesome/css/all.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition login-page">
    @yield('content')
    <!-- Scripts - jQuery/Bootstrap -->
    <script src="{{ asset('blade_components/admin/js/app.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('blade_components/admin/js/adminlte.min.js') }}"></script>
</body>

</html>
