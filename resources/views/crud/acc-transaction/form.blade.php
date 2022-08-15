<a title="Get back" role="button" href="{{ route('acc-transaction.index') }}"> BACK</a>

<div class="form-group">
    {{ Form::label('txn_id') }}
    {{ Form::text('txn_id', $acc_transaction->txn_id, ['class' => 'form-control' . ($errors->has('txn_id') ? ' is-invalid' : ''), 'placeholder' => 'Txn Id']) }}
</div>
<div class="form-group">
    {{ Form::label('amount') }}
    {{ Form::text('amount', $acc_transaction->amount, ['class' => 'form-control' . ($errors->has('amount') ? ' is-invalid' : ''), 'placeholder' => 'Amount']) }}
</div>
<div class="form-group">
    {{ Form::label('funds_avail_date') }}
    {{ Form::text('funds_avail_date', $acc_transaction->funds_avail_date, ['class' => 'form-control' . ($errors->has('funds_avail_date') ? ' is-invalid' : ''), 'placeholder' => 'Funds Avail Date']) }}
</div>
<div class="form-group">
    {{ Form::label('txn_date') }}
    {{ Form::text('txn_date', $acc_transaction->txn_date, ['class' => 'form-control' . ($errors->has('txn_date') ? ' is-invalid' : ''), 'placeholder' => 'Txn Date']) }}
</div>
<div class="form-group">
    {{ Form::label('txn_type_cd') }}
    {{ Form::text('txn_type_cd', $acc_transaction->txn_type_cd, ['class' => 'form-control' . ($errors->has('txn_type_cd') ? ' is-invalid' : ''), 'placeholder' => 'Txn Type Cd']) }}
</div>
<div class="form-group">
    {{ Form::label('account_id') }}
    {{ Form::text('account_id', $acc_transaction->account_id, ['class' => 'form-control' . ($errors->has('account_id') ? ' is-invalid' : ''), 'placeholder' => 'Account Id']) }}
</div>
<div class="form-group">
    {{ Form::label('execution_branch_id') }}
    {{ Form::text('execution_branch_id', $acc_transaction->execution_branch_id, ['class' => 'form-control' . ($errors->has('execution_branch_id') ? ' is-invalid' : ''), 'placeholder' => 'Execution Branch Id']) }}
</div>
<div class="form-group">
    {{ Form::label('teller_emp_id') }}
    {{ Form::text('teller_emp_id', $acc_transaction->teller_emp_id, ['class' => 'form-control' . ($errors->has('teller_emp_id') ? ' is-invalid' : ''), 'placeholder' => 'Teller Emp Id']) }}
</div>
<div>
    <button type="submit" class="secondary">Submit</button>
</div>

