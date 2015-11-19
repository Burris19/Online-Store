<?php

namespace App\Repositories\StoreAddress;

use App\Repositories\Base\BaseRepo;
use Illuminate\Database\Eloquent\Model;

class StoreAddressRepo extends BaseRepo
{
    public function getModel()
    {
        return new StoreAddress();
    }
}
