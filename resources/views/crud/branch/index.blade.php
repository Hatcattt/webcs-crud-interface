@extends('layouts.app-master')

@section('title', "Branches")
@section('title_small', "Les différentes filiales de votre organisation.")

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
                <tr>
                    <th scope="col"><strong>N°</strong></th>
                    <th scope="col"><strong>Address</strong></th>
                    <th scope="col"><strong>City</strong></th>
                    <th scope="col"><strong>Name</strong></th>
                    <th scope="col"><strong>State</strong></th>
                    <th scope="col"><strong>Zip Code</strong></th>
                    <th><strong>Actions</strong></th>
                </tr>
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
                        <form action="{{ route('branch.destroy', $branch) }}" method="POST" class="no-mrg">
                            <div class="action-grid">
                                <div style="padding-right: 5px;"><a type="button" title="Show" href="{{ route('branch.show', $branch) }}" class="fa-solid fa-eye fa-2xl"></a></div>

                                @if(Auth::user()->role === 'admin')
                                    <div><a title="Edit" href="{{ route('branch.edit', $branch) }}" class="fa-solid fa-pen-to-square fa-2xl"></a></div>
                                    @csrf
                                    @method('DELETE')

                                    <div><button style="padding: 0;" title="Delete" type="submit" class="fa fa-fw fa-trash fa-2xl outline"></button></div>
                                @endif
                            </div>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </figure>

    {{ $branches->links() }}

    <div style="text-align: center">
        <a href="#" class="fa-solid fa-circle-arrow-up fa-2xl" title="Go top page"></a>
    </div>
@endsection
