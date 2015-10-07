<?php

namespace App\Repositories\Store;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $table = 'stores';

    protected $fillable = [
        'code',
        'name',
        'phone'
    ];

}
