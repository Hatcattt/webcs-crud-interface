<nav class="container-fluid navi">
    <ul>
        <li><a href="./" class="contrast" onclick="event.preventDefault()"><strong>Crud Project</strong></a></li>
    </ul>
    <ul>
        <li>
            <details role="list" dir="rtl">
                <summary aria-haspopup="listbox" role="link" class="contrast">@lang('Theme')</summary>
                <ul role="listbox">
                    <li><a href="#" data-theme-switcher="auto">Auto</a></li>
                    <li><a href="#" data-theme-switcher="light">Light</a></li>
                    <li><a href="#" data-theme-switcher="dark">Dark</a></li>
                </ul>
            </details>
        </li>
        @auth
            {{auth()->user()->name}}
            <li>
                <a href="{{ route('logout.perform') }}" role="button">Logout</a>
            </li>
        @endauth

        @guest
            <li>
                <a href="{{ route('login.perform') }}" role="button">Login</a>
                <a href="{{ route('register.perform') }}" role="button">Sign-up</a>
            </li>
        @endguest
    </ul>
</nav>
