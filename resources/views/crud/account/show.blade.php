@extends('layouts.app-master')

@section('title')
Account N° : {{ $account->account_id }}
@endsection
@section('title_small')
Voici le compte de 
    @switch($account->customer->cust_type_cd)
        @case("i")
            <strong>{{ $account->customer->individual->first_name . ' ' . $account->customer->individual->last_name }}</strong>
            @break
        @case("b")
            <strong>{{ $account->customer->business->name }}</strong> : type Business
            @break
        @default "None"
    @endswitch
@endsection

@section('content')
    <div class="btn-back">
        <a title="Get back" role="button" href="{{ url()->previous() }}"> BACK</a>
    </div>

    <div>
        <strong>N°:</strong>
        {{ $account->account_id }}
    </div>
    <div>
        <strong>Availiable Balance:</strong>
        {{ $account->avail_balance }}
    </div>
    <div>
        <strong>Close Date:</strong>
        {{ $account->close_date }}
    </div>
    <div>
        <strong>Last Activity Date:</strong>
        {{ $account->last_activity_date }}
    </div>
    <div>
        <strong>Open Date:</strong>
        {{ $account->open_date }}
    </div>
    <div>
        <strong>Pending Balance:</strong>
        {{ $account->pending_balance }}
    </div>
    <div>
        <strong>Status:</strong>
        {{ $account->status }}
    </div>
    <div>
        <strong>Customer:</strong>
        @switch($account->customer->cust_type_cd)
            @case("i")
                {{ $account->customer->individual->first_name . ' ' . $account->customer->individual->last_name }}
                @break
            @case("b")
                {{ $account->customer->business->name }}
                @break
            @default "None"
        @endswitch
    </div>
    <div>
        <strong>Customer Type:</strong>
        @switch($account->customer->cust_type_cd)
            @case("i")
                Individual
                @break
            @case("b")
                Business
                @break
            @default "None"
        @endswitch
    </div>
    <div>
        <strong>Open Branch:</strong>
        {{ $account->branch->name }}
    </div>
    <div>
        <strong>Open Empployee:</strong>
        {{ $account->employee->first_name . ' ' . $account->employee->last_name }}
    </div>
    <div>
        <strong>Product:</strong>
        {{ $account->product->name }}
    </div>
@endsection
