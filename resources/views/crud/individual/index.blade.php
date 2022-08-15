@extends('layouts.app-master')

@section('title', "Individual")
@section('title_small', "Voici le contenu de la table.")

@section('content')

    @if ($message = Session::get('error'))
        <div><p style="color: red">{{ $message }}</p></div>
    @endif

    @if ($message = Session::get('success'))
        <div><p style="color: green">{{ $message }}</p></div>
    @endif
    @if (Auth::user()->role === 'admin')
        <a title="Create new one" role="button" href="{{ route('individual.create') }}">CREATE</a>
    @endif
    <figure>
        <table>
            <thead>
            @include('layouts.partials.columns-name')

            </thead>
            <tbody>
            @foreach($individuals as $individual)
                <tr>
                    <td>{{ $individual->birth_date }}</td>
                    <td>{{ $individual->first_name }}</td>
                    <td>{{ $individual->last_name }}</td>
                    <td>{{ $individual->cust_id }}</td>

                    <td>
                        <form action="{{ route('individual.destroy', $individual) }}" method="POST" id="del">
                                <a type="button" title="Show" href="{{ route('individual.show', $individual) }}" class="fa-solid fa-eye fa-2xl"></a>

                            @if(Auth::user()->role === 'admin')
                                <a title="Edit" href="{{ route('individual.edit', $individual) }}" class="fa-solid fa-pen-to-square fa-2xl"></a>
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
