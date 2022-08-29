<div style="padding-bottom: 20px;">
    <span class="required">*</span> <small class="input-required">Inputs required</small>
</div>

<div class="form-group">
    {{ Form::label('Availiable Balance') }}
    {{ Form::text('avail_balance', $account->avail_balance, ['class' => 'form-control' . ($errors->has('avail_balance') ? ' is-invalid' : ''), 'placeholder' => 'ex : 250.50']) }}
</div>
<div class="form-group">

    <label for="close_date">Close Date
        <span style="padding-left: 20px;">
            <a href="#/" title="Current Date" class="fa-solid fa-clock" type="button" onclick="setCurrentDate('closeDate')"></a>
        </span>
        <small>Now</small>
    </label>
    {{ Form::date('close_date', $account->close_date, ['class' => 'form-control', 'id' => 'closeDate', 'placeholder' => 'Close Date']) }}
</div>
<div class="form-group">

    <label for="last_activity_date">Last activity
        <span style="padding-left: 20px;">
            <a href="#/" title="Current Date" class="fa-solid fa-clock" type="button" onclick="setCurrentDate('lastActivity')"></a>
        </span>
        <small>Now</small>
    </label>
    {{ Form::date('last_activity_date', $account->last_activity_date, ['class' => 'form-control', 'id' => 'lastActivity', 'placeholder' => 'Last Activity Date']) }}
</div>
<div class="form-group">

    <label for="open_date">Open Date <span title="required" class="required">*</span>
        <span style="padding-left: 20px;">
            <a href="#/" title="Current Date" class="fa-solid fa-clock" type="button" onclick="setCurrentDate('openDate')"></a>
        </span>
        <small>Now</small>
    </label>
    {{ Form::date('open_date', $account->open_date, ['class' => 'form-control', 'id' => 'openDate' ,'placeholder' => 'Open Date']) }}
</div>
<div class="form-group">
    {{ Form::label('pending_balance') }}
    {{ Form::text('pending_balance', $account->pending_balance, ['class' => 'form-control' . ($errors->has('pending_balance') ? ' is-invalid' : ''), 'placeholder' => 'ex : 250.50']) }}
</div>
<div class="form-group">
    {{ Form::label('status') }}
    {{ Form::text('status', $account->status, ['class' => 'form-control' . ($errors->has('status') ? ' is-invalid' : ''), 'placeholder' => 'ex : active']) }}
</div>
@if(Route::is('account.create'))
<div class="form-group">
    {{ Form::label('cust_id', 'Customer') }}
    {{ Form::model($account, ['route' => ['account.store', $account->account_id]]) }}

    <select name="cust_id" class="form-control">
        @foreach ($customers as $customer)
            <option value={{ $customer->cust_id }}
                @if($customer->business == null && $customer->individual == null)
                        disabled
                @endif>
                
                @switch($customer->cust_type_cd)
                    @case("i")
                        Individual : {{ $customer->individual != null ? $customer->individual->full_name: "Not complete" }}
                        @break
                    @case("b")
                        Business : {{ $customer->business != null ? $customer->business->name : "Not complete" }}
                        @break
                    @default
                        None
                @endswitch
            </option>
        @endforeach
    </select>
</div>
@endif
<div class="form-group">
    {{ Form::label('Branch') }}
    {{ Form::select('open_branch_id', $branches, $account->open_branch_id, ['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('Employee') }}
    {{ Form::select('open_emp_id', $employees, $account->open_emp_id, ['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('Product') }}
    {{ Form::select('product_cd', $products, $account->product_cd, ['class' => 'form-control']) }}
</div>
<div>
    <button type="submit" class="secondary">Submit</button>
</div>
<div class="btn-back">
    <a title="Stop and return" role="button" href={{ route('account.index') }}> Cancel</a>
</div>

<script>
    let dateNow = "{{ date('Y-m-d'); }}"

    function setCurrentDate(idDate) {
        document.getElementById(idDate).value = dateNow;
    }
</script>