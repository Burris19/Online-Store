<?php

namespace App\Repositories\DetailOrder;

use App\Repositories\Base\BaseRepo;
use Illuminate\Database\Eloquent\Model;

class DetailOrderRepo extends BaseRepo
{
    public function getModel()
    {
        return new DetailOrder();
    }
}
