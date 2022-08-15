@extends('layouts.app-master')

@section('title', "Show")
@section('title_small', "Voici l'aperçu de votre record.")

@section('content')
    <a title="Get back" role="button" href="{{ route('account.index') }}"> BACK</a>

    <div class="form-group">
        <strong>Account Id:</strong>
        {{ $account->account_id }}
    </div>
    <div class="form-group">
        <strong>Avail Balance:</strong>
        {{ $account->avail_balance }}
    </div>
    <div class="form-group">
        <strong>Close Date:</strong>
        {{ $account->close_date }}
    </div>
    <div class="form-group">
        <strong>Last Activity Date:</strong>
        {{ $account->last_activity_date }}
    </div>
    <div class="form-group">
        <strong>Open Date:</strong>
        {{ $account->open_date }}
    </div>
    <div class="form-group">
        <strong>Pending Balance:</strong>
        {{ $account->pending_balance }}
    </div>
    <div class="form-group">
        <strong>Status:</strong>
        {{ $account->status }}
    </div>
    <div class="form-group">
        <strong>Cust Id:</strong>
        {{ $account->cust_id }}
    </div>
    <div class="form-group">
        <strong>Open Branch Id:</strong>
        {{ $account->open_branch_id }}
    </div>
    <div class="form-group">
        <strong>Open Emp Id:</strong>
        {{ $account->open_emp_id }}
    </div>
    <div class="form-group">
        <strong>Product Cd:</strong>
        {{ $account->product_cd }}
    </div>
@endsection
