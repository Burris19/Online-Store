<?php

namespace App\Repositories\Order;

use App\Repositories\Base\BaseRepo;
use Illuminate\Database\Eloquent\Model;

class OrderRepo extends BaseRepo
{
    public function getModel()
    {
        return new Order();
    }
}
