@extends('layouts.app-master')

@section('title', "Show")
@section('title_small', "Voici l'aperçu de votre record.")

@section('content')
    <a title="Get back" role="button" href="{{ route('customer.index') }}"> BACK</a>

    <div class="form-group">
        <strong>Cust Id:</strong>
        {{ $customer->cust_id }}
    </div>
    <div class="form-group">
        <strong>Address:</strong>
        {{ $customer->address }}
    </div>
    <div class="form-group">
        <strong>City:</strong>
        {{ $customer->city }}
    </div>
    <div class="form-group">
        <strong>Cust Type Cd:</strong>
        {{ $customer->cust_type_cd }}
    </div>
    <div class="form-group">
        <strong>Fed Id:</strong>
        {{ $customer->fed_id }}
    </div>
    <div class="form-group">
        <strong>Postal Code:</strong>
        {{ $customer->postal_code }}
    </div>
    <div class="form-group">
        <strong>State:</strong>
        {{ $customer->state }}
    </div>
@endsection
