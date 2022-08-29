<div style="padding-bottom: 20px;">
    <span class="required">*</span> <small class="input-required">Inputs required</small>
</div>

<div class="form-group">
    <label for="name">Name <span title="required" class="required">*</span></label>
    {{ Form::text('name', $department->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'ex : rh']) }}
</div>

<div class="box-footer mt20">
    <button type="submit" class="btn btn-primary">Submit</button>
</div>
<div class="btn-back">
    <a title="Stop and return" role="button" href={{ route('department.index') }}> Cancel</a>
</div>
