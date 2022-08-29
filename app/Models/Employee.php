<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Employee
 *
 * @property $emp_id
 * @property $end_date
 * @property $first_name
 * @property $last_name
 * @property $start_date
 * @property $title
 * @property $assigned_branch_id
 * @property $dept_id
 * @property $superior_emp_id
 *
 * @property Account[] $accounts
 * @property AccTransaction[] $accTransactions
 * @property Branch $branch
 * @property Department $department
 * @property Employee $employee
 * @property Employee[] $employees
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Employee extends Model
{
    protected $table = 'employee';
    protected $primaryKey = "emp_id";
    public $timestamps = false;

    static $rules = [
        'end_date' => 'date|nullable',
		'first_name' => 'required|string|max:20',
		'last_name' => 'required|string|max:20',
		'start_date' => 'required|date',
        'title' => 'string|max:20|nullable'
    ];

    protected $perPage = 10;

    protected $appends = ['full_name'];

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['emp_id','end_date','first_name','last_name','start_date','title','assigned_branch_id','dept_id','superior_emp_id'];

    public function getFullNameAttribute()
    {
            return ucwords("{$this->first_name} {$this->last_name}");
    }

    /**
     * @return array
     */
    public function getFillable(): array
    {
        return $this->fillable;
    }

    /**
     * @return Attribute first name with ucfirst() method
     */
    protected function firstName(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => ucfirst($value),
        );
    }

    /**
     * @return Attribute last name with ucfirst() method
     */
    protected function lastName(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => ucfirst($value),
        );
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function accounts()
    {
        return $this->hasMany('App\Models\Account', 'open_emp_id', 'emp_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function accTransactions()
    {
        return $this->hasMany('App\Models\AccTransaction', 'teller_emp_id', 'emp_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function branch()
    {
        return $this->hasOne('App\Models\Branch', 'branch_id', 'assigned_branch_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function department()
    {
        return $this->hasOne('App\Models\Department', 'dept_id', 'dept_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function employee()
    {
        return $this->hasOne('App\Models\Employee', 'emp_id', 'superior_emp_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function employees()
    {
        return $this->hasMany('App\Models\Employee', 'superior_emp_id', 'emp_id');
    }


}
