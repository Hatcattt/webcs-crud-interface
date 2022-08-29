@extends('layouts.app-master')

@section('title', "Business Show")
@section('title_small', "Voici l'aperçu du client de type Business.")

@section('content')
<div class="btn-back">
    <a title="Get back" role="button" href="{{ url()->previous() }}"> BACK</a>
</div>
    <div>
        <strong>Customer N°:</strong>
        {{ $business->cust_id }}
    </div>
    <div>
        <strong>Incorporated Date:</strong>
        {{ $business->incorp_date }}
    </div>
    <div>
        <strong>Name:</strong>
        {{ $business->name }}
    </div>
    <div>
        <strong>State Id:</strong>
        {{ $business->state_id }}
    </div>
    <div>
        <strong>Address:</strong>
        {{ $business->customer->address }}
    </div>
    <div>
        <strong>City:</strong>
        {{ $business->customer->city }}
    </div>
    <div>
        <strong>Federal ID Code:</strong>
        {{ $business->customer->fed_id }}
    </div>
    <div>
        <strong>Postal Code:</strong>
        {{ $business->customer->postal_code }}
    </div>
    <div>
        <strong>State:</strong>
        {{ $business->customer->state }}
    </div>
@endsection
