<?php

namespace App\Repositories\StoreAddress;

use Illuminate\Database\Eloquent\Model;

class StoreAddress extends Model
{
      protected $table = 'storeAddresses';

      protected $fillable = [
          'id_store',
          'id_city',
          'observation',
          'address'
      ];

      public $relations=[
        'stores',
        'cities'
      ];

      public function stores()
      {
        return $this->hasOne('App\Repositories\Stores\Stores' , 'id' , 'id_store');
      }

      public function cities()
      {
        return $this->hasOne('App\Repositories\City\City' , 'id' , 'id_city');
      }




}
