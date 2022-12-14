<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

/**
 * Class Individual
 *
 * @property $birth_date
 * @property $first_name
 * @property $last_name
 * @property $cust_id
 *
 * @property Customer $customer
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Individual extends Model
{
    protected $table = 'individual';
    protected $primaryKey = "cust_id";
    public $timestamps = false;

    static $rules = [
        'birth_date' => 'date|nullable',
		'first_name' => 'required',
		'last_name' => 'required',
    ];

    protected $perPage = 10;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['birth_date','first_name','last_name','cust_id'];
    
    public function getFullNameAttribute()
    {
            return ucwords("{$this->first_name} {$this->last_name}");
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
     * @return array
     */
    public function getFillable(): array
    {
        return $this->fillable;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function customer()
    {
        return $this->hasOne('App\Models\Customer', 'cust_id', 'cust_id');
    }

}
