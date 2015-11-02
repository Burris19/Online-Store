<?php

namespace App\Repositories\StoreProducts;

use Illuminate\Database\Eloquent\Model;

class StoreProduct extends Model
{
    protected $table = 'storeProducts';

    protected $fillable = [
        'idstore',
        'idProduct'
    ];
}
