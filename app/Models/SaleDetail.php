<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SaleDetail extends Model
{
      protected $table = 'saleDetail';

      protected $fillable = [
          'id_sale',
          'id_product',
          'quantity',
          'price'
      ];

}
