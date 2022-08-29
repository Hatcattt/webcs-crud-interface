@extends('layouts.app-master')

@section('title', "Edit a product type")
@section('title_small', "Editez votre produit.")

@section('content')
    @include('layouts.partials.errors')

    <div>
        <form method="POST" action="{{ route('product-type.update', $product_type) }}"  role="form" enctype="multipart/form-data">
            {{ method_field('PATCH') }}
            @csrf
            @include('crud.product-type.form')
        </form>
    </div>
@endsection
