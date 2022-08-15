@extends('layouts.app-master')

@section('title', "Show")
@section('title_small', "Voici l'aperçu de votre record.")

@section('content')
    <a title="Get back" role="button" href="{{ route('individual.index') }}"> BACK</a>

    <div class="form-group">
        <strong>Birth Date:</strong>
        {{ $individual->birth_date }}
    </div>
    <div class="form-group">
        <strong>First Name:</strong>
        {{ $individual->first_name }}
    </div>
    <div class="form-group">
        <strong>Last Name:</strong>
        {{ $individual->last_name }}
    </div>
    <div class="form-group">
        <strong>Cust Id:</strong>
        {{ $individual->cust_id }}
    </div>
@endsection
