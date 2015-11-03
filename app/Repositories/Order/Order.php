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
        'order',
        'storeOrigin',
        'storeDestiny'
    ];

    public function sale()
    {
        return $this->hasOne('App\Repositories\Sale\Sale','id','id_sale');
    }

    public function storeOrigin()
    {
        return $this->hasOne('App\Repositories\Store\Store','id','id_store_origin');
    }

    public function storeDestiny()
    {
        return $this->hasOne('App\Repositories\Store\Store','id','id_store_destiny');
    }

}
