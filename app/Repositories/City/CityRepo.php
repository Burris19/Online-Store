<?php

namespace App\Repositories\City;

use App\Repositories\Base\BaseRepo;

class CityRepo extends BaseRepo
{
    public function getModel()
    {
        return new City();
    }
}
