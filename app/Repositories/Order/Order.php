<?php

namespace App\Repositories\Order;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = [
        'id_sale',
        'id_store_origin',
        'id_store_destiny',
        'type'
    ];


    public $relations = [
        'sale',
        'storeOrigin',
        'storeDestiny'
    ];

    public function sale()
    {
        return $this->hasOne('App\Repositories\Sale\Sale','id','id_sale')->with('client');
    }

    public function storeOrigin()
    {
        return $this->hasOne('App\Repositories\Store\Store','id','id_store_origin')->with('city');
    }

    public function storeDestiny()
    {
        return $this->hasOne('App\Repositories\Store\Store','id','id_store_destiny')->with('city');
    }

}
