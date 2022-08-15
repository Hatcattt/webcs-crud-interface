<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
		'first_name' => 'required',
		'last_name' => 'required',
		'cust_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['birth_date','first_name','last_name','cust_id'];

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
