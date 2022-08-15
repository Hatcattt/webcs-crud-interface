<a title="Get back" role="button" href="{{ route('branch.index') }}"> BACK</a>

<div class="form-group">
    {{ Form::label('branch_id') }}
    {{ Form::text('branch_id', $branch->branch_id, ['class' => 'form-control' . ($errors->has('branch_id') ? ' is-invalid' : ''), 'placeholder' => 'Branch Id']) }}
</div>
<div class="form-group">
    {{ Form::label('address') }}
    {{ Form::text('address', $branch->address, ['class' => 'form-control' . ($errors->has('address') ? ' is-invalid' : ''), 'placeholder' => 'Address']) }}
</div>
<div class="form-group">
    {{ Form::label('city') }}
    {{ Form::text('city', $branch->city, ['class' => 'form-control' . ($errors->has('city') ? ' is-invalid' : ''), 'placeholder' => 'City']) }}
</div>
<div class="form-group">
    {{ Form::label('name') }}
    {{ Form::text('name', $branch->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
</div>
<div class="form-group">
    {{ Form::label('state') }}
    {{ Form::text('state', $branch->state, ['class' => 'form-control' . ($errors->has('state') ? ' is-invalid' : ''), 'placeholder' => 'State']) }}
</div>
<div class="form-group">
    {{ Form::label('zip_code') }}
    {{ Form::text('zip_code', $branch->zip_code, ['class' => 'form-control' . ($errors->has('zip_code') ? ' is-invalid' : ''), 'placeholder' => 'Zip Code']) }}
</div>
<div>
    <button type="submit" class="secondary">Submit</button>
</div>
