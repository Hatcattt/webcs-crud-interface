@extends('layouts.app-master')

@section('title', "Show business client officer")
@section('title_small', "Voici l'aperçu de titre du client de type business.")

@section('content')
<div class="btn-back">
    <a title="Get back" role="button" href="{{ url()->previous() }}"> BACK</a>
</div>

    <div>
        <strong>Officer N°:</strong>
        {{ $officer->officer_id }}
    </div>
    <div>
        <strong>End Date:</strong>
        {{ $officer->end_date }}
    </div>
    <div>
        <strong>First Name:</strong>
        {{ $officer->first_name }}
    </div>
    <div>
        <strong>Last Name:</strong>
        {{ $officer->last_name }}
    </div>
    <div>
        <strong>Start Date:</strong>
        {{ $officer->start_date }}
    </div>
    <div>
        <strong>Title:</strong>
        {{ $officer->title }}
    </div>
    <div>
        <strong>Custemer N°:</strong>
        {{ $officer->cust_id }}
    </div>
@endsection
