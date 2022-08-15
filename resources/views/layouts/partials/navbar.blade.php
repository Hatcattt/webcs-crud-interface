<nav class="container-fluid navi">
    <ul>
        <li class="fa-solid fa-cog fa-spin fa-xl" style="--fa-animation-duration: 6s;"></li>
        <li><a href="./" class="contrast" title="@lang('Home')"><strong>Crud-Project</strong></a></li>
        @auth
            <li><a href="{{ route('crud.index') }}" class="outline" title="@lang('CRUD Interface')">
                    <span class="fa-solid fa-gears"></span> Interface</a></li>

            @if (Auth::user()->role === 'admin')
                <li><a href="{{ route('export.index') }}" class="outline" title="@lang('Export to Excel')">
                        <span class="fa-solid fa-file-export"></span> Export</a></li>
            @endif
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
            <details role="list" dir="rtl">
                <summary title="@lang('Parameters')" aria-haspopup="listbox" role="link" class="contrast"><span
                        style="margin: auto" class="fa-solid fa-gear"></span></summary>
                <ul role="listbox">
                    <li><a title="@lang('Log Out')" class="fa-solid fa-power-off"
                           href="{{ route('logout.perform') }}"></a></li>

                    @if (Auth::user()->role === 'admin')
                        <li><a title="@lang('Administration')" class="fa-solid fa-user-large secondary"
                               href="{{ route('users.edit') }}"></a></li>
                    @endif
                </ul>
            </details>
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
