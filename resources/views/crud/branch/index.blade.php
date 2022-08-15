@extends('layouts.app-master')

@section('title', "Branch")
@section('title_small', "Voici le contenu de la table.")

@section('content')

    @if ($message = Session::get('error'))
        <div><p style="color: red">{{ $message }}</p></div>
    @endif

    @if ($message = Session::get('success'))
        <div><p style="color: green">{{ $message }}</p></div>
    @endif
    @if (Auth::user()->role === 'admin')
        <a title="Create new one" role="button" href="{{ route('branch.create') }}">CREATE</a>
    @endif
    <figure>
        <table>
            <thead>
            @include('layouts.partials.columns-name')

            </thead>
            <tbody>
            @foreach($branches as $branch)
                <tr>
                    <td>{{ $branch->branch_id }}</td>
                    <td>{{ $branch->address }}</td>
                    <td>{{ $branch->city }}</td>
                    <td>{{ $branch->name }}</td>
                    <td>{{ $branch->state }}</td>
                    <td>{{ $branch->zip_code }}</td>

                    <td>
                        <form action="{{ route('branch.destroy', $branch) }}" method="POST" id="del">
                                <a type="button" title="Show" href="{{ route('branch.show', $branch) }}" class="fa-solid fa-eye fa-2xl"></a>

                            @if(Auth::user()->role === 'admin')
                                <a title="Edit" href="{{ route('branch.edit', $branch) }}" class="fa-solid fa-pen-to-square fa-2xl"></a>
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
