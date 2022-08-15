@extends('layouts.app-master')

@section('title', "Create")
@section('title_small', "Créez un record.")

@section('content')
    @include('layouts.partials.errors')

    <div>
        <form method="POST" action="{{ route('acc-transaction.store') }}"  role="form" enctype="multipart/form-data">
            @csrf
            @include('crud.acc-transaction.form')
        </form>
    </div>
@endsection
