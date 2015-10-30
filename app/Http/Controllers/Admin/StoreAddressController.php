<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\StoreAddress\StoreAddressRepo;

class StoreAddressController extends CRUDController
{
    protected $module='storesAddress';

    function __construct(StoreAddressRepo $storesAddressRepo)
    {
        $this->repo=$storesAddressRepo;
    }
}
