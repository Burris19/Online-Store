<?php

namespace App\Repositories\Category;

use App\Repositories\Base\BaseRepo;

class CategoryRepo extends BaseRepo
{
    public function getModel()
    {
        return new Category();
    }
}
