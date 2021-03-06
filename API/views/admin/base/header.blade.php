<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ isset($smallWindow) ? 'File Store' : config('app.name') }}</title>

    <!-- Styles -->
    <link type="text/css" rel="stylesheet" href="{{ asset('scripts/admin/css/app.css') }}">
    <link href="{{ asset('scripts/admin/css/dataTables.bootstrap4.min.css') }}"
          rel="stylesheet">
    <link href="{{ asset('scripts/admin/css/adminlte.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('scripts/admin/css/main.css') }}">
    <!-- Plugins -->
    <link href="{{ asset('scripts/admin/css/icheck-bootstrap.min.css') }}"
          rel="stylesheet">
    <link href="{{ asset('scripts/admin/css/OverlayScrollbars.min.css') }}"
          rel="stylesheet">
    <link href="{{ asset('scripts/admin/css/toastr.min.css') }}" rel="stylesheet">
    <link href="{{ asset('scripts/admin/css/sweetalert2.min.css') }}" rel="stylesheet">
    <!-- Icons/Fonts -->
    <link rel="shortcut icon" href="{{ asset('images/admin/favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('scripts/admin/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- jQuery/Bootstrap -->
    <script src="{{ asset('scripts/admin/js/app.js') }}"></script>
</head>
