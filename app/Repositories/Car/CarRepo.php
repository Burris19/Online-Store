<?php
namespace App\Repositories\Car;

use App\Repositories\Base\Baserepo;

/**
 *
 */
class CarRepo extends Baserepo
{
    public function getModel()
    {
        return new Car();
    }
}
