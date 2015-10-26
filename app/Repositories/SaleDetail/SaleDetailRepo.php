<?php
/**
 * Created by PhpStorm.
 * User: julian
 * Date: 25/10/15
 * Time: 03:53 PM
 */

namespace App\Repositories\SaleDetail;


use App\Repositories\Base\BaseRepo;

class SaleDetailRepo extends BaseRepo
{
    public function getModel(){
        return new SaleDetail();
    }
}