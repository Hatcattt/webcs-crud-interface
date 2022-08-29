@extends('layouts.app-master')

@section('title', "Accounts Transactions")
@section('title_small', "Voici toutes les transactions bancaires répertoriées.")

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
                <tr>
                    <th scope="col"><strong>N°</strong></th>
                    <th scope="col"><strong>Amount</strong></th>
                    <th scope="col"><strong>Funds Available Date</strong></th>
                    <th scope="col"><strong>Transaction date</strong></th>
                    <th scope="col"><strong>Transaction Type</strong></th>
                    <th scope="col"><strong>Account</strong></th>
                    <th scope="col"><strong>Customer</strong></th>
                    <th scope="col"><strong>Execution Branch</strong></th>
                    <th scope="col"><strong>Teller Employee</strong></th>
                    <th><strong>Actions</strong></th>
                </tr>
            </thead>
            <tbody>
            @foreach($acc_transactions as $acc_transaction)
                <tr>
                    <td>{{ $acc_transaction->txn_id }}</td>
                    <td>{{ $acc_transaction->amount }}</td>
                    <td>{{ $acc_transaction->funds_avail_date }}</td>
                    <td>{{ $acc_transaction->txn_date }}</td>
                    <td>{{ $acc_transaction->txn_type_cd }}</td>
                    <td>
                        <a href="{{ url('crud/account/' . $acc_transaction->account->account_id) }}" title="Show more">
                            {{ $acc_transaction->account->status }}
                        </a>
                    </td>
                    <td>
                        @switch($acc_transaction->account->customer->cust_type_cd)
                                @case("i")
                                    Individual : {{ $acc_transaction->account->customer->individual->full_name }}
                                    @break
                                @case("b")
                                    Business : {{ $acc_transaction->account->customer->business->name }}
                                @default
                            @endswitch
                    </td>
                    <td>{{ $acc_transaction->execution_branch_id == null ? 'Not defined' : $acc_transaction->branch->name }}</td>
                    <td>{{ $acc_transaction->teller_emp_id == null ? 'Not defined' : $acc_transaction->employee->first_name . ' ' . $acc_transaction->employee->last_name }}</td>
                    <td>
                        <form action="{{ route('acc-transaction.destroy',$acc_transaction) }}" method="POST" class="no-mrg">
                            <div class="action-grid">
                                <div style="padding-right: 5px;">
                                    <a type="button" title="Show" href="{{ route('acc-transaction.show', $acc_transaction) }}" class="fa-solid fa-eye fa-2xl"></a>
                                </div>

                                @if(Auth::user()->role === 'admin')
                                    <div>
                                        <a title="Edit" href="{{ route('acc-transaction.edit', $acc_transaction) }}" class="fa-solid fa-pen-to-square fa-2xl"></a>
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

    {{ $acc_transactions->links() }}
    <div style="text-align: center">
        <a href="#" class="fa-solid fa-circle-arrow-up fa-2xl" title="Go top page"></a>
    </div>
@endsection
