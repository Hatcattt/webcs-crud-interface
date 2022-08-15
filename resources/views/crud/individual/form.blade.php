<a title="Get back" role="button" href="{{ route('individual.index') }}"> BACK</a>

<div class="form-group">
    {{ Form::label('birth_date') }}
    {{ Form::text('birth_date', $individual->birth_date, ['class' => 'form-control' . ($errors->has('birth_date') ? ' is-invalid' : ''), 'placeholder' => 'Birth Date']) }}
</div>
<div class="form-group">
    {{ Form::label('first_name') }}
    {{ Form::text('first_name', $individual->first_name, ['class' => 'form-control' . ($errors->has('first_name') ? ' is-invalid' : ''), 'placeholder' => 'First Name']) }}
</div>
<div class="form-group">
    {{ Form::label('last_name') }}
    {{ Form::text('last_name', $individual->last_name, ['class' => 'form-control' . ($errors->has('last_name') ? ' is-invalid' : ''), 'placeholder' => 'Last Name']) }}
</div>
<div class="form-group">
    {{ Form::label('cust_id') }}
    {{ Form::text('cust_id', $individual->cust_id, ['class' => 'form-control' . ($errors->has('cust_id') ? ' is-invalid' : ''), 'placeholder' => 'Cust Id']) }}
</div>

<div class="box-footer mt20">
    <button type="submit" class="btn btn-primary">Submit</button>
</div>
