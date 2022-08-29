@extends('layouts.app-master')

@section('title', "Show individual customer type")
@section('title_small', "Voici les informations du client de type individuel.")

@section('content')
<div class="btn-back">
    <a title="Get back" role="button" href="{{ url()->previous() }}"> BACK</a>
</div>

    <div>
        <strong>Customer N°:</strong>
        {{ $individual->cust_id }}
    </div>
    <div>
        <strong>Birth Date:</strong>
        {{ $individual->birth_date }}
    </div>
    <div>
        <strong>First Name:</strong>
        {{ $individual->first_name }}
    </div>
    <div>
        <strong>Last Name:</strong>
        {{ $individual->last_name }}
    </div>
    <div>
        <strong>Address:</strong>
        {{ $individual->customer->address }}
    </div>
    <div>
        <strong>City:</strong>
        {{ $individual->customer->city }}
    </div>
    <div>
        <strong>Federal ID Code:</strong>
        {{ $individual->customer->fed_id }}
    </div>
    <div>
        <strong>Postal Code:</strong>
        {{ $individual->customer->postal_code }}
    </div>
    <div>
        <strong>State:</strong>
        {{ $individual->customer->state }}
    </div>
@endsection
