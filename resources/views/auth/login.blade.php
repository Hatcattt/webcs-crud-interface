@extends('layouts.auth-master')

@section('content')
    <article class="grid">
        <div>
            <hgroup>
                <h1>@lang('Log In')</h1>
                <h2>@lang('Continue to your crud interface')</h2>
            </hgroup>

            <form method="POST" action="{{ route('login.perform') }}">
                @csrf

                @include('layouts.partials.messages')
                <input type="email" name="email" value="{{ old('email') }}" placeholder="@lang('Email')" required="required" autofocus>
                <input type="password" name="password" placeholder="Password" aria-label="Password" autocomplete="current-password" required>

                <fieldset>
                    <label for="remember">
                        <input type="checkbox" role="switch" id="remember" name="remember">
                        Remember me
                    </label>
                </fieldset>

                <button type="submit" class="contrast">@lang('Login')</button>
            </form>
        </div>
        <div style="margin: auto">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab, aliquam debitis deserunt dolorum enim et eum exercitationem facere labore nostrum numquam officiis omnis placeat quo quod temporibus tenetur vel voluptate?</p>
        </div>
    </article>
@endsection
