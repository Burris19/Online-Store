<?php

namespace App\Repositories\Sale;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $table = 'sales';

    protected $fillable = [
      'id_client',
      'is_urgent',
      'shipping_price',
      'amount',
      'total'
    ];

    public $relations = [
        'client'
    ];


    public function client()
    {
        return $this->hasOne('App\Repositories\Client\Client','id','id_client')->with('address');
    }
}
