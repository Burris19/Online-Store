<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
      protected $table = 'routes';

      protected $fillable = [
          'id_car',
          'id_employee'
      ];
}
