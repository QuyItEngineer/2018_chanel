<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <title>{{config('app.name')}} @yield('title')</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @yield('css')
</head>

<body>
<div id="app">
    @yield('content')
</div>
<!-- Scripts -->
<script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
<script src="{{ asset('js/app.js') }}"></script>
@yield('scripts')
</body>
</html>
