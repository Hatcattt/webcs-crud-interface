<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Class Product
 *
 * @property $product_cd
 * @property $date_offered
 * @property $date_retired
 * @property $name
 * @property $product_type_cd
 *
 * @property Account[] $accounts
 * @property ProductType $productType
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Product extends Model
{
    protected $table = 'product';
    protected $primaryKey = "product_cd";

    public $timestamps = false;
    public $incrementing = false;
    protected $keyType = 'string';

    static $rules = [
        'product_cd' => 'required|string|max:10',
		'name' => 'required|string|max:50',
    ];

    protected $perPage = 10;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['product_cd','date_offered','date_retired','name','product_type_cd'];

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
        return $this->hasMany('App\Models\Account', 'product_cd', 'product_cd');
    }

    /**
     * @return HasOne
     */
    public function productType()
    {
        return $this->hasOne('App\Models\ProductType', 'product_type_cd', 'product_type_cd');
    }
}
