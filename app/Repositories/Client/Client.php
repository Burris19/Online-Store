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
      'id_user'
    ];

    public function getFullNameAttribute()
    {
      return $this->name . ' ' . $this->last_name;
    }

    public $relations = [
        'address'
    ];

    public function address()
    {
        return $this->hasMany('App\Repositories\ClientAddress\ClientAddress','id_client','id');
    }



}
