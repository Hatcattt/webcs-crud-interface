@extends('layouts.app-master')

@section('title', "Edit")
@section('title_small', "Editez le record.")

@section('content')
    @include('layouts.partials.errors')

    <div>
        <form method="POST" action="{{ route('acc-transaction.update', $acc_transaction) }}"  role="form" enctype="multipart/form-data">
            {{ method_field('PATCH') }}
            @csrf
            @include('crud.acc-transaction.form')
        </form>
    </div>
@endsection
