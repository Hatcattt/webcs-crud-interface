<a title="Get back" role="button" href="{{ route('officer.index') }}"> BACK</a>

<div class="form-group">
    {{ Form::label('officer_id') }}
    {{ Form::text('officer_id', $officer->officer_id, ['class' => 'form-control' . ($errors->has('officer_id') ? ' is-invalid' : ''), 'placeholder' => 'Officer Id']) }}
</div>
<div class="form-group">
    {{ Form::label('end_date') }}
    {{ Form::text('end_date', $officer->end_date, ['class' => 'form-control' . ($errors->has('end_date') ? ' is-invalid' : ''), 'placeholder' => 'End Date']) }}
</div>
<div class="form-group">
    {{ Form::label('first_name') }}
    {{ Form::text('first_name', $officer->first_name, ['class' => 'form-control' . ($errors->has('first_name') ? ' is-invalid' : ''), 'placeholder' => 'First Name']) }}
</div>
<div class="form-group">
    {{ Form::label('last_name') }}
    {{ Form::text('last_name', $officer->last_name, ['class' => 'form-control' . ($errors->has('last_name') ? ' is-invalid' : ''), 'placeholder' => 'Last Name']) }}
</div>
<div class="form-group">
    {{ Form::label('start_date') }}
    {{ Form::text('start_date', $officer->start_date, ['class' => 'form-control' . ($errors->has('start_date') ? ' is-invalid' : ''), 'placeholder' => 'Start Date']) }}
</div>
<div class="form-group">
    {{ Form::label('title') }}
    {{ Form::text('title', $officer->title, ['class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : ''), 'placeholder' => 'Title']) }}
</div>
<div class="form-group">
    {{ Form::label('cust_id') }}
    {{ Form::text('cust_id', $officer->cust_id, ['class' => 'form-control' . ($errors->has('cust_id') ? ' is-invalid' : ''), 'placeholder' => 'Cust Id']) }}
</div>

<div class="box-footer mt20">
    <button type="submit" class="btn btn-primary">Submit</button>
</div>
