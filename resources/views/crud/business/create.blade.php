@extends('layouts.app-master')

@section('title', "Add a business partner")
@section('title_small', "Ajoutez un partenaire de type business dans votre organisation.")

@section('content')
    @include('layouts.partials.errors')

    <div>
        <form method="POST" action="{{ route('business.store') }}"  role="form" enctype="multipart/form-data">
            @csrf
            @include('crud.business.form')
        </form>
    </div>
@endsection
