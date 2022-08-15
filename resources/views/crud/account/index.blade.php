@extends('layouts.app-master')

@section('title', "Account")
@section('title_small', "Voici le contenu de la table.")

@section('content')

    @if ($message = Session::get('error'))
        <div><p style="color: red">{{ $message }}</p></div>
    @endif

    @if ($message = Session::get('success'))
        <div><p style="color: green">{{ $message }}</p></div>
    @endif
    @if (Auth::user()->role === 'admin')
        <a title="Create new one" role="button" href="{{ route('account.create') }}">CREATE</a>
    @endif
    <figure>
        <table>
            <thead>
            @include('layouts.partials.columns-name')

            </thead>
            <tbody>
            @foreach($accounts as $account)
                <tr>
                    <td>{{ $account->account_id }}</td>
                    <td>{{ $account->avail_balance }}</td>
                    <td>{{ $account->close_date }}</td>
                    <td>{{ $account->last_activity_date }}</td>
                    <td>{{ $account->open_date }}</td>
                    <td>{{ $account->pending_balance }}</td>
                    <td>{{ $account->status }}</td>
                    <td>{{ $account->cust_id }}</td>
                    <td>{{ $account->open_branch_id }}</td>
                    <td>{{ $account->open_emp_id }}</td>
                    <td>{{ $account->product_cd }}</td>

                    <td>
                        <form action="{{ route('account.destroy', $account) }}" method="POST" id="del">
                                <a type="button" title="Show" href="{{ route('account.show', $account) }}" class="fa-solid fa-eye fa-2xl"></a>

                            @if(Auth::user()->role === 'admin')
                                <a title="Edit" href="{{ route('account.edit', $account) }}" class="fa-solid fa-pen-to-square fa-2xl"></a>
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
