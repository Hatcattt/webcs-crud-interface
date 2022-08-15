@extends('layouts.app-master')

@section('title', "Business")
@section('title_small', "Voici le contenu de la table.")

@section('content')

    @if ($message = Session::get('error'))
        <div><p style="color: red">{{ $message }}</p></div>
    @endif

    @if ($message = Session::get('success'))
        <div><p style="color: green">{{ $message }}</p></div>
    @endif
    @if (Auth::user()->role === 'admin')
        <a title="Create new one" role="button" href="{{ route('business.create') }}">CREATE</a>
    @endif
    <figure>
        <table>
            <thead>
            @include('layouts.partials.columns-name')

            </thead>
            <tbody>
            @foreach($businesses as $business)
                <tr>
                    <td>{{ $business->incorp_date }}</td>
                    <td>{{ $business->name }}</td>
                    <td>{{ $business->state_id }}</td>
                    <td>{{ $business->cust_id }}</td>

                    <td>
                        <form action="{{ route('business.destroy', $business) }}" method="POST" id="del">
                                <a type="button" title="Show" href="{{ route('business.show', $business) }}" class="fa-solid fa-eye fa-2xl"></a>

                            @if(Auth::user()->role === 'admin')
                                <a title="Edit" href="{{ route('business.edit', $business) }}" class="fa-solid fa-pen-to-square fa-2xl"></a>
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
