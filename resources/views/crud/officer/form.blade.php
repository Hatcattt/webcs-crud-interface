<div style="padding-bottom: 20px;">
    <span class="required">*</span> <small class="input-required">Inputs required</small>
</div>
<div class="form-group">

    {{-- <span title="required" class="required">*</span> --}}
    <label for="end_date">End Date 
        <span style="padding-left: 20px;">
            <a href="#/" title="Current Date" class="fa-solid fa-clock" type="button" onclick="setCurrentDate('endDate')"></a>
        </span>
        <small>Now</small>
    </label>
    {{ Form::date('end_date', $officer->end_date, ['class' => 'form-control', 'id' => 'endDate']) }}
</div>
{{-- <div class="form-group">
    {{ Form::label('end_date') }}
    {{ Form::date('end_date', $officer->end_date, ['class' => 'form-control' . ($errors->has('end_date') ? ' is-invalid' : ''), 'placeholder' => 'End Date']) }}
</div> --}}
<div class="form-group">
    <label for="first_name">First Name 
        <span title="required" class="required">*</span>
    </label>
    {{ Form::text('first_name', $officer->first_name, ['class' => 'form-control' . ($errors->has('first_name') ? ' is-invalid' : ''), 'placeholder' => 'ex : Tony']) }}
</div>
<div class="form-group">
    <label for="last_name">Last Name 
        <span title="required" class="required">*</span>
    </label>
    {{ Form::text('last_name', $officer->last_name, ['class' => 'form-control' . ($errors->has('last_name') ? ' is-invalid' : ''), 'placeholder' => 'ex : Montana']) }}
</div>
<div class="form-group">
    <label for="start_date">Start Date 
        <span style="padding-left: 20px;">
            <a href="#/" title="Current Date" class="fa-solid fa-clock" type="button" onclick="setCurrentDate('startDate')"></a>
        </span>
        <small>Now</small>
    </label>
    {{ Form::date('start_date', $officer->start_date, ['class' => 'form-control', 'id' => 'startDate']) }}
</div>
<div class="form-group">
    {{ Form::label('title') }}
    {{ Form::text('title', $officer->title, ['class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : ''), 'placeholder' => 'Title']) }}
</div>
<div class="form-group">
    @if(Route::is('officer.create'))
        {{ Form::hidden('cust_id', $cust_id) }}
    @endif
</div>

<div class="box-footer mt20">
    <button type="submit" class="btn btn-primary">Submit</button>
</div>

<script>
    let dateNow = "{{ date('Y-m-d'); }}"

    function setCurrentDate(idDate) {
        document.getElementById(idDate).value = dateNow;
    }
</script>