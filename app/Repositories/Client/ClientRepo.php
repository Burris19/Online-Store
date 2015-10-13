<?php
namespace App\Repositories\Client;
/**
 * Created by PhpStorm.
 * User: julian
 * Date: 13/10/15
 * Time: 03:52 PM
 */
use App\Repositories\Base\BaseRepo;
class ClientRepo extends BaseRepo
{
    public function getModel(){
        return new Client();
    }
}

