<nav class="container-fluid navi">
    <ul>
        <li class="fa-solid fa-cog fa-spin fa-xl" style="--fa-animation-duration: 6s;"></li>
        <li><a href="./" class="contrast" title="@lang('Home')"><strong>Crud-Project</strong></a></li>
        @auth
            <li>
                <a href="{{ route('crud.index') }}" class="outline" title="Manage your organisation">
                    <span class="fa-solid fa-gears"></span> Manage
                </a>
            </li>

            @if (Auth::user()->role === 'admin')
                <li>
                    <a href="{{ route('export.index') }}" class="outline" title="@lang('Export to Excel')">
                        <span class="fa-solid fa-file-export"></span> Export
                    </a>
                </li>
            @endif

            <li style="padding-left: 20px; font-size: 17px;">You are connect 
                <a class="users-edit-nav" href={{ Auth::user()->role === 'admin' ? route('users.index') : route('users.edit', Auth::user()) }}>
                    <strong>{{ Auth::user()->username }}</strong>
                </a>
            </li>
        @endauth
    </ul>
    <ul>
        <li>
            <details role="list" dir="rtl">
                <summary aria-haspopup="listbox" role="link" class="contrast"
                         style="font-size: 20px;">@lang('Theme')</summary>
                <ul role="listbox">
                    <li><a title="@lang('Dark')" href="#" data-theme-switcher="auto">Auto</a></li>
                    <li><a href="#" data-theme-switcher="light">@lang('Light')</a></li>
                    <li><a href="#" data-theme-switcher="dark">@lang('Dark')</a></li>
                </ul>
            </details>
        </li>
        @auth
            <li>
                <a title="@lang('Log Out')" class="fa-solid fa-power-off" href="{{ route('logout.perform') }}"></a>
            </li>
        @endauth

        @guest
            <li>
                <a href="{{ route('login.perform') }}" role="button">@lang('Log In')</a>
                <a href="{{ route('register.perform') }}" role="button">@lang('Register')</a>
            </li>
        @endguest
    </ul>
</nav>
