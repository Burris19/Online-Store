<?php

namespace App\Repositories\StoreProducts;

use App\Repositories\Base\BaseRepo;
use Illuminate\Database\Eloquent\Model;

class StoreProductRepo extends BaseRepo
{
    public function getModel()
    {
        return new StoreProduct();
    }
}
