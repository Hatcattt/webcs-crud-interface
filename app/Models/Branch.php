<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
        'address' => 'string|max:30|nullable',
        'city' => 'string|max:20|nullable',
		'name' => 'required|string|max:20',
        'state' => 'string|max:10|nullable',
        'zip_code' => 'string|max:10|nullable|regex:^\d+$^',
    ];

    /**
     * @return Attribute city with ucfirst() method
     */
    protected function city(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => ucfirst($value),
        );
    }

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
