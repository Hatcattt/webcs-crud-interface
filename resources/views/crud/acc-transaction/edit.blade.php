@extends('layouts.app-master')

@section('title')
    Edit Account Transaction N° {{ $acc_transaction->txn_id }}
@endsection
@section('title_small')
    Editez la transaction du client : 
    @switch($acc_transaction->account->customer->cust_type_cd)
        @case("i")
            <strong>{{ $acc_transaction->account->customer->individual->full_name }}</strong>
            @break
        @case("b")
            <strong>{{ $acc_transaction->account->customer->business->name }}</strong>
            @break
        @default
    @endswitch
@endsection

@section('content')
    @include('layouts.partials.errors')

    <div class="grid">
        <form method="POST" action="{{ route('acc-transaction.update', $acc_transaction) }}"  role="form" enctype="multipart/form-data">
            {{ method_field('PATCH') }}
            @csrf
            @include('crud.acc-transaction.form')
        </form>
        <div></div>
    </div>
@endsection
