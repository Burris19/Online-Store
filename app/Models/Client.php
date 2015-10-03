<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
      protected $table = 'clients';

      protected $fillable = [
          'name',
          'last_name',
          'phone',
          'email',
          'email',
          'nit',
          'valoration'
      ];

      protected $hidden = [
          'password'
      ];

}
