<?php

namespace App\Repositories\Department;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = 'departments';
    protected $fillable = [
        'description'
    ];

    
}
