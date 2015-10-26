<?php

namespace App\Repositories\SaleDetail;

use Illuminate\Database\Eloquent\Model;

class SaleDetail extends Model
{
      protected $table = 'saleDetails';

      protected $fillable = [
          'id_sale',
          'id_product',
          'quantity',
          'price'
      ];

}
