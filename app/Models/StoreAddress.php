<?php

namespace App\Models;

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
}
