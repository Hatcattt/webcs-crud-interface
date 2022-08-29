<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Customer
 *
 * @property $cust_id
 * @property $address
 * @property $city
 * @property $cust_type_cd
 * @property $fed_id
 * @property $postal_code
 * @property $state
 *
 * @property Account[] $accounts
 * @property Business $business
 * @property Individual $individual
 * @property Officer[] $officers
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Customer extends Model
{
    protected $table = 'customer';
    protected $primaryKey = "cust_id";
    public $timestamps = false;

    static $rules = [
        'address' => 'string|max:30|nullable',
        'city' => 'string|max:20|nullable',
		'fed_id' => 'required|regex:^([0-9]-)^',
        'postal_code' => 'string|nullable|regex:^([0-9])^',
        'state' => 'string|max:20|nullable',
    ];

    public static function getTypes() {
        return 
        [
            "i" => "Individual", 
            "b" => "Business",
        ];
    }

    protected $perPage = 10;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['cust_id','address','city','cust_type_cd','fed_id','postal_code','state'];

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
     * @return array
     */
    public function getFillable(): array
    {
        return $this->fillable;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function accounts()
    {
        return $this->hasMany('App\Models\Account', 'cust_id', 'cust_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function business()
    {
        return $this->hasOne('App\Models\Business', 'cust_id', 'cust_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function individual()
    {
        return $this->hasOne('App\Models\Individual', 'cust_id', 'cust_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function officers()
    {
        return $this->hasMany('App\Models\Officer', 'cust_id', 'cust_id');
    }
}
