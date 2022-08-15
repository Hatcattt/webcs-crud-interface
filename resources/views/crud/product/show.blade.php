@extends('layouts.app-master')

@section('title', "Show")
@section('title_small', "Voici l'aperçu de votre record.")

@section('content')
    <a title="Get back" role="button" href="{{ route('product.index') }}"> BACK</a>

    <div class="form-group">
        <strong>Product Cd:</strong>
        {{ $product->product_cd }}
    </div>
    <div class="form-group">
        <strong>Date Offered:</strong>
        {{ $product->date_offered }}
    </div>
    <div class="form-group">
        <strong>Date Retired:</strong>
        {{ $product->date_retired }}
    </div>
    <div class="form-group">
        <strong>Name:</strong>
        {{ $product->name }}
    </div>
    <div class="form-group">
        <strong>Product Type Cd:</strong>
        {{ $product->product_type_cd }}
    </div>
@endsection
