<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
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
        'end_date' => 'date|nullable',
		'first_name' => 'required|string|min:2|max:30',
		'last_name' => 'required|string|min:2|max:30',
		'start_date' => 'required|date',
    ];

    protected $perPage = 10;


    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['officer_id','end_date','first_name','last_name','start_date','title','cust_id'];

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
