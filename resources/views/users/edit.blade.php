@extends('layouts.app-master')

@section('title')
    {{ Auth::user() == $user ? "Edit yourself" : "Edit a User"}}
@endsection
@section('title_small', "Editez un utilisateur du system.")

@section('content')
    @include('layouts.partials.errors')

    <div>
        <form method="POST" action="{{ route('users.update', $user) }}"  role="form" enctype="multipart/form-data">
            {{ method_field('PATCH') }}
            @csrf

            <div class="form-group">
                {{ Form::label('username', 'User Name') }}
                {{ Form::text('username', old('username', $user), ['placeholder' => 'ex : Super User']) }}
            </div>
            <div class="form-group">
                {{ Form::label('email', 'Email') }}
                {{ Form::text('email', $user->email, ['placeholder' => 'ex : example@gmail.com']) }}
            </div>
            <div class="form-group">
                {{ Form::label('password', 'Password') }}
                {{ Form::password('password', old('password')) }}
            </div>
            @if(Auth::user()->username != $user->username)
                <div class="form-group">
                    {{ Form::label('role') }}
                    {{ Form::select('role', $user->roles(), old('role', $user), ['class' => 'form-control']) }}
                </div>
            @endif
            <div class="box-footer mt20">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            <div class="btn-back">
                <a title="Stop and return" role="button" href={{ Auth::user()->role == 'reader' ? route('home.index') : route('users.index') }}> Cancel</a>
            </div>
        </form>
    </div>
@endsection
