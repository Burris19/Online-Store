<?php

namespace App\Repositories\StoreAddress;

use Illuminate\Database\Eloquent\Model;

class StoreAddress extends Model
{
    protected $table = 'storeAddress';

    protected $fillable = [
        'id_store',
        'id_city',
        'address',
        'observation'
    ];


    public $relations = [
        'city'
    ];

    public function city(){
        return $this->hasOne('App\Repositories\City\City', 'id' , 'id_city')->with('department');
    }



}
