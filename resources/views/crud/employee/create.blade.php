@extends('layouts.app-master')

@section('title', "Add an employee")
@section('title_small', "Ajoutez un employé dans votre organisation.")

@section('content')
    @include('layouts.partials.errors')

    <div>
        <form method="POST" action="{{ route('employee.store') }}"  role="form" enctype="multipart/form-data">
            @csrf
            @include('crud.employee.form')
        </form>
    </div>
@endsection
