<?php

namespace App\Repositories\TypeEmployee;

use Illuminate\Database\Eloquent\Model;

class TypeEmployee extends Model
{
      protected $table = 'typeEmployees';
      protected $fillable = [
          'description'
      ];
}
