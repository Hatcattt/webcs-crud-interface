<!doctype html>
<html lang="fr" data-theme="dark">
@include('layouts.partials.head')

<body>
@include('layouts.partials.navbar')

<main>
    <hgroup style="margin-left: 50px;">
        <h1>@yield('title', '')</h1>
        <h2>@yield('title_small', '')</h2>
    </hgroup>

    <article style="margin: 0 !important;">
        @yield('content')
    </article>
</main>

@include('layouts.partials.footer')

<!-- Minimal theme switcher : pico-css -->
<script src="{{ asset('js/minimal-theme-switcher.js') }}"></script>
</body>
</html>
