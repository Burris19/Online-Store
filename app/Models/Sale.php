<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
      protected $table = 'sales',

      protected $fillable = [
          'id_client',
          'id_store',
          'id_transaction',
          'address',
          'shipping_price',
          'amount',
          'total'
      ];
}
