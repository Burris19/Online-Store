<?php

namespace App\Repositories\Employee;
use App\Repositories\Base\BaseRepo;

class EmployeeRepo extends  BaseRepo
{
    public  function  getModel()
    {
        return new Employee();
    }
}
