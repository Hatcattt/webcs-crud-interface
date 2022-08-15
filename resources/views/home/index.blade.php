@extends('layouts.app-master')

@section('content')
    <div class="container">
        @auth
            @section('title', "Dashboard")
                <h2>Bienvenue dans votre espace personnel !</h2>
        @endauth

        @guest
            <h1>@lang('Homepage')</h1>
            <h3>Bienvenue !</h3>
            <p>Merci de vous logger ou de vous inscrire pour continuer vers votre espace CRUD.</p>
        @endguest
    </div>
@endsection
