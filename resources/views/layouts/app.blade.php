<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('css/materialize.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="{{ asset('css/sweetalert.css') }}" rel="stylesheet" type="text/css">
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/materialize.js') }}"></script>
    @yield('content_css')
    <title>{{ config('app.name', 'Expediente Clínico Electrónico') }}</title>
</head>
<body>
    @include('includes.header')
    @auth
    @include('includes.sidenav')
    @endauth
    @yield('content')
    <script src="{{ asset('js/sweetalert.js') }}"></script>
    <script src="{{ asset('js/header.js') }}"></script>
    @yield('content_js')
</body>
</html>