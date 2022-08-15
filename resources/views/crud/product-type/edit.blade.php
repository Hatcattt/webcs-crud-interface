@extends('layouts.app-master')

@section('title', "Edit")
@section('title_small', "Editez le record.")

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
