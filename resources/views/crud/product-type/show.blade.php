@extends('layouts.app-master')

@section('title',' Show Product Type')
@section('title_small')
    Voici l'aperçu du produit : <strong>{{$product_type->name }}</strong>
@endsection

@section('content')
<div class="btn-back">
    <a title="Get back" role="button" href="{{ url()->previous() }}"> BACK</a>
</div>

    <div class="form-group">
        <strong>Short name:</strong>
        {{ $product_type->product_type_cd }}
    </div>
    <div class="form-group">
        <strong>Name:</strong>
        {{ $product_type->name }}
    </div>
@endsection
