<?php

namespace App\Repositories\Departament;

use App\Repositories\Base\BaseRepo;

class DepartamentRepo extends BaseRepo
{
    public function getModel()
    {
        return new Departament();
    }
}
