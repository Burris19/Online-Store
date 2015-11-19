<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\storeProducts\StoreProductRepo;

class StoreProductController extends CRUDController
{
  protected $module='storeProducts';

  function __construct(StoreProductRepo $storeProductRepo)
  {
    $this->repo=$storeProductRepo;
  }
}
