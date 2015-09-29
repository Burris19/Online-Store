<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
      protected $table = 'employee';

      protected $fillable = [
          'id_type_employee',
          'id_store',
          'name',
          'last_name',
          'phone',
          'image',
          'license_no',
          'type_license'
      ];
}
