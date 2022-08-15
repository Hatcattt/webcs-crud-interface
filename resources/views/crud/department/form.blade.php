<a title="Get back" role="button" href="{{ route('department.index') }}"> BACK</a>

<div class="form-group">
    {{ Form::label('dept_id') }}
    {{ Form::text('dept_id', $department->dept_id, ['class' => 'form-control' . ($errors->has('dept_id') ? ' is-invalid' : ''), 'placeholder' => 'Dept Id']) }}
</div>
<div class="form-group">
    {{ Form::label('name') }}
    {{ Form::text('name', $department->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
</div>

<div class="box-footer mt20">
    <button type="submit" class="btn btn-primary">Submit</button>
</div>
