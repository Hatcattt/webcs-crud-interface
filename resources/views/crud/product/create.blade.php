@extends('layouts.app-master')

@section('title', "Create a product")
@section('title_small', "Créez un 'produit' dans votre organisation.")

@section('content')
    @include('layouts.partials.errors')

    <div>
        <form method="POST" action="{{ route('product.store') }}"  role="form" enctype="multipart/form-data">
            @csrf
            @include('crud.product.form')
        </form>
    </div>
@endsection
