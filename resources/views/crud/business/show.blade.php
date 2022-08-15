@extends('layouts.app-master')

@section('title', "Show")
@section('title_small', "Voici l'aperçu de votre record.")

@section('content')
    <a title="Get back" role="button" href="{{ route('business.index') }}"> BACK</a>

    <div class="form-group">
        <strong>Incorp Date:</strong>
        {{ $business->incorp_date }}
    </div>
    <div class="form-group">
        <strong>Name:</strong>
        {{ $business->name }}
    </div>
    <div class="form-group">
        <strong>State Id:</strong>
        {{ $business->state_id }}
    </div>
    <div class="form-group">
        <strong>Cust Id:</strong>
        {{ $business->cust_id }}
    </div>
@endsection
