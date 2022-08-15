@extends('layouts.app')

@section('template_title')
    {{ $product->name ?? 'Show Product' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Product</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Product Cd:</strong>
                            {{ $product->product_cd }}
                        </div>
                        <div class="form-group">
                            <strong>Date Offered:</strong>
                            {{ $product->date_offered }}
                        </div>
                        <div class="form-group">
                            <strong>Date Retired:</strong>
                            {{ $product->date_retired }}
                        </div>
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $product->name }}
                        </div>
                        <div class="form-group">
                            <strong>Product Type Cd:</strong>
                            {{ $product->product_type_cd }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
