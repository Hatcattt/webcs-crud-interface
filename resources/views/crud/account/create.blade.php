@extends('layouts.app-master')

@section('title', "Add a new Account")
@section('title_small', "Ajoutez un nouveau compte associé à un client.")

@section('content')
    @include('layouts.partials.errors')

    <div class="grid">
        <form method="POST" action="{{ route('account.store') }}"  role="form" enctype="multipart/form-data">
            @csrf
            @include('crud.account.form')
        </form>
        <div></div>
    </div>
@endsection
