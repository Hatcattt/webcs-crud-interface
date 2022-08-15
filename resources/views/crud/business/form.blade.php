<a title="Get back" role="button" href="{{ route('business.index') }}"> BACK</a>

<div class="form-group">
    {{ Form::label('incorp_date') }}
    {{ Form::text('incorp_date', $business->incorp_date, ['class' => 'form-control' . ($errors->has('incorp_date') ? ' is-invalid' : ''), 'placeholder' => 'Incorp Date']) }}
</div>
<div class="form-group">
    {{ Form::label('name') }}
    {{ Form::text('name', $business->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
</div>
<div class="form-group">
    {{ Form::label('state_id') }}
    {{ Form::text('state_id', $business->state_id, ['class' => 'form-control' . ($errors->has('state_id') ? ' is-invalid' : ''), 'placeholder' => 'State Id']) }}
</div>
<div class="form-group">
    {{ Form::label('cust_id') }}
    {{ Form::text('cust_id', $business->cust_id, ['class' => 'form-control' . ($errors->has('cust_id') ? ' is-invalid' : ''), 'placeholder' => 'Cust Id']) }}
</div>
<div>
    <button type="submit" class="secondary">Submit</button>
</div>
