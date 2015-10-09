<?php

namespace App\Repositories\Department;

use App\Repositories\Base\BaseRepo;

class DepartmentRepo extends BaseRepo
{
    public function getModel()
    {
        return new Department();
    }
}
