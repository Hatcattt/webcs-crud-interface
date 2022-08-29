@extends('layouts.app-master')

@section('title', "Create a customer type of Individual")
@section('title_small', "Créez un client de type individual.")

@section('content')
    @include('layouts.partials.errors')

    <div>
        <form method="POST" action="{{ route('individual.store') }}"  role="form" enctype="multipart/form-data">
            @csrf
            @include('crud.individual.form')
        </form>
    </div>
@endsection
