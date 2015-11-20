<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\storeProducts\StoreProductRepo;
use App\Repositories\Store\StoreRepo;
use App\Repositories\Product\ProductRepo;

class StoreProductController extends CRUDController
{

  protected $module='storeProducts';
  protected $storeRepo;
  protected $productRepo;

  function __construct(StoreProductRepo $storeProductRepo,
                       StoreRepo $storeRepo,
                       ProductRepo $productRepo)
  {
      $this->repo=$storeProductRepo;
      $this->storeRepo = $storeRepo;
      $this->productRepo=$productRepo;
  }

  public function index()
  {
      $Stores = $this->storeRepo->getAll();
      $Products=$this->productRepo->getAll();
      return view($this->root . '/' . $this->module . '/list', compact('Stores','Products'));
  }

  public function create()
  {
      $Products=$this->productRepo->getAll();
      return view($this->root . '/' . $this->module . '/create', compact('Products'));
  }
}
