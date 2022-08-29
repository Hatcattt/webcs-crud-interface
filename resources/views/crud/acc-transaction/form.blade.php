@if(Route::is('acc-transaction.edit'))
    <div style="padding-bottom:20px">
        @switch($acc_transaction->account->customer->cust_type_cd)
        @case("i")
            <strong>{{ $acc_transaction->account->customer->individual->full_name }}</strong> : Available balance ({{ $acc_transaction->account->avail_balance }})
            @break
        @case("b")
            <strong>{{ $acc_transaction->account->customer->business->name }}</strong> : Available balance ({{ $acc_transaction->account->avail_balance }})
            @break
        @default
        @endswitch
    </div>
    <div class="form-group">
        {{ Form::hidden('account_id', $acc_transaction->account_id) }}
    </div>
@endif

@if ($message = Session::get('error'))
    <div><p style="color: red">{{ $message }}</p></div>
@endif

<div style="padding-bottom: 20px;">
    <span class="required">*</span> <small class="input-required">Inputs required</small>
</div>
<div class="form-group">
    <label for="amount">Amount <span title="required" class="required">*</span></label>
    {{ Form::text('amount', $acc_transaction->amount, ['class' => 'form-control' . ($errors->has('amount') ? ' is-invalid' : ''), 'placeholder' => 'ex : 2150.50']) }}
</div>
<div class="form-group">

    <label for="funds_avail_date">Funds Available Date <span title="required" class="required">*</span>
        <span style="padding-left: 20px;">
            <a href="#/" title="Current Date" class="fa-solid fa-clock" type="button" onclick="setCurrentDateTime('fundsAvail')"></a>
        </span>
        <small>Now</small>
    </label>
    {{ Form::datetimelocal('funds_avail_date', $acc_transaction->funds_avail_date, ['class' => 'form-control', 'id' => 'fundsAvail', 'placeholder' => 'Funds Available Date']) }}
</div>
<div class="form-group">

    <label for="txn_date">Transaction Date <span title="required" class="required">*</span>
        <span style="padding-left: 20px;">
            <a href="#/" title="Current Date" class="fa-solid fa-clock" type="button" onclick="setCurrentDateTime('txnDate')"></a>
        </span>
        <small>Now</small>
    </label>
    {{ Form::datetimelocal('txn_date', $acc_transaction->txn_date, ['class' => 'form-control', 'id' => 'txnDate', 'placeholder' => 'Transaction Date']) }}
</div>
<div class="form-group">
    {{ Form::label('txn_type_cd', 'Transaction Type') }}
    {{ Form::text('txn_type_cd', $acc_transaction->txn_type_cd, ['class' => 'form-control' . ($errors->has('txn_type_cd') ? ' is-invalid' : ''), 'placeholder' => 'ex : cdt']) }}
</div>
@if(Route::is('acc-transaction.create'))
    <div class="form-group">
        {{ Form::label('account_id', 'Account') }}

        <select name="account_id" class="form-control">
            @foreach ($accounts as $account)
                <option value={{ $account->account_id }}>
                    @switch($account->customer->cust_type_cd)
                        @case('i')
                            {{ $account->customer->individual->full_name }} : Available balance ({{ $account->avail_balance }}) : Product ({{ $account->product->name }})
                            @break
                        @case('b')
                        {{ $account->customer->business->name }} : Available balance ({{ $account->avail_balance }}) : Product ({{ $account->product->name }})
                            @break
                        @default
                    @endswitch
                </option>
            @endforeach
        </select>
    </div>
@endif
<div class="form-group">
    {{ Form::label('execution_branch_id', 'Execution Branch') }}
    {{ Form::select('execution_branch_id', $branches, ['class' => 'form-control' . ($errors->has('execution_branch_id') ? ' is-invalid' : ''), 'placeholder' => 'Execution Branch']) }}
</div>
<div class="form-group">
    {{ Form::label('teller_emp_id', 'Teller Employee') }}
    {{ Form::select('teller_emp_id', $employees, ['class' => 'form-control' . ($errors->has('teller_emp_id') ? ' is-invalid' : ''), 'placeholder' => 'Teller Employee']) }}
</div>
<div>
    <button type="submit" class="secondary">Submit</button>
</div>
<div class="btn-back">
    <a title="Stop and return" role="button" href={{ route('acc-transaction.index') }}> Cancel</a>
</div>

<script>
    {{ date_default_timezone_set('Europe/Paris'); }}
    const dateTimeNow = "{{ date('Y-m-d H:i'); }}"

    function setCurrentDateTime(idDate) {
        document.getElementById(idDate).value = dateTimeNow;
    }
</script>