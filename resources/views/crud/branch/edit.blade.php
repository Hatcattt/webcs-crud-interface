@extends('layouts.app-master')

@section('title', "Edit the branch")
@section('title_small')
    Éditez la filiale {{ $branch->name }} N° {{ $branch->branch_id }}
@endsection

@section('content')
    @include('layouts.partials.errors')

    <div>
        <form method="POST" action="{{ route('branch.update', $branch) }}"  role="form" enctype="multipart/form-data">
            {{ method_field('PATCH') }}
            @csrf
            @include('crud.branch.form')
        </form>
    </div>
@endsection
