@extends('layouts.app-master')

@section('title', "Show")
@section('title_small', "Voici l'aperçu de votre record.")

@section('content')
    <a title="Get back" role="button" href="{{ route('employee.index') }}"> BACK</a>

    <div class="form-group">
        <strong>Emp Id:</strong>
        {{ $employee->emp_id }}
    </div>
    <div class="form-group">
        <strong>End Date:</strong>
        {{ $employee->end_date }}
    </div>
    <div class="form-group">
        <strong>First Name:</strong>
        {{ $employee->first_name }}
    </div>
    <div class="form-group">
        <strong>Last Name:</strong>
        {{ $employee->last_name }}
    </div>
    <div class="form-group">
        <strong>Start Date:</strong>
        {{ $employee->start_date }}
    </div>
    <div class="form-group">
        <strong>Title:</strong>
        {{ $employee->title }}
    </div>
    <div class="form-group">
        <strong>Assigned Branch Id:</strong>
        {{ $employee->assigned_branch_id }}
    </div>
    <div class="form-group">
        <strong>Dept Id:</strong>
        {{ $employee->dept_id }}
    </div>
    <div class="form-group">
        <strong>Superior Emp Id:</strong>
        {{ $employee->superior_emp_id }}
    </div>
@endsection
