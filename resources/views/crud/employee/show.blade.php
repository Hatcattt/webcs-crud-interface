@extends('layouts.app-master')

@section('title', "Show employee")
@section('title_small', "Voici les informations de l'employee.")

@section('content')
<div class="btn-back">
    <a title="Get back" role="button" href="{{ url()->previous() }}"> BACK</a>
</div>

    <div>
        <strong>Empployee N°:</strong>
        {{ $employee->emp_id }}
    </div>
    <div>
        <strong>End Date:</strong>
        {{ $employee->end_date }}
    </div>
    <div>
        <strong>First Name:</strong>
        {{ $employee->first_name }}
    </div>
    <div>
        <strong>Last Name:</strong>
        {{ $employee->last_name }}
    </div>
    <div>
        <strong>Start Date:</strong>
        {{ $employee->start_date }}
    </div>
    <div>
        <strong>Title:</strong>
        {{ $employee->title }}
    </div>
    <div>
        <strong>Assigned Branch:</strong>
        {{ $employee->branch->name }}
    </div>
    <div>
        <strong>Deptatement:</strong>
        {{ $employee->department->name }}
    </div>
    <div>
        <strong>Superior Empployee:</strong>
        @if($employee->superior_emp_id == null || $employee->superior_emp_id == $employee->emp_id)
            None
        @else
            {{ $employee->employee->full_name }}
        @endif
    </div>
@endsection
