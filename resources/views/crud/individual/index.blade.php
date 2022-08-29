@extends('layouts.app-master')

@section('title', "Individuals")
@section('title_small', "Listez les informations de vos clients individuels.")

@section('content')

    @if ($message = Session::get('error'))
        <div><p style="color: red">{{ $message }}</p></div>
    @endif

    @if ($message = Session::get('success'))
        <div><p style="color: green">{{ $message }}</p></div>
    @endif
    @if (Auth::user()->role === 'admin')
    <div>
        <a title="Create new one" role="button" href="{{ route('customer.create') }}">CREATE</a>
        <small style="color: grey">Pour créer un nouveau client de type individuel, vous devez passer par la création d'un client global.</small>
    </div>
    @endif
    <figure>
        <table>
            <thead>
                <tr>
                    <th scope="col"><strong>Customer N°</strong></th>
                    <th scope="col"><strong>Birth Date</strong></th>
                    <th scope="col"><strong>First Name</strong></th>
                    <th scope="col"><strong>Last Name</strong></th>
                    <th scope="col"><strong>Address</strong></th>
                    <th scope="col"><strong>City</strong></th>
                    <th scope="col"><strong>Federal ID Code</strong></th>
                    <th scope="col"><strong>Postal Code</strong></th>
                    <th scope="col"><strong>State</strong></th>
                    <th><strong>Actions</strong></th>
                </tr>
            </thead>
            <tbody>
            @foreach($individuals as $individual)
                <tr>
                    <td>{{ $individual->cust_id }}</td>
                    <td>{{ $individual->birth_date }}</td>
                    <td>{{ $individual->first_name }}</td>
                    <td>{{ $individual->last_name }}</td>
                    <td>{{ $individual->customer->address }}</td>
                    <td>{{ $individual->customer->city }}</td>
                    <td>{{ $individual->customer->fed_id }}</td>
                    <td>{{ $individual->customer->postal_code }}</td>
                    <td>{{ $individual->customer->state }}</td>

                    <td>
                        <form action="{{ route('individual.destroy', $individual) }}" method="POST" class="no-mrg">
                            <div class="action-grid">
                                <div style="padding-right: 5px;">
                                    <a type="button" title="Show" href="{{ route('individual.show', $individual) }}" class="fa-solid fa-eye fa-2xl"></a>
                                </div>

                                @if(Auth::user()->role === 'admin')
                                    <div>
                                        <a title="Edit" href="{{ route('individual.edit', $individual) }}" class="fa-solid fa-pen-to-square fa-2xl"></a>
                                    </div>
                                    @csrf
                                    {{-- @method('DELETE')

                                    <div>
                                        <button style="padding: 0;" title="Delete" type="submit" class="fa fa-fw fa-trash fa-2xl outline"></button>
                                    </div> --}}
                                @endif
                            </div>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </figure>

    {{ $individuals->links() }}
    <div style="text-align: center">
        <a href="#" class="fa-solid fa-circle-arrow-up fa-2xl" title="Go top page"></a>
    </div>
@endsection
