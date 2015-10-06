<?php

namespace App\Repositories\TypeEmployee;
use App\Repositories\Base\BaseRepo;

class TypeEmployeeRepo extends  BaseRepo
{
    public  function  getModel()
    {
        return new TypeEmployee();
    }
}
