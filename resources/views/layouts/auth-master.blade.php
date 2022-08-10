<!doctype html>
<html lang="fr" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Crud Project Interface for my course ( WEBCS ).">
    <meta name="author" content="Maxence Mercier / hatcattt">
    <title>Crud Project · WEBCS</title>

    <!-- Bootstrap core CSS -->
{{--    <link href="{!! url('assets/bootstrap/css/bootstrap.min.css') !!}" rel="stylesheet">--}}
{{--    <link href="{!! url('assets/css/signin.css') !!}" rel="stylesheet">--}}
    <link href="{{ asset('main.css') }}" rel="stylesheet">
    <link href="{{ asset('pico.css') }}" rel="stylesheet">

</head>
<body>
<main>
    @yield('content')
</main>

<!-- Minimal theme switcher : pico-css -->
<script src="{{ asset('js/minimal-theme-switcher.js') }}"></script>

</body>
</html>
