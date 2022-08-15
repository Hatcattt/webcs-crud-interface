@extends('layouts.app-master')

@section('title', "CRUD Interface")
@section('title_small')
    @if(Auth::user()->role === 'admin')
        <h2>Ici, vous pouvez faire un <strong>CRUD</strong> sur la base de données.</h2>
    @else
        <h2>Ici, vous pouvez lire la base de données.</h2>
    @endif
@endsection

@section('content')
    <div class="container-fluid">
        @include('layouts.partials.table-list')
    </div>
@endsection
