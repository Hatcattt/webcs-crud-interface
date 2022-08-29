@extends('layouts.app-master')

@section('title', "Business")
@section('title_small', "Voici les clients de type Business.")

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
        <small style="color: grey">Pour créer un nouveau client de type business, vous devez passer par la création d'un client global.</small>
    </div>
    @endif
    <figure>
        <table>
            <thead>
                <tr>
                    <th scope="col"><strong>Customer N°</strong></th>
                    <th scope="col"><strong>Incorporation Date</strong></th>
                    <th scope="col"><strong>Name</strong></th>
                    <th scope="col"><strong>State ID</strong></th>
                    <th scope="col"><strong>Address</strong></th>
                    <th scope="col"><strong>City</strong></th>
                    <th scope="col"><strong>Federal ID Code</strong></th>
                    <th scope="col"><strong>Postal Code</strong></th>
                    <th scope="col"><strong>State</strong></th>
                    <th><strong>Actions</strong></th>
                </tr>
            </thead>
            <tbody>
            @foreach($businesses as $business)
                <tr>
                    <td>{{ $business->cust_id }}</td>
                    <td>{{ $business->incorp_date }}</td>
                    <td>{{ $business->name }}</td>
                    <td>{{ $business->state_id }}</td>
                    <td>{{ $business->customer->address }}</td>
                    <td>{{ $business->customer->city }}</td>
                    <td>{{ $business->customer->fed_id }}</td>
                    <td>{{ $business->customer->postal_code }}</td>
                    <td>{{ $business->customer->state }}</td>

                    <td>
                        <form action="{{ route('business.destroy', $business) }}" method="POST" class="no-mrg">
                            <div class="action-grid">
                                <div style="padding-right: 5px;">
                                    <a type="button" title="Show" href="{{ route('business.show', $business) }}" class="fa-solid fa-eye fa-2xl"></a>
                                </div>

                                @if(Auth::user()->role === 'admin')
                                    <div>
                                        <a title="Edit" href="{{ route('business.edit', $business) }}" class="fa-solid fa-pen-to-square fa-2xl"></a>
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

    {{ $businesses->links() }}

    <div style="text-align: center">
        <a href="#" class="fa-solid fa-circle-arrow-up fa-2xl" title="Go top page"></a>
    </div>
@endsection
