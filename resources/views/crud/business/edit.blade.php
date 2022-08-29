@extends('layouts.app-master')

@section('title')
    Edit Business : {{ $business->name; }}
@endsection
@section('title_small', "Editez le partenaire de type business.")

@section('content')
    @include('layouts.partials.errors')

    <div>
        <form method="POST" action="{{ route('business.update', $business) }}"  role="form" enctype="multipart/form-data">
            {{ method_field('PATCH') }}
            @csrf
            @include('crud.business.form')
        </form>
    </div>
@endsection
