<?php

namespace App\Repositories\Employee;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
      protected $table = 'employees';

      protected $fillable = [
          'id_type_employee',
          'id_store',
          'id_user',
          'name',
          'last_name',
          'phone',
          'image',
          'license_no',
          'type_license'
      ];

      public $relations = [
          'typeEmployee',
          'store'
      ];

      // Relations

      public function typeEmployee()
      {
          return $this->hasOne('App\Repositories\TypeEmployee\TypeEmployee', 'id','id_type_employee');
      }

      public function store()
      {
          return $this->hasOne('App\Repositories\Store\Store','id','id_store');
      }




}
