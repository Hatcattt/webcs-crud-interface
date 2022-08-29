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
        'incorp_date' => 'date',
		'name' => 'required|string|max:255',
		'state_id' => 'required|string|max:10',
    ];

    protected $perPage = 10;

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
