<div style="padding-bottom: 20px;">
    <span class="required">*</span> <small class="input-required">Inputs required</small>
</div>

<div class="form-group">

    <label for="end_date">End Date
        <span style="padding-left: 20px;">
            <a href="#/" title="Current Date" class="fa-solid fa-clock" type="button" onclick="setCurrentDate('endDate')"></a>
        </span>
        <small>Now</small>
    </label>
    {{ Form::date('end_date', $employee->end_date, ['class' => 'form-control', 'id' => 'endDate', 'placeholder' => 'End Date']) }}
</div>
<div class="form-group">
    <label for="first_name">First Name <span title="required" class="required">*</span></label>
    {{ Form::text('first_name', $employee->first_name, ['class' => 'form-control' . ($errors->has('first_name') ? ' is-invalid' : ''), 'placeholder' => 'ex : Jackie']) }}
</div>
<div class="form-group">
    <label for="last_name">Last Name <span title="required" class="required">*</span></label>
    {{ Form::text('last_name', $employee->last_name, ['class' => 'form-control' . ($errors->has('last_name') ? ' is-invalid' : ''), 'placeholder' => 'ex : Chan']) }}
</div>
<div class="form-group">

    <label for="start_date">Start Date <span title="required" class="required">*</span>
        <span style="padding-left: 20px;">
            <a href="#/" title="Current Date" class="fa-solid fa-clock" type="button" onclick="setCurrentDate('startDate')"></a>
        </span>
        <small>Now</small>
    </label>
    {{ Form::date('start_date', $employee->start_date, ['class' => 'form-control', 'id' => 'startDate', 'placeholder' => 'Start Date']) }}
</div>
<div class="form-group">
    {{ Form::label('title') }}
    {{ Form::text('title', $employee->title, ['class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : ''), 'placeholder' => 'ex : operation manager']) }}
</div>
<div class="form-group">
    {{ Form::label('assigned_branch') }}
    {{ Form::select('assigned_branch_id', $branchs, $employee->assigned_branch_id, ['class' => 'form-control' . ($errors->has('assigned_branch_id') ? ' is-invalid' : '')]) }}
</div>
<div class="form-group">
    {{ Form::label('department') }}
    {{ Form::select('dept_id', $departments, $employee->dept_id, ['class' => 'form-control' . ($errors->has('dept_id') ? ' is-invalid' : '')]) }}
</div>
<div class="form-group">
    {{ Form::label('superior_employee') }}
    {{ Form::select('superior_emp_id', $superiors, $employee->superior_emp_id, ['class' => 'form-control']) }}
</div>

<div class="box-footer mt20">
    <button type="submit" class="btn btn-primary">Submit</button>
</div>
<div class="btn-back">
    <a title="Stop and return" role="button" href={{ route('employee.index') }}> Cancel</a>
</div>

<script>
    let dateNow = "{{ date('Y-m-d'); }}"

    function setCurrentDate(idDate) {
        document.getElementById(idDate).value = dateNow;
    }
</script>