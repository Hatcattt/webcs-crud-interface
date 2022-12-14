<!doctype html>
<html lang="fr" data-theme="dark">
@include('layouts.partials.head')

<body>
@include('layouts.partials.navbar')

<main class="container">
    <article class="grid">
        @yield('content')
    </article>
</main>

@include('layouts.partials.footer')

<!-- Minimal theme switcher : pico-css -->
<script src="{{ asset('js/minimal-theme-switcher.js') }}"></script>
</body>
</html>
