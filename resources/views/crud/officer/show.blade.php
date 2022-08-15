@extends('layouts.app-master')

@section('title', "Show")
@section('title_small', "Voici l'aperçu de votre record.")

@section('content')
    <a title="Get back" role="button" href="{{ route('officer.index') }}"> BACK</a>

    <div class="form-group">
        <strong>Officer Id:</strong>
        {{ $officer->officer_id }}
    </div>
    <div class="form-group">
        <strong>End Date:</strong>
        {{ $officer->end_date }}
    </div>
    <div class="form-group">
        <strong>First Name:</strong>
        {{ $officer->first_name }}
    </div>
    <div class="form-group">
        <strong>Last Name:</strong>
        {{ $officer->last_name }}
    </div>
    <div class="form-group">
        <strong>Start Date:</strong>
        {{ $officer->start_date }}
    </div>
    <div class="form-group">
        <strong>Title:</strong>
        {{ $officer->title }}
    </div>
    <div class="form-group">
        <strong>Cust Id:</strong>
        {{ $officer->cust_id }}
    </div>
@endsection
