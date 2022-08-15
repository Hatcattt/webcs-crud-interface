@extends('layouts.app-master')

@section('title', "Officer")
@section('title_small', "Voici le contenu de la table.")

@section('content')

    @if ($message = Session::get('error'))
        <div><p style="color: red">{{ $message }}</p></div>
    @endif

    @if ($message = Session::get('success'))
        <div><p style="color: green">{{ $message }}</p></div>
    @endif
    @if (Auth::user()->role === 'admin')
        <a title="Create new one" role="button" href="{{ route('officer.create') }}">CREATE</a>
    @endif
    <figure>
        <table>
            <thead>
            @include('layouts.partials.columns-name')

            </thead>
            <tbody>
            @foreach($officers as $officer)
                <tr>
                    <td>{{ $officer->officer_id }}</td>
                    <td>{{ $officer->end_date }}</td>
                    <td>{{ $officer->first_name }}</td>
                    <td>{{ $officer->last_name }}</td>
                    <td>{{ $officer->start_date }}</td>
                    <td>{{ $officer->title }}</td>
                    <td>{{ $officer->cust_id }}</td>

                    <td>
                        <form action="{{ route('officer.destroy', $officer) }}" method="POST" id="del">
                                <a type="button" title="Show" href="{{ route('officer.show', $officer) }}" class="fa-solid fa-eye fa-2xl"></a>

                            @if(Auth::user()->role === 'admin')
                                <a title="Edit" href="{{ route('officer.edit', $officer) }}" class="fa-solid fa-pen-to-square fa-2xl"></a>
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
