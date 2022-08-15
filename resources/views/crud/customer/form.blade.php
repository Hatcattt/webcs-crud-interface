<a title="Get back" role="button" href="{{ route('customer.index') }}"> BACK</a>

<div class="form-group">
    {{ Form::label('cust_id') }}
    {{ Form::text('cust_id', $customer->cust_id, ['class' => 'form-control' . ($errors->has('cust_id') ? ' is-invalid' : ''), 'placeholder' => 'Cust Id']) }}
</div>
<div class="form-group">
    {{ Form::label('address') }}
    {{ Form::text('address', $customer->address, ['class' => 'form-control' . ($errors->has('address') ? ' is-invalid' : ''), 'placeholder' => 'Address']) }}
</div>
<div class="form-group">
    {{ Form::label('city') }}
    {{ Form::text('city', $customer->city, ['class' => 'form-control' . ($errors->has('city') ? ' is-invalid' : ''), 'placeholder' => 'City']) }}
</div>
<div class="form-group">
    {{ Form::label('cust_type_cd') }}
    {{ Form::text('cust_type_cd', $customer->cust_type_cd, ['class' => 'form-control' . ($errors->has('cust_type_cd') ? ' is-invalid' : ''), 'placeholder' => 'Cust Type Cd']) }}
</div>
<div class="form-group">
    {{ Form::label('fed_id') }}
    {{ Form::text('fed_id', $customer->fed_id, ['class' => 'form-control' . ($errors->has('fed_id') ? ' is-invalid' : ''), 'placeholder' => 'Fed Id']) }}
</div>
<div class="form-group">
    {{ Form::label('postal_code') }}
    {{ Form::text('postal_code', $customer->postal_code, ['class' => 'form-control' . ($errors->has('postal_code') ? ' is-invalid' : ''), 'placeholder' => 'Postal Code']) }}
</div>
<div class="form-group">
    {{ Form::label('state') }}
    {{ Form::text('state', $customer->state, ['class' => 'form-control' . ($errors->has('state') ? ' is-invalid' : ''), 'placeholder' => 'State']) }}
</div>
<div class="box-footer mt20">
    <button type="submit" class="btn btn-primary">Submit</button>
</div>
