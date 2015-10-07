<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\Store\StoreRepo;

class StoreController extends CRUDController
{

  protected $module='stores';

  function __construct(StoreRepo $storeRepo)
  {
    $this->repo=$storeRepo;
  }

}
