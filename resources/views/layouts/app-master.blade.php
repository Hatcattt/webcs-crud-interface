<!doctype html>
<html lang="fr" data-theme="dark">
@include('layouts.partials.head')

<body>
@include('layouts.partials.navbar')

<main>
    <hgroup style="text-align: center">
        <h1>@yield('title', '')</h1>
        <h2>@yield('title_small', '')</h2>
    </hgroup>

    <article style="margin-left: 8% !important; margin-right: 8% !important;">
        @yield('content')
    </article>

    @include('layouts.partials.footer')
</main>

<!-- Minimal theme switcher : pico-css -->
<script src="{{ asset('js/minimal-theme-switcher.js') }}"></script>

</body>
</html>
