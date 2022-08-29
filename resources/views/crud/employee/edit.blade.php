@extends('layouts.app-master')

@section('title', "Edit an employee")
@section('title_small', "Editez un employé qui se trouve dans votre organisation.")

@section('content')
    @include('layouts.partials.errors')

    <div>
        <form method="POST" action="{{ route('employee.update', $employee) }}"  role="form" enctype="multipart/form-data">
            {{ method_field('PATCH') }}
            @csrf
            @include('crud.employee.form')
        </form>
    </div>
@endsection
