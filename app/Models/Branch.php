<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Branch
 *
 * @property $branch_id
 * @property $address
 * @property $city
 * @property $name
 * @property $state
 * @property $zip_code
 *
 * @property Account[] $accounts
 * @property AccTransaction[] $accTransactions
 * @property Employee[] $employees
 * @package App
 * @mixin Builder
 */
class Branch extends Model
{
    use HasFactory;

    public $table = 'branch';
    protected $primaryKey = 'branch_id';
    public $timestamps = false;

    static $rules = [
		'branch_id' => 'required',
		'name' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['branch_id','address','city','name','state','zip_code'];

    /**
     * @return array
     */
    public function getFillable(): array
    {
        return $this->fillable;
    }


    /**
     * @return HasMany
     */
    public function accounts()
    {
        return $this->hasMany('App\Models\Account', 'open_branch_id', 'branch_id');
    }

    /**
     * @return HasMany
     */
    public function accTransactions()
    {
        return $this->hasMany('App\Models\AccTransaction', 'execution_branch_id', 'branch_id');
    }

    /**
     * @return HasMany
     */
    public function employees()
    {
        return $this->hasMany('App\Models\Employee', 'assigned_branch_id', 'branch_id');
    }


}
