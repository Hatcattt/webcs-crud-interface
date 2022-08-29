@extends('layouts.app-master')

@section('title')
    @if(Auth::user()->role === 'admin')
        Manage your organisation here
    @else
        Take a look inside your organisation here
    @endif
@endsection
@section('title_small')
    @if(Auth::user()->role === 'admin')
        <h2>Organisez vos différentes branches.</h2>
    @else
        <h2>Visionnez les différentes branches présentent dans l'organisation.</h2>
    @endif
@endsection

@section('content')
    @include('layouts.partials.table-list')
@endsection
