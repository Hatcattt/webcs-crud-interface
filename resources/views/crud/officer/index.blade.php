@extends('layouts.app-master')

@section('title', "Officers")
@section('title_small', "Les titres des clients de type business.")

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
        <small style="color: grey">Pour associer un titre à un client de type business, vous devez d'abord créer ce client.</small>
    </div>
    @endif
    <figure>
        <table>
            <thead>
                <tr>
                    <th scope="col"><strong>N°</strong></th>
                    <th scope="col"><strong>End Date</strong></th>
                    <th scope="col"><strong>First Name</strong></th>
                    <th scope="col"><strong>Last Name</strong></th>
                    <th scope="col"><strong>Start Date</strong></th>
                    <th scope="col"><strong>Title</strong></th>
                    <th scope="col"><strong>Business Customer</strong></th>
                    <th><strong>Actions</strong></th>
                </tr>
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
                    <td>{{ $officer->customer->business->name }}</td>

                    <td>
                        <form action="{{ route('officer.destroy', $officer) }}" method="POST" class="no-mrg">
                            <div class="action-grid">
                                <div style="padding-right: 5px;">
                                    <a type="button" title="Show" href="{{ route('officer.show', $officer) }}" class="fa-solid fa-eye fa-2xl"></a>
                                </div>

                                @if(Auth::user()->role === 'admin')
                                    <div>
                                        <a title="Edit" href="{{ route('officer.edit', $officer) }}" class="fa-solid fa-pen-to-square fa-2xl"></a>
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

    {{ $officers->links() }}
    <div style="text-align: center">
        <a href="#" class="fa-solid fa-circle-arrow-up fa-2xl" title="Go top page"></a>
    </div>
@endsection
