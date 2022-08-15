@extends('layouts.app-master')

@section('title', "Show")
@section('title_small', "Voici l'aperçu de votre record.")

@section('content')
    <a title="Get back" role="button" href="{{ route('product-type.index') }}"> BACK</a>

    <div class="form-group">
        <strong>Product Type Cd:</strong>
        {{ $product_type->product_type_cd }}
    </div>
    <div class="form-group">
        <strong>Name:</strong>
        {{ $product_type->name }}
    </div>
@endsection
