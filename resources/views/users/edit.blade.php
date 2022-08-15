@extends('layouts.app-master')

@section('title', "Changement de rôle")
@section('title_small', "Ici, vous pouvez changer le rôle des users.")

@section('content')
    <figure>
        <table>
            <thead>
            <tr>
                <th scope="col">N°</th>
                <th scope="col">Username</th>
                <th scope="col">Email</th>
                <th scope="col">Rôle</th>
                <th scope="col">Make</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                @if (Auth::user()->username === $user->username) @continue @endif

                <tr>
                    <th scope="row">{{ $user->id-1 }}</th>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>
                    <td>
                        @if ($user->role === 'reader')
                        <label for="switch">
                            <input type="checkbox" id="switch" name="switch" role="switch">Admin
                        </label>
                        @else
                            <label for="switch">
                                <input type="checkbox" id="switch" name="switch" role="switch">Reader
                            </label>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div>
            <a role="button" title="Non implémenté" class="outline" disabled>Save</a>
        </div>
    </figure>
@endsection
