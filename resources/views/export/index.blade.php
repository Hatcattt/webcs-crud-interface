@extends('layouts.app-master')

@section('title', "Export to Excel")
@section('title_small', 'Ici, vous pouvez exporter les tables au format xlsx.')

@section('content')
    @include('layouts.partials.table-list-export')
@endsection
