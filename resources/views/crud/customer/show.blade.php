@extends('layouts.app-master')

@section('title', "Show customer")
@section('title_small', "Voici l'aperçu des informations du client.")

@section('content')
    <a title="Get back" role="button" href={{ route('customer.index') }}> BACK</a>

    <div>
        <strong>Customer N°:</strong>
        {{ $customer->cust_id }}
    </div>
    <div>
        <strong>Address:</strong>
        {{ $customer->address }}
    </div>
    <div>
        <strong>City:</strong>
        {{ $customer->city }}
    </div>
    <div>
        <strong>Customer Type:</strong>
        @switch($customer->cust_type_cd)
            @case('i')
                <a href={{ route('individual.show', $customer->cust_id) }} tirle="Go see">Individual</a>
                @break
            @case('b')
                <a href={{ route('business.show', $customer->cust_id) }} tirle="Go see">Business</a>
                @break
        @endswitch
    </div>
    <div>
        <strong>Federal ID Code:</strong>
        {{ $customer->fed_id }}
    </div>
    <div>
        <strong>Postal Code:</strong>
        {{ $customer->postal_code }}
    </div>
    <div>
        <strong>State:</strong>
        {{ $customer->state }}
    </div>
@endsection
