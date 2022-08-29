@extends('layouts.app-master')

@section('title', "Create a officer for the business customer")
@section('title_small', "Créez titre pour le client de type business.")

@section('content')
    @include('layouts.partials.errors')

    <div>
        <form method="POST" action="{{ route('officer.store') }}"  role="form" enctype="multipart/form-data">
            @csrf
            @include('crud.officer.form')
        </form>
    </div>
@endsection
