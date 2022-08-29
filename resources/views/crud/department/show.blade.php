@extends('layouts.app-master')

@section('title')
Department N° : {{ $department->dept_id }}
@endsection
@section('title_small', "Voici l'aperçu du département.")

@section('content')
    <a title="Get back" role="button" href="{{ route('department.index') }}"> BACK</a>

    <div>
        <strong>Deptartment N°:</strong>
        {{ $department->dept_id }}
    </div>
    <div>
        <strong>Name:</strong>
        {{ $department->name }}
    </div>
@endsection
