<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('product_cd') }}
            {{ Form::text('product_cd', $product->product_cd, ['class' => 'form-control' . ($errors->has('product_cd') ? ' is-invalid' : ''), 'placeholder' => 'Product Cd']) }}
            {!! $errors->first('product_cd', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('date_offered') }}
            {{ Form::text('date_offered', $product->date_offered, ['class' => 'form-control' . ($errors->has('date_offered') ? ' is-invalid' : ''), 'placeholder' => 'Date Offered']) }}
            {!! $errors->first('date_offered', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('date_retired') }}
            {{ Form::text('date_retired', $product->date_retired, ['class' => 'form-control' . ($errors->has('date_retired') ? ' is-invalid' : ''), 'placeholder' => 'Date Retired']) }}
            {!! $errors->first('date_retired', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('name') }}
            {{ Form::text('name', $product->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('product_type_cd') }}
            {{ Form::text('product_type_cd', $product->product_type_cd, ['class' => 'form-control' . ($errors->has('product_type_cd') ? ' is-invalid' : ''), 'placeholder' => 'Product Type Cd']) }}
            {!! $errors->first('product_type_cd', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>