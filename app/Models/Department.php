<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Department
 *
 * @property $dept_id
 * @property $name
 *
 * @property Employee[] $employees
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Department extends Model
{
    protected $table = 'department';
    protected $primaryKey = "dept_id";
    public $timestamps = false;

    static $rules = [
		'dept_id' => 'required',
		'name' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['dept_id','name'];

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
    public function employees()
    {
        return $this->hasMany('App\Models\Employee', 'dept_id', 'dept_id');
    }


}
