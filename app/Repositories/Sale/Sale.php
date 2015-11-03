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
}
