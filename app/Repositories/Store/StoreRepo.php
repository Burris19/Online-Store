<?php namespace App\Repositories\Store;

use App\Repositories\Base\BaseRepo;

class StoreRepo extends BaseRepo {

    public function getModel()
    {
        return new Store();
    }

}
