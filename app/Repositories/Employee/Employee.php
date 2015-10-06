<?php

namespace App\Repositories\Employee;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
      protected $table = 'employees';

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
