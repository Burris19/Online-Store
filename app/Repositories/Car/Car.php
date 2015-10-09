<?php

namespace App\Repositories\Car;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $table='cars';

    protected $fillable=[
        'id_store',
        'code',
        'brand',
        'capacity',
        'type'
      ];

    public  $relations=[
      'stores'
    ];

    public function stores()
    {
      return $this->hasOne('App\Repositories\Store\Store' , 'id' , 'id_store');
    }
}
