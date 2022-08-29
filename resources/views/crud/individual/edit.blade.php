@extends('layouts.app-master')

@section('title', "Edit a customer type of Individual")
@section('title_small', "Editez le client de type individual.")

@section('content')
    @include('layouts.partials.errors')

    <div>
        <form method="POST" action="{{ route('individual.update', $individual) }}"  role="form" enctype="multipart/form-data">
            {{ method_field('PATCH') }}
            @csrf
            @include('crud.individual.form')
        </form>
    </div>
@endsection
