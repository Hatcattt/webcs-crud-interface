@extends('layouts.auth-master')

@section('content')
    <article class="grid">
        <div>
            <hgroup>
                <h1>@lang('Register')</h1>
                <h2>@lang('Complete this to proceed to the next step')</h2>
            </hgroup>
            <form method="POST" action="{{ route('register.perform') }}">
                @csrf

                @include('layouts.partials.messages')
                <div>
                    <label for="email">@lang('Email Address')</label>
                    <input type="email" name="email" value="{{ old('email') }}" placeholder="name@example.com" required="required" autofocus>
                </div>
                <div>
                    <label for="username">@lang('Username')</label>
                    <input type="text" name="username" value="{{ old('username') }}" placeholder="Username" required="required" autofocus>
                </div>
                <div>
                    <label for="password">@lang('Password')</label>
                    <input type="password" name="password" value="{{ old('password') }}" placeholder="Password" required="required">
                </div>
                <div>
                    <label for="password_confirmation">@lang('Confirm Password')</label>
                    <input type="password" name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="Confirm Password" required="required">
                </div>

                <button class="contrast" type="submit">@lang('Register')</button>
            </form>
        </div>
    </article>
@endsection
