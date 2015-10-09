<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\Car\CarRepo;
use App\Repositories\Store\StoreRepo;

class CarController extends CRUDController
{
  protected $module='cars';
  protected $storeRepo;

  function __construct(CarRepo $carRepo,
                       StoreRepo $storeRepo)
  {
      $this->repo=$carRepo;
      $this->storeRepo=$storeRepo;
  }

  public function index()
  {
    $data=$this->repo->getWithRelations();
    return view($this->root . '/' . $this->module  .'/list',compact('data'));

  }

  public function create()``
  {
      $Store=$this->storeRepo->lists('name','id');
      return view($this->root . '/' . $this->module . '/create', compact('Store'));

  }

}
