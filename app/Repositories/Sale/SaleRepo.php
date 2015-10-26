<?php
/**
 * Created by PhpStorm.
 * User: julian
 * Date: 25/10/15
 * Time: 03:51 PM
 */

namespace App\Repositories\Sale;

use App\Repositories\Base\BaseRepo;

class SaleRepo extends BaseRepo
{
    public function getModel()
    {
        return new Sale();
    }
}