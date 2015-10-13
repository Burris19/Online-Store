<?php

namespace App\Repositories\Client;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
      protected $table = 'clients';

      protected $fillable = [
          'name',
          'last_name',
          'phone',
          'email',
          'nit',
          'valoration',
          'password'
      ];

      protected $hidden = [
          'password'
      ];

      public function setPasswordAttribute($value)
      {
          if(!empty($value))
          {
              $this->attributes['password'] = bcrypt($value);
          }
      }

}
