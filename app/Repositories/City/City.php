<?php

namespace App\Repositories\City;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'cities';

    protected $fillable = [
        'id_department',
        'description'
    ];
    public $relations = [
        'departments'
    ];


    public function departments()
    {
        return $this->hasOne('App\Repositories\Department\Department' , 'id' , 'id_department');
    }




}
