@extends('layouts.app-master')

@section('title', "Create a department")
@section('title_small', "Créez un nouveau département dans votre organisation.")

@section('content')
    @include('layouts.partials.errors')

    <div>
        <form method="POST" action="{{ route('department.store') }}"  role="form" enctype="multipart/form-data">
            @csrf
            @include('crud.department.form')
        </form>
    </div>
@endsection
