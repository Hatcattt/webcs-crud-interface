<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Account
 *
 * @property $account_id
 * @property $avail_balance
 * @property $close_date
 * @property $last_activity_date
 * @property $open_date
 * @property $pending_balance
 * @property $status
 * @property $cust_id
 * @property $open_branch_id
 * @property $open_emp_id
 * @property $product_cd
 *
 * @property AccTransaction[] $accTransactions
 * @property Branch $branch
 * @property Customer $customer
 * @property Employee $employee
 * @property Product $product
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Account extends Model
{
    public $table = 'account';
    protected $primaryKey = 'account_id';
    public $timestamps = false;

    static $rules = [
        'avail_balance' => 'numeric|min:1|nullable',
        'close_date' => 'date|nullable',
        'last_activity_date' => 'date|nullable',
        'open_date' => 'required|date',
        'pending_balance' => 'numeric|min:0|nullable',
        'status' => 'string|max:10|nullable',
        'open_emp_id' => 'required',
        'product_cd' => 'required'
    ];

    protected $perPage = 10;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['account_id','avail_balance','close_date','last_activity_date','open_date','pending_balance','status','cust_id','open_branch_id','open_emp_id','product_cd'];

    /**
     * @return array
     */
    public function getFillable(): array
    {
        return $this->fillable;
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function accTransactions()
    {
        return $this->hasMany('App\Models\AccTransaction', 'account_id', 'account_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function branch()
    {
        return $this->hasOne('App\Models\Branch', 'branch_id', 'open_branch_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function customer()
    {
        return $this->hasOne('App\Models\Customer', 'cust_id', 'cust_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function employee()
    {
        return $this->hasOne('App\Models\Employee', 'emp_id', 'open_emp_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function product()
    {
        return $this->hasOne('App\Models\Product', 'product_cd', 'product_cd');
    }


}
