<div style="padding-bottom: 20px;">
    <span class="required">*</span> <small class="input-required">Inputs required</small>
</div>

<div class="form-group">
    {{ Form::label('address') }}
    {{ Form::text('address', $branch->address, ['class' => 'form-control' . ($errors->has('address') ? ' is-invalid' : ''), 'placeholder' => 'ex : 145 main st.']) }}
</div>
<div class="form-group">
    {{ Form::label('city') }}
    {{ Form::text('city', $branch->city, ['class' => 'form-control' . ($errors->has('city') ? ' is-invalid' : ''), 'placeholder' => 'ex : Clever']) }}
</div>
<div class="form-group">
    <label for="name">Name <span title="required" class="required">*</span></label>
    {{ Form::text('name', $branch->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'ex : headquarters']) }}
</div>
<div class="form-group">
    {{ Form::label('state') }}
    {{ Form::text('state', $branch->state, ['class' => 'form-control' . ($errors->has('state') ? ' is-invalid' : ''), 'placeholder' => 'ex : ma']) }}
</div>
<div class="form-group">
    {{ Form::label('zip_code') }}
    {{ Form::text('zip_code', $branch->zip_code, ['class' => 'form-control' . ($errors->has('zip_code') ? ' is-invalid' : ''), 'placeholder' => 'ex : 021324']) }}
</div>
<div>
    <button type="submit" class="secondary">Submit</button>
</div>
<div class="btn-back">
    <a title="Stop and return" role="button" href={{ route('branch.index') }}> Cancel</a>
</div>

