<a title="Get back" role="button" href="{{ route('account.index') }}"> BACK</a>

<div class="form-group">
    {{ Form::label('account_id') }}
    {{ Form::text('account_id', $account->account_id, ['class' => 'form-control' . ($errors->has('account_id') ? ' is-invalid' : ''), 'placeholder' => 'Account Id']) }}
</div>
<div class="form-group">
    {{ Form::label('avail_balance') }}
    {{ Form::text('avail_balance', $account->avail_balance, ['class' => 'form-control' . ($errors->has('avail_balance') ? ' is-invalid' : ''), 'placeholder' => 'Avail Balance']) }}
</div>
<div class="form-group">
    {{ Form::label('close_date') }}
    {{ Form::text('close_date', $account->close_date, ['class' => 'form-control' . ($errors->has('close_date') ? ' is-invalid' : ''), 'placeholder' => 'Close Date']) }}
</div>
<div class="form-group">
    {{ Form::label('last_activity_date') }}
    {{ Form::text('last_activity_date', $account->last_activity_date, ['class' => 'form-control' . ($errors->has('last_activity_date') ? ' is-invalid' : ''), 'placeholder' => 'Last Activity Date']) }}
</div>
<div class="form-group">
    {{ Form::label('open_date') }}
    {{ Form::text('open_date', $account->open_date, ['class' => 'form-control' . ($errors->has('open_date') ? ' is-invalid' : ''), 'placeholder' => 'Open Date']) }}
</div>
<div class="form-group">
    {{ Form::label('pending_balance') }}
    {{ Form::text('pending_balance', $account->pending_balance, ['class' => 'form-control' . ($errors->has('pending_balance') ? ' is-invalid' : ''), 'placeholder' => 'Pending Balance']) }}
</div>
<div class="form-group">
    {{ Form::label('status') }}
    {{ Form::text('status', $account->status, ['class' => 'form-control' . ($errors->has('status') ? ' is-invalid' : ''), 'placeholder' => 'Status']) }}
</div>
<div class="form-group">
    {{ Form::label('cust_id') }}
    {{ Form::text('cust_id', $account->cust_id, ['class' => 'form-control' . ($errors->has('cust_id') ? ' is-invalid' : ''), 'placeholder' => 'Cust Id']) }}
</div>
<div class="form-group">
    {{ Form::label('open_branch_id') }}
    {{ Form::text('open_branch_id', $account->open_branch_id, ['class' => 'form-control' . ($errors->has('open_branch_id') ? ' is-invalid' : ''), 'placeholder' => 'Open Branch Id']) }}
</div>
<div class="form-group">
    {{ Form::label('open_emp_id') }}
    {{ Form::text('open_emp_id', $account->open_emp_id, ['class' => 'form-control' . ($errors->has('open_emp_id') ? ' is-invalid' : ''), 'placeholder' => 'Open Emp Id']) }}
</div>
<div class="form-group">
    {{ Form::label('product_cd') }}
    {{ Form::select('product_cd', $cd, $account->product_cd, ['class' => 'form-control']) }}
</div>
<div>
<button type="submit" class="secondary">Submit</button>
</div>

