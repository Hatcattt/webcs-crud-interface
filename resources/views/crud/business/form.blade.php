<div style="padding-bottom: 20px;">
    <span class="required">*</span> <small class="input-required">Inputs required</small>
</div>
<div class="form-group">
    <label for="incorp_date">Incorpored Date
        <span style="padding-left: 20px;">
            <a href="#/" title="Current Date" class="fa-solid fa-clock" type="button" onclick="setCurrentDate('incorpDate')"></a>
        </span>
        <small>Now</small>
    </label>
    {{ Form::date('incorp_date', $business->incorp_date, ['class' => 'form-control', 'id' => 'incorpDate']) }}
</div>
<div class="form-group">
    <label for="name">Name <span title="required" class="required">*</span></label>
    {{ Form::text('name', $business->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'ex : chilton engineering']) }}
</div>
<div class="form-group">
    <label for="state_id">State <span title="required" class="required">*</span></label>
    {{ Form::text('state_id', $business->state_id, ['class' => 'form-control' . ($errors->has('state_id') ? ' is-invalid' : ''), 'placeholder' => 'ex : ha']) }}
</div>
<div class="form-group">
    @if(Route::is('business.create'))
        {{ Form::hidden('cust_id', $cust_id) }}
    @endif
</div>
@if(Route::is('business.create'))
    <div>
        <p>Passez à l'épate suivante pour finaliser la création du client.</p>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Next</button>
    </div>
@else
    <div>
        <p>Editer le client d'avantage ? {{ Form::checkbox('choice', 'yes') }}</p>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
@endif
{{-- <div class="btn-back">
    <a title="Stop and return" role="button" href={{ route('business.index') }}> Cancel</a>
</div> --}}

<script>
    let dateNow = "{{ date('Y-m-d'); }}"

    function setCurrentDate(idDate) {
        document.getElementById(idDate).value = dateNow;
    }
</script>
