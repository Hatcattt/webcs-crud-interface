@extends('layouts.app-master')

@section('title', "Edit the officer")
@section('title_small', "Editez titre d'un client de type business.")

@section('content')
    @include('layouts.partials.errors')

    <div>
        <form method="POST" action="{{ route('officer.update', $officer) }}"  role="form" enctype="multipart/form-data">
            {{ method_field('PATCH') }}
            @csrf
            @include('crud.officer.form')
        </form>
    </div>
@endsection
