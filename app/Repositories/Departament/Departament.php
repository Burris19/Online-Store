<?php

namespace App\Repositories\Departament;

use Illuminate\Database\Eloquent\Model;

class Departament extends Model
{
    protected $table = 'departments';
    protected $fillable = [
        'description'
    ];


}
