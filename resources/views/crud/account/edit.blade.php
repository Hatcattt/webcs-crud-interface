@extends('layouts.app-master')

@section('title')
    Edit account N° {{ $account->account_id; }}
@endsection
@section('title_small')
    Editez le compte de 
    @switch($account->customer->cust_type_cd)
        @case("i")
            <strong>{{ $account->customer->individual->full_name }}</strong> : Individual
            @break
        @case("b")
            <strong>{{ $account->customer->business->name}}</strong> : Business
            @break
        @default
            
    @endswitch
@endsection

@section('content')
    @include('layouts.partials.errors')

    <div class="grid">
        <form method="POST" action="{{ route('account.update', $account) }}"  role="form" enctype="multipart/form-data">
            {{ method_field('PATCH') }}
            @csrf
            @include('crud.account.form')
        </form>
    </div>
@endsection
