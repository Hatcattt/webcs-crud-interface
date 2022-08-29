@extends('layouts.app-master')

@section('title', "Add a customer")
@section('title_small', "Ajoutez un nouveau client dans votre système.")

@section('content')
    @include('layouts.partials.errors')

    <div class="grid">
        <form method="POST" action="{{ route('customer.store') }}"  role="form" enctype="multipart/form-data">
            @csrf
            @include('crud.customer.form')
        </form>
        <div></div>
    </div>
@endsection
