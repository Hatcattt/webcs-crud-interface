@extends('layouts.app-master')

@section('title', "Show")
@section('title_small', "Voici l'aperçu de votre record.")

@section('content')
    <a title="Get back" role="button" href="{{ route('acc-transaction.index') }}"> BACK</a>

    <div class="form-group">
        <strong>Txn Id:</strong>
        {{ $acc_transaction->txn_id }}
    </div>
    <div class="form-group">
        <strong>Amount:</strong>
        {{ $acc_transaction->amount }}
    </div>
    <div class="form-group">
        <strong>Funds Avail Date:</strong>
        {{ $acc_transaction->funds_avail_date }}
    </div>
    <div class="form-group">
        <strong>Txn Date:</strong>
        {{ $acc_transaction->txn_date }}
    </div>
    <div class="form-group">
        <strong>Txn Type Cd:</strong>
        {{ $acc_transaction->txn_type_cd }}
    </div>
    <div class="form-group">
        <strong>Account Id:</strong>
        {{ $acc_transaction->account_id }}
    </div>
    <div class="form-group">
        <strong>Execution Branch Id:</strong>
        {{ $acc_transaction->execution_branch_id }}
    </div>
    <div class="form-group">
        <strong>Teller Emp Id:</strong>
        {{ $acc_transaction->teller_emp_id }}
    </div>
@endsection
