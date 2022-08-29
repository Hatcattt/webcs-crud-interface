@extends('layouts.app-master')

@section('content')
    <div class="container">
        @auth
        @section('title', "Welcome home !")
        @section('title_small', "Que fait-on aujourd'hui ?")
        <div class="grid">
            <div>
                <h3 style="text-align: center; margin-bottom: 5px !important;">{{ Auth::user()->role === 'admin' ? 'Management' : 'Take a look'}}</h3>
                <p style="text-align: center; margin-bottom: 5px !important;">
                    {{ Auth::user()->role === 'admin' ? 'Managez votre organisation' : 'Jetez un oeil à votre organisation'}}
                </p>
                <div>
                    <a href="{{ route('crud.index') }}">
                        <button style="height: 100px;" class="fa-solid {{ Auth::user()->role === 'admin' ? 'fa-gear' : 'fa-eye' }} fa-2xl"></button>
                    </a>
                </div>
            </div>
            @if(Auth::user()->role === 'admin')
                <div>
                    <h3 style="text-align: center; margin-bottom: 5px !important;">Export datas</h3>
                    <p style="text-align: center; margin-bottom: 5px !important;">Exportez vos données en Excel</p>
                    <div>
                        <a href="{{ route('export.index') }}"><button style="height: 100px;" class="fa-solid fa-file-excel fa-2xl"></button></a>
                    </div>
                </div>
                <div>
                    <h3 style="text-align: center; margin-bottom: 5px !important;">Admin panel</h3>
                    <p style="text-align: center; margin-bottom: 5px !important;">Modifiez les utilisateurs du système</p>
                    <div>
                        <a href="{{ route('users.index') }}"><button style="height: 100px;" class="fa-solid fa-user-lock fa-2xl"></button></a>
                    </div>
                </div>
            @endif
        </div>
        @endauth

        @guest
            @section('title', "Bienvenue !")
            @section('title_small', "Merci de vous logger ou de vous inscrire.")
        @endguest
    </div>
@endsection
