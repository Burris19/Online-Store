<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientAddress extends Model
{
      protected $table = 'client_addresses';

      protected $fillable = [
          'id_client',
          'id_city',
          'address',
          'observation'
      ];
}