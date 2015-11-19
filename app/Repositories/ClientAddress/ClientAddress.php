<?php

namespace App\Repositories\ClientAddress;

use Illuminate\Database\Eloquent\Model;

class ClientAddress extends Model
{
    protected $table = 'client_addresses';

    protected $fillable = [
      'id_client',
      'id_city',
      'address',
      'observation',
      'latitude',
      'longitude',
    ];

    public $relations = [
        'city'
    ];

    public function city(){
      return $this->hasOne('App\Repositories\City\City', 'id' , 'id_city')->with('department');
    }


}
