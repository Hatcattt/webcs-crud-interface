@extends('layouts.app-master')

@section('title', "Edit customer")
@section('title_small', "Editez le client.")

@section('content')
    @include('layouts.partials.errors')

    <div class="grid">
        <form method="POST" action="{{ route('customer.update', $customer) }}"  role="form" enctype="multipart/form-data">
            {{ method_field('PATCH') }}
            @csrf
            @include('crud.customer.form')
        </form>
        <div></div>
    </div>
@endsection
