<nav class="container-fluid navi">
    <ul>
        <li class="fa-solid fa-cog fa-spin fa-xl" style="--fa-animation-duration: 6s;"></li>
        <li><a href="./" class="contrast" title="@lang('Home')"><strong>Crud Project</strong></a></li>
    </ul>
    <ul>
        <li>
            <details role="list" dir="rtl">
                <summary aria-haspopup="listbox" role="link" class="contrast" style="font-size: 20px;">@lang('Theme')</summary>
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
                <a title="@lang('Log Out')" class="fa-solid fa-power-off" href="{{ route('logout.perform') }}" role="button"></a>
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
