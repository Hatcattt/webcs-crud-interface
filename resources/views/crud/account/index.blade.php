@extends('layouts.app-master')

@section('title', "Accounts")
@section('title_small', "Voici la liste de tous les comptes.")

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
                <tr>
                    <th scope="col"><strong>N°</strong></th>
                    <th scope="col"><strong>Available Balance</strong></th>
                    <th scope="col"><strong>Close Date</strong></th>
                    <th scope="col"><strong>Last Activity Date</strong></th>
                    <th scope="col"><strong>Open Date</strong></th>
                    <th scope="col"><strong>Pending Balance</strong></th>
                    <th scope="col"><strong>Status</strong></th>
                    <th scope="col"><strong>Customer</strong></th>
                    <th scope="col"><strong>Customer Type</strong></th>
                    <th scope="col"><strong>Open Branch</strong></th>
                    <th scope="col"><strong>Open Employee</strong></th>
                    <th scope="col"><strong>Product</strong></th>
                    <th><strong>Actions</strong></th>
                </tr>
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
                    @switch($account->customer->cust_type_cd)
                        @case("i")
                            <td>{{ $account->customer->individual->first_name . ' ' . $account->customer->individual->last_name }}</td>
                            <td>individual</td>
                            @break
                        @case("b")
                            <td>{{ $account->customer->business->name }}</td>
                            <td>business</td>
                            @break
                        @default <td>"None"</td>
                    @endswitch
                    <td>{{ $account->branch->name }}</td>
                    <td>{{ $account->employee->first_name . ' ' . $account->employee->last_name }}</td>
                    <td>{{ $account->product->name }}</td>
                    <td>
                        <form action="{{ route('account.destroy', $account) }}" method="POST" class="no-mrg">
                            <div class="action-grid">
                                <div style="padding-right: 5px;">
                                    <a type="button" title="Show" href="{{  route('account.show', $account) }}" class="fa-solid fa-eye fa-2xl"></a>
                                </div>

                                @if(Auth::user()->role === 'admin')
                                    <div>
                                        <a type="button" title="Edit" href="{{ route('account.edit', $account) }}" class="fa-solid fa-pen-to-square fa-2xl"></a>
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

    {{ $accounts->links() }}

    <div style="text-align: center">
        <a href="#" class="fa-solid fa-circle-arrow-up fa-2xl" title="Go top page"></a>
    </div>
@endsection
