@extends('layouts.app-master')

@section('title')
    Account Transaction N° {{ $acc_transaction->txn_id }}
@endsection
@section('title_small', "Voici l'aperçu de la transaction bancaire.")

@section('content')
    <div class="btn-back">
        <a title="Get back" role="button" href="{{ url()->previous() }}"> BACK</a>
    </div>

    <div>
        <strong>Transaction N°:</strong>
        {{ $acc_transaction->txn_id }}
    </div>
    <div>
        <strong>Amount:</strong>
        {{ $acc_transaction->amount }}
    </div>
    <div>
        <strong>Funds Available Date:</strong>
        {{ $acc_transaction->funds_avail_date }}
    </div>
    <div>
        <strong>Transaction Date:</strong>
        {{ $acc_transaction->txn_date }}
    </div>
    <div>
        <strong>Transaction Type:</strong>
        {{ $acc_transaction->txn_type_cd }}
    </div>
    <div>
        <strong>Account:</strong>
        @switch($acc_transaction->account->customer->cust_type_cd)
            @case('i')
                <strong>{{ $acc_transaction->account->customer->individual->full_name }}</strong> : Individual
                @break
            @case('b')
                <strong>{{ $acc_transaction->account->customer->business->name }}</strong> : Business
                @break
        @endswitch
    </div>
    <div>
        <strong>Execution Branch:</strong>
        {{ $acc_transaction->branch == null ? 'Not defined' : $acc_transaction->branch->name }}
    </div>
    <div>
        <strong>Teller Employee:</strong>
        {{ $acc_transaction->employee == null ? 'Not defined' : $acc_transaction->employee->full_name }}
    </div>
@endsection
