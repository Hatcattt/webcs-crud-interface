<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ProductType
 *
 * @property $product_type_cd
 * @property $name
 *
 * @property Product[] $products
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class ProductType extends Model
{
    protected $table = 'product_type';
    public $primaryKey = "product_type_cd";

    public $timestamps = false;
    public $incrementing = false;
    protected $keyType = 'string';

    static $rules = [
		'product_type_cd' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['product_type_cd','name'];

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
    public function products()
    {
        return $this->hasMany('App\Models\Product', 'product_type_cd', 'product_type_cd');
    }


}
