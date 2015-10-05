<?php
/**
 * Created by PhpStorm.
 * User: julian
 * Date: 5/10/15
 * Time: 03:41 PM
 */

namespace App\Repositories\Provider;
use App\Repositories\Base\BaseRepo;

class ProviderRepo extends  BaseRepo
{
    public  function  getModel()
    {
        return new Provider();
    }
}