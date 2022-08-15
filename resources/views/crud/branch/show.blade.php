@extends('layouts.app-master')

@section('title', "Show")
@section('title_small', "Voici l'aperçu de votre record.")

@section('content')
    <a title="Get back" role="button" href="{{ route('branch.index') }}"> BACK</a>

    <div class="form-group">
        <strong>Branch Id:</strong>
        {{ $branch->branch_id }}
    </div>
    <div class="form-group">
        <strong>Address:</strong>
        {{ $branch->address }}
    </div>
    <div class="form-group">
        <strong>City:</strong>
        {{ $branch->city }}
    </div>
    <div class="form-group">
        <strong>Name:</strong>
        {{ $branch->name }}
    </div>
    <div class="form-group">
        <strong>State:</strong>
        {{ $branch->state }}
    </div>
    <div class="form-group">
        <strong>Zip Code:</strong>
        {{ $branch->zip_code }}
    </div>
@endsection
