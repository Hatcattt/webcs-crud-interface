<div style="padding-bottom: 20px;">
    <span class="required">*</span> <small class="input-required">Inputs required</small>
</div>
<div class="form-group">
    {{ Form::label('product_type_cd', 'Type') }}
    {{ Form::text('product_type_cd', $product_type->product_type_cd, ['class' => 'form-control' . ($errors->has('product_type_cd') ? ' is-invalid' : ''), 'placeholder' => 'ex : credits']) }}
</div>
<div class="form-group">
    {{ Form::label('name', 'Name') }}
    {{ Form::text('name', $product_type->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'ex : customers credits']) }}
</div>

<div class="box-footer mt20">
    <button type="submit" class="btn btn-primary">Submit</button>
</div>
<div class="btn-back">
    <a title="Stop and return" role="button" href={{ route('product-type.index') }}> Cancel</a>
</div>
