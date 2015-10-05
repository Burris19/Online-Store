<?php

namespace App\Repositories\Product;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
      protected $table = 'products';

      protected $fillable = [
          'id_category',
          'id_provider',
          'title',
          'description',
          'code',
          'price',
          'image'
      ];

}
