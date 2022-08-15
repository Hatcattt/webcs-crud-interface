@extends('layouts.app-master')

@section('title', "Department")
@section('title_small', "Voici le contenu de la table.")

@section('content')

    @if ($message = Session::get('error'))
        <div><p style="color: red">{{ $message }}</p></div>
    @endif

    @if ($message = Session::get('success'))
        <div><p style="color: green">{{ $message }}</p></div>
    @endif
    @if (Auth::user()->role === 'admin')
        <a title="Create new one" role="button" href="{{ route('department.create') }}">CREATE</a>
    @endif
    <figure>
        <table>
            <thead>
            @include('layouts.partials.columns-name')

            </thead>
            <tbody>
            @foreach($departments as $department)
                <tr>
                    <td>{{ $department->dept_id }}</td>
                    <td>{{ $department->name }}</td>

                    <td>
                        <form action="{{ route('department.destroy', $department) }}" method="POST" id="del">
                                <a type="button" title="Show" href="{{ route('department.show', $department) }}" class="fa-solid fa-eye fa-2xl"></a>

                            @if(Auth::user()->role === 'admin')
                                <a title="Edit" href="{{ route('department.edit', $department) }}" class="fa-solid fa-pen-to-square fa-2xl"></a>
                                @csrf
                                @method('DELETE')
                                <button title="Delete" type="submit" class="fa fa-fw fa-trash fa-2xl outline"></button>
                            @endif
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </figure>
@endsection
