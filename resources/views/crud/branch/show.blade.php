@extends('layouts.app-master')

@section('title')
Branch N° : {{ $branch->branch_id }}
@endsection
@section('title_small', "Voici plus d'informations sur la branche.")

@section('content')
<div class="btn-back">
    <a title="Get back" role="button" href="{{ url()->previous() }}"> BACK</a>
</div>

    <div>
        <strong>Branch N°:</strong>
        {{ $branch->branch_id }}
    </div>
    <div>
        <strong>Address:</strong>
        {{ $branch->address }}
    </div>
    <div>
        <strong>City:</strong>
        {{ $branch->city }}
    </div>
    <div>
        <strong>Name:</strong>
        {{ $branch->name }}
    </div>
    <div>
        <strong>State:</strong>
        {{ $branch->state }}
    </div>
    <div>
        <strong>Zip Code:</strong>
        {{ $branch->zip_code }}
    </div>
@endsection
