<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeEmployee extends Model
{
      protected $table = 'typeEmployees';
      protected $fillable = [
          'description'
      ];
}
