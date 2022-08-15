<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Business
 *
 * @property $incorp_date
 * @property $name
 * @property $state_id
 * @property $cust_id
 *
 * @property Customer $customer
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Business extends Model
{
    protected $table = 'business';
    protected $primaryKey = "cust_id";
    public $timestamps = false;

    static $rules = [
		'name' => 'required',
		'state_id' => 'required',
		'cust_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['incorp_date','name','state_id','cust_id'];

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
