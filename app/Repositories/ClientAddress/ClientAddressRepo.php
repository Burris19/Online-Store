<?php
/**
 * Created by PhpStorm.
 * User: julian
 * Date: 13/10/15
 * Time: 04:27 PM
 */

namespace App\Repositories\ClientAddress;
use App\Repositories\Base\BaseRepo;

class ClientAddressRepo extends BaseRepo
{
    public function getModel()
    {
        return new ClientAddress();
    }
}