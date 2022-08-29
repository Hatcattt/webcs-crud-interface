@extends('layouts.app-master')

@section('title', "Admin panel")
@section('title_small', "Modifiez, changez les roles, ou supprimez des users enregistrés.")

@section('content')
    @if ($message = Session::get('error'))
        <div><p style="color: red">{{ $message }}</p></div>
    @endif

    @if ($message = Session::get('success'))
        <div><p style="color: green">{{ $message }}</p></div>
    @endif
    
    <figure>
        <table>
            <thead>
            <tr>
                <th scope="col">Username</th>
                <th scope="col">Email</th>
                <th scope="col">Rôle</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>
                    <td>
                        <form action="{{ route('users.destroy', $user) }}" method="POST" class="no-mrg">
                            <div class="action-grid">
                            <div>
                                    <a title="Edit" href="{{ route('users.edit', $user) }}" class="fa-solid fa-pen-to-square fa-2xl"></a>
                                </div>
                                @csrf
                                @method('DELETE')

                                @if(Auth::user()->username != $user->username)
                                    <div>
                                        <button style="padding: 0;" title="Delete" type="submit" class="fa fa-fw fa-trash fa-2xl outline"></button>
                                    </div>
                                @endif
                            </div>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </figure>
@endsection
