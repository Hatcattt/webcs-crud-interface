@extends('layouts.app-master')

@section('title', "Customers")
@section('title_small', "Les clients enregistrés dans votre organisation.")

@section('content')

    @if ($message = Session::get('error'))
        <div><p style="color: red">{{ $message }}</p></div>
    @endif

    @if ($message = Session::get('success'))
        <div><p style="color: green">{{ $message }}</p></div>
    @endif
    @if (Auth::user()->role === 'admin')
        <a title="Create new one" role="button" href="{{ route('customer.create') }}">CREATE</a>
    @endif
    <figure>
        <table>
            <thead>
                <tr>
                    <th scope="col"><strong>N°</strong></th>
                    <th scope="col"><strong>Address</strong></th>
                    <th scope="col"><strong>City</strong></th>
                    <th scope="col"><strong>Type</strong></th>
                    <th scope="col"><strong>Federal ID Code</strong></th>
                    <th scope="col"><strong>Postal Code</strong></th>
                    <th scope="col"><strong>State</strong></th>
                    <th><strong>Actions</strong></th>
                </tr>
            </thead>
            <tbody>
            @foreach($customers as $customer)
                <tr>
                    <td>{{ $customer->cust_id }}</td>
                    <td>{{ $customer->address }}</td>
                    <td>{{ $customer->city }}</td>
                    <td>
                        @switch($customer->cust_type_cd)
                            @case('i')
                                Individual : {{ $customer->individual != null ? $customer->individual->full_name : "" }}
                                @break
                            @case('b')
                                Business : {{ $customer->business != null ? $customer->business->name : "" }}
                                @break
                            @default 'None'
                        @endswitch
                    </td>
                    <td>{{ $customer->fed_id }}</td>
                    <td>{{ $customer->postal_code }}</td>
                    <td>{{ $customer->state }}</td>
                    <td>
                        <form action="{{ route('customer.destroy', $customer) }}" method="POST" class="no-mrg" style="margin: auto">
                            <div class="action-grid">
                                <div style="padding-right: 5px;">
                                    <a type="button" title="Show" href="{{ route('customer.show', $customer) }}" class="fa-solid fa-eye fa-2xl"></a>
                                </div>

                                @if(Auth::user()->role === 'admin')
                                    <div>
                                        <a type="button" title="Edit" href="{{ route('customer.edit', $customer) }}" class="fa-solid fa-pen-to-square fa-2xl"></a>
                                    </div>
                                    @csrf
                                    @method('DELETE')

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

    {{ $customers->links() }}

    <div style="text-align: center">
        <a href="#" class="fa-solid fa-circle-arrow-up fa-2xl" title="Go top page"></a>
    </div>

@endsection
