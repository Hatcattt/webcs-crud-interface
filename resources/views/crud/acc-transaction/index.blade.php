@extends('layouts.app-master')

@section('title', "Acc Transaction")
@section('title_small', "Voici le contenu de la table.")

@section('content')
    @if ($message = Session::get('error'))
        <div><p style="color: red">{{ $message }}</p></div>
    @endif

    @if ($message = Session::get('success'))
        <div><p style="color: green">{{ $message }}</p></div>
    @endif

    @if (Auth::user()->role === 'admin')
        <a title="Create new one" role="button" href="{{ route('acc-transaction.create') }}">CREATE</a>
    @endif
    <figure>
        <table>
            <thead>
            @include('layouts.partials.columns-name')
            </thead>

            <tbody>
            @foreach($acc_transactions as $acc_transaction)
                <tr>
                    <td>{{ $acc_transaction->txn_id }}</td>
                    <td>{{ $acc_transaction->amount }}</td>
                    <td>{{ $acc_transaction->funds_avail_date }}</td>
                    <td>{{ $acc_transaction->txn_date }}</td>
                    <td>{{ $acc_transaction->txn_type_cd }}</td>
                    <td>{{ $acc_transaction->account_id }}</td>
                    <td>{{ $acc_transaction->execution_branch_id }}</td>
                    <td>{{ $acc_transaction->teller_emp_id }}</td>
                    <td>
                        <form action="{{ route('acc-transaction.destroy',$acc_transaction) }}" method="POST" id="del">
                            <a type="button" title="Show" href="{{ route('acc-transaction.show', $acc_transaction) }}" class="fa-solid fa-eye fa-2xl"></a>

                            @if(Auth::user()->role === 'admin')
                                <a title="Edit" href="{{ route('acc-transaction.edit', $acc_transaction) }}" class="fa-solid fa-pen-to-square fa-2xl"></a>
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
