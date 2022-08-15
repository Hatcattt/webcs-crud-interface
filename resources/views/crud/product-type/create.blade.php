@extends('layouts.app-master')

@section('title', "Create")
@section('title_small', "Créez un record.")

@section('content')
    @include('layouts.partials.errors')

    <div>
        <form method="POST" action="{{ route('product-type.store') }}"  role="form" enctype="multipart/form-data">
            @csrf
            @include('crud.product-type.form')
        </form>
    </div>
@endsection
