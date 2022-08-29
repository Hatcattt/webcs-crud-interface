@extends('layouts.app-master')

@section('title', "Create a product type")
@section('title_small', "Créez un type de 'produit'.")

@section('content')
    @include('layouts.partials.errors')

    <div>
        <form method="POST" action="{{ route('product-type.store') }}"  role="form" enctype="multipart/form-data">
            @csrf
            @include('crud.product-type.form')
        </form>
    </div>
@endsection
