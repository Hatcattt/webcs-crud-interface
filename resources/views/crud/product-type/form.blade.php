<a title="Get back" role="button" href="{{ route('product-type.index') }}"> BACK</a>

<div class="form-group">
    {{ Form::label('product_type_cd') }}
    {{ Form::text('product_type_cd', $product_type->product_type_cd, ['class' => 'form-control' . ($errors->has('product_type_cd') ? ' is-invalid' : ''), 'placeholder' => 'Product Type Cd']) }}
</div>
<div class="form-group">
    {{ Form::label('name') }}
    {{ Form::text('name', $product_type->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
</div>

<div class="box-footer mt20">
    <button type="submit" class="btn btn-primary">Submit</button>
</div>
