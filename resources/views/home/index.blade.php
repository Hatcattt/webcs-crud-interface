@extends('layouts.app-master')

@section('content')
    <div>
        @auth
            <h1>Dashboard</h1>
            <p>Only authenticated users can access this section.</p>
            <a href="https://codeanddeploy.com" role="button">View more tutorials here &raquo;</a>
        @endauth

        @guest
            <h1>@lang('Homepage')</h1>
            <p class="lead">Your viewing the home page. Please login to view the restricted data.</p>
        @endguest
    </div>
@endsection
