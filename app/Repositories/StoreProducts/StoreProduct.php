<?php

namespace App\Repositories\StoreProducts;

use Illuminate\Database\Eloquent\Model;

class StoreProduct extends Model
{
    protected $table = 'storeProducts';

    protected $fillable = [
        'idStore',
        'idProduct'
    ];

    public $relations=[
      'product',
      'store'
    ];

    public function product()
    {
        return $this->hasOne('App\Repositories\Product\Product', 'id','idProduct');
    }

    public function store()
    {
        return $this->hasOne('App\Repositories\Store\Store', 'id','idStore')->with('city');
    }
}
