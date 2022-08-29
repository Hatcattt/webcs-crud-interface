<div style="padding-bottom: 20px;">
    <span class="required">*</span> <small class="input-required">Inputs required</small>
</div>

<div class="form-group">
    {{ Form::label('Address') }}
    {{ Form::text('address', $customer->address, ['class' => 'form-control' . ($errors->has('address') ? ' is-invalid' : ''), 'placeholder' => 'ex : 47 mockingbird ln']) }}
</div>
<div class="form-group">
    {{ Form::label('City') }}
    {{ Form::text('city', $customer->city, ['class' => 'form-control' . ($errors->has('city') ? ' is-invalid' : ''), 'placeholder' => 'ex : woburn']) }}
</div>
<div class="form-group">
    <label for="fed_id">Federal ID Code <span title="required" class="required">*</span></label>
    {{ Form::text('fed_id', $customer->fed_id, ['class' => 'form-control' . ($errors->has('fed_id') ? ' is-invalid' : ''), 'placeholder' => 'ex : 335-12-123']) }}
</div>
<div class="form-group">
    {{ Form::label('Postal Code') }}
    {{ Form::text('postal_code', $customer->postal_code, ['class' => 'form-control' . ($errors->has('postal_code') ? ' is-invalid' : ''), 'placeholder' => 'ex : 05064']) }}
</div>
<div class="form-group">
    {{ Form::label('State') }}
    {{ Form::text('state', $customer->state, ['class' => 'form-control' . ($errors->has('state') ? ' is-invalid' : ''), 'placeholder' => 'ex : ma']) }}
</div>
@if(Route::is('customer.create'))
    <div class="form-group">
        {{ Form::label('cust_type_cd', 'Choose a type') }}
        {{ Form::select('cust_type_cd', $customer->getTypes(), ['class' => 'form-control' . ($errors->has('cust_type_cd') ? ' is-invalid' : ''), 'placeholder' => 'Customer Type']) }}
    </div>
    <div>
        <small>Passez à l'épate suivante pour finaliser la création du client.</small>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Next</button>
    </div>
@else
    <div>
        <p>Editer le client d'avantage ? {{ Form::checkbox('choice', 'yes') }}</p>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
@endif

<div class="btn-back">
    <a title="Stop and return" role="button" href={{ route('customer.index') }}> Cancel</a>
</div>

