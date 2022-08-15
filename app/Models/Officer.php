<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Officer
 *
 * @property $officer_id
 * @property $end_date
 * @property $first_name
 * @property $last_name
 * @property $start_date
 * @property $title
 * @property $cust_id
 *
 * @property Customer $customer
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Officer extends Model
{
    protected $table = 'officer';
    protected $primaryKey = "officer_id";
    public $timestamps = false;

    static $rules = [
		'officer_id' => 'required',
		'first_name' => 'required',
		'last_name' => 'required',
		'start_date' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['officer_id','end_date','first_name','last_name','start_date','title','cust_id'];

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
