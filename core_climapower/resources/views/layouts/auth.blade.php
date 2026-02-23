<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>{{ config('app.name', 'Laravel') }}</title>
        <meta content="{{ trans('global.global_title') }}" name="description" />
        <meta content="{{ trans('global.global_title') }}" name="author" />
        <link rel="icon" type="image/x-icon" href="{{ url('files/images/favicon.ico') }}">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="{{ url('/extras/assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <link href="{{ url('/extras/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ url('/extras/assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
    </head>
    <body style="background-image: url('{{ url('files/images/loginadmin.jpeg') }}'); background-size: 100%;">
        @yield('content')
        <script src="{{ url('/extras/assets/libs/jquery/jquery.min.js') }}"></script>
        <script src="{{ url('/extras/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ url('/extras/assets/libs/metismenu/metisMenu.min.js') }}"></script>
        <script src="{{ url('/extras/assets/libs/simplebar/simplebar.min.js') }}"></script>
        <script src="{{ url('/extras/assets/libs/node-waves/waves.min.js') }}"></script>
        <script src="{{ url('/extras/assets/js/app.js') }}"></script>
    </body>
</html>