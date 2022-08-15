@extends('layouts.app-master')

@section('title', "Edit")
@section('title_small', "Editez le record.")

@section('content')
    @include('layouts.partials.errors')

    <div>
        <form method="POST" action="{{ route('department.update', $department) }}"  role="form" enctype="multipart/form-data">
            {{ method_field('PATCH') }}
            @csrf
            @include('crud.department.form')
        </form>
    </div>
@endsection
