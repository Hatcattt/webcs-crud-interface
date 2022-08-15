@extends('layouts.app-master')

@section('title', "Show")
@section('title_small', "Voici l'aperçu de votre record.")

@section('content')
    <a title="Get back" role="button" href="{{ route('department.index') }}"> BACK</a>

    <div class="form-group">
        <strong>Dept Id:</strong>
        {{ $department->dept_id }}
    </div>
    <div class="form-group">
        <strong>Name:</strong>
        {{ $department->name }}
    </div>
@endsection
