@extends('layouts.app-master')

@section('title', "Create a new transaction")
@section('title_small', "Créez une nouvelle transaction bancaire.")

@section('content')
    @include('layouts.partials.errors')

    <div class="grid">

        <form method="POST" action="{{ route('acc-transaction.store') }}"  role="form" enctype="multipart/form-data">
            @csrf
            @include('crud.acc-transaction.form')
        </form>
        <div></div>
    </div>
@endsection
