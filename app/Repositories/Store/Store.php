<?php

namespace App\Repositories\Store;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $table = 'stores';

    protected $fillable = [
        'code',
        'name',
        'phone',
        'id_city'
    ];


    public $relations = [
        'city',
        'products'
    ];

    public function city(){
        return $this->hasOne('App\Repositories\City\City', 'id','id_city')->with('department');
    }

    public function products()
    {
        return $this->belongsToMany('App\Repositories\Product\Product', 'storeProducts', 'idStore', 'idProduct')->with('category','provider');
    }



}
