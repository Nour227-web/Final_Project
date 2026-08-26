<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset("assets/css/bootstrap.min.css") }}">
    <!-- Scripts -->
</head>
<body>
    @include('layouts.navbar')

    @yield("content")
    <script src="{{ asset("assets/js/bootstrap.bundle.min.js") }}"></script>

</body>
</html>
