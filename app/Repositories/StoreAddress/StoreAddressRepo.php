<?php
namespace App\Repositories\StoreAddress;

use App\Repositories\Base\BaseRepo;

/**
 *
 */
class StoreAddressRepo extends BaseRepo
{
      public function getModel()
    {
      return new StoreAddress;
    }
}
