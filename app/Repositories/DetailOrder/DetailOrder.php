<?php

namespace App\Repositories\DetailOrder;

use Illuminate\Database\Eloquent\Model;

class DetailOrder extends Model
{
    protected $table = 'detailOrders';

    protected $fillable = [
        'id_order',
        'id_store_origin',
        'id_store_destiny',
        'type',
        'time',
        'status'
    ];

    public $relations = [
        'order',
        'storeOrigin',
        'storeDestiny'
    ];


    public function order()
    {
        return $this->hasOne('App\Repositories\Order\Order','id','id_order')->with('sale');
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
