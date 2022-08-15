<a title="Get back" role="button" href="{{ route('product.index') }}"> BACK</a>

<div class="form-group">
    {{ Form::label('product_cd') }}
    {{ Form::text('product_cd', $product->product_cd, ['class' => 'form-control' . ($errors->has('product_cd') ? ' is-invalid' : ''), 'placeholder' => 'Product Cd']) }}
</div>
<div class="form-group">
    {{ Form::label('date_offered') }}
    {{ Form::text('date_offered', $product->date_offered, ['class' => 'form-control' . ($errors->has('date_offered') ? ' is-invalid' : ''), 'placeholder' => 'Date Offered']) }}
</div>
<div class="form-group">
    {{ Form::label('date_retired') }}
    {{ Form::text('date_retired', $product->date_retired, ['class' => 'form-control' . ($errors->has('date_retired') ? ' is-invalid' : ''), 'placeholder' => 'Date Retired']) }}
</div>
<div class="form-group">
    {{ Form::label('name') }}
    {{ Form::text('name', $product->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
</div>
<div class="form-group">
    {{ Form::label('product_type_cd') }}
    {{ Form::select('product_type_cd', $type_cd, $product->product_type_cd, ['class' => 'form-control']) }}
</div>

<div class="box-footer mt20">
    <button type="submit" class="btn btn-primary">Submit</button>
</div>
