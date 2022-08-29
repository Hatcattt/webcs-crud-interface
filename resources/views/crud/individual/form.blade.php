<div style="padding-bottom: 20px;">
    <span class="required">*</span> <small class="input-required">Inputs required</small>
</div>
<div class="form-group">
    {{ Form::label('birth_date') }}
    {{ Form::date('birth_date', $individual->birth_date, ['class' => 'form-control' . ($errors->has('birth_date') ? ' is-invalid' : ''), 'placeholder' => 'Birth Date']) }}
</div>
<div class="form-group">
    <label for="first_name">First Name 
        <span title="required" class="required">*</span>
    </label>
    {{ Form::text('first_name', $individual->first_name, ['class' => 'form-control' . ($errors->has('first_name') ? ' is-invalid' : ''), 'placeholder' => 'First Name']) }}
</div>
<div class="form-group">
    <label for="last_name">Last Name 
        <span title="required" class="required">*</span>
    </label>
    {{ Form::text('last_name', $individual->last_name, ['class' => 'form-control' . ($errors->has('last_name') ? ' is-invalid' : ''), 'placeholder' => 'Last Name']) }}
</div>
<div class="form-group">
    @if(Route::is('individual.create'))
        {{ Form::hidden('cust_id', $cust_id) }}
    @endif
</div>

<div class="box-footer mt20">
    <button type="submit" class="btn btn-primary">Submit</button>
</div>
{{-- <div class="btn-back">
    <a title="Stop and return" role="button" href={{ route('individual.index') }}> Cancel</a>
</div> --}}
