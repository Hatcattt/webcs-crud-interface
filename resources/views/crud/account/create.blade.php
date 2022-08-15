@extends('layouts.app-master')

@section('title', "Create")
@section('title_small', "Créez un record.")

@section('content')
    @include('layouts.partials.errors')

    <div>
        <form method="POST" action="{{ route('account.store') }}"  role="form" enctype="multipart/form-data">
            @csrf
            @include('crud.account.form')
        </form>
    </div>
@endsection
