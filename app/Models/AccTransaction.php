<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Class AccTransaction
 *
 * @property $txn_id
 * @property $amount
 * @property $funds_avail_date
 * @property $txn_date
 * @property $txn_type_cd
 * @property $account_id
 * @property $execution_branch_id
 * @property $teller_emp_id
 *
 * @property Account $account
 * @property Branch $branch
 * @property Employee $employee
 * @package App
 * @mixin Builder
 */
class AccTransaction extends Model
{
    use HasFactory;

    public $table = 'acc_transaction';
    protected $primaryKey = 'txn_id';
    public $timestamps = false;

    static $rules = [
		'txn_id' => 'required|int',
		'amount' => 'required',
		'funds_avail_date' => 'required|date',
		'txn_date' => 'required|date',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['txn_id','amount','funds_avail_date','txn_date','txn_type_cd', 'account_id'];

    /**
     * @return array
     */
    public function getFillable(): array
    {
        return $this->fillable;
    }



    /**
     * @return HasOne
     */
    public function account()
    {
        return $this->hasOne('App\Models\Account', 'account_id', 'account_id');
    }

    /**
     * @return HasOne
     */
    public function branch()
    {
        return $this->hasOne('App\Models\Branch', 'branch_id', 'execution_branch_id');
    }

    /**
     * @return HasOne
     */
    public function employee()
    {
        return $this->hasOne('App\Models\Employee', 'emp_id', 'teller_emp_id');
    }


}
