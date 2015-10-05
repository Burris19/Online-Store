<?php

namespace App\Repositories\Provider;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
      protected $table = 'providers';

      protected $fillable = [
          'name',
          'description',
          'phone',
          'email',
          'logo',
          'code'
      ];
}
