<a title="Get back" role="button" href="{{ route('employee.index') }}"> BACK</a>

<div class="form-group">
    {{ Form::label('emp_id') }}
    {{ Form::text('emp_id', $employee->emp_id, ['class' => 'form-control' . ($errors->has('emp_id') ? ' is-invalid' : ''), 'placeholder' => 'Emp Id']) }}
</div>
<div class="form-group">
    {{ Form::label('end_date') }}
    {{ Form::text('end_date', $employee->end_date, ['class' => 'form-control' . ($errors->has('end_date') ? ' is-invalid' : ''), 'placeholder' => 'End Date']) }}
</div>
<div class="form-group">
    {{ Form::label('first_name') }}
    {{ Form::text('first_name', $employee->first_name, ['class' => 'form-control' . ($errors->has('first_name') ? ' is-invalid' : ''), 'placeholder' => 'First Name']) }}
</div>
<div class="form-group">
    {{ Form::label('last_name') }}
    {{ Form::text('last_name', $employee->last_name, ['class' => 'form-control' . ($errors->has('last_name') ? ' is-invalid' : ''), 'placeholder' => 'Last Name']) }}
</div>
<div class="form-group">
    {{ Form::label('start_date') }}
    {{ Form::text('start_date', $employee->start_date, ['class' => 'form-control' . ($errors->has('start_date') ? ' is-invalid' : ''), 'placeholder' => 'Start Date']) }}
</div>
<div class="form-group">
    {{ Form::label('title') }}
    {{ Form::text('title', $employee->title, ['class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : ''), 'placeholder' => 'Title']) }}
</div>
<div class="form-group">
    {{ Form::label('assigned_branch_id') }}
    {{ Form::text('assigned_branch_id', $employee->assigned_branch_id, ['class' => 'form-control' . ($errors->has('assigned_branch_id') ? ' is-invalid' : ''), 'placeholder' => 'Assigned Branch Id']) }}
</div>
<div class="form-group">
    {{ Form::label('dept_id') }}
    {{ Form::text('dept_id', $employee->dept_id, ['class' => 'form-control' . ($errors->has('dept_id') ? ' is-invalid' : ''), 'placeholder' => 'Dept Id']) }}
</div>
<div class="form-group">
    {{ Form::label('superior_emp_id') }}
    {{ Form::text('superior_emp_id', $employee->superior_emp_id, ['class' => 'form-control' . ($errors->has('superior_emp_id') ? ' is-invalid' : ''), 'placeholder' => 'Superior Emp Id']) }}
</div>

<div class="box-footer mt20">
    <button type="submit" class="btn btn-primary">Submit</button>
</div>
