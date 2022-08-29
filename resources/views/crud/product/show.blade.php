@extends('layouts.app-master')

@section('title', "Show product")
@section('title_small', "Voici les informations du produit.")

@section('content')
<div class="btn-back">
    <a title="Get back" role="button" href="{{ url()->previous() }}"> BACK</a>
</div>

    <div>
        <strong>Short Name:</strong>
        {{ $product->product_cd }}
    </div>
    <div>
        <strong>Date Offered:</strong>
        {{ $product->date_offered }}
    </div>
    <div>
        <strong>Date Retired:</strong>
        {{ $product->date_retired }}
    </div>
    <div>
        <strong>Name:</strong>
        {{ $product->name }}
    </div>
    <div>
        <strong>Product Type:</strong>
        {{ $product->productType->name }}
    </div>
@endsection
