<?php

namespace App\Models;

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
