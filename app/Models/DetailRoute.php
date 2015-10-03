<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailRoute extends Model
{
      protected $table = 'routeDetails';

      protected $fillable = [
          'id_sale',
          'id_route',
          'observation'
      ];
}
