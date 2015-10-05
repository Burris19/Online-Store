<?php namespace App\Repositories\Product;

use App\Repositories\Base\BaseRepo;

class ProductRepo extends BaseRepo {

    public function getModel()
    {
        return new Product();
    }
}
