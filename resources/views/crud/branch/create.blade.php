@extends('layouts.app-master')

@section('title', "Create a branch")
@section('title_small', "Créez une nouvelle filiale dans votre organisation.")

@section('content')
    @include('layouts.partials.errors')

    <div>
        <form method="POST" action="{{ route('branch.store') }}"  role="form" enctype="multipart/form-data">
            @csrf
            @include('crud.branch.form')
        </form>
    </div>
@endsection
