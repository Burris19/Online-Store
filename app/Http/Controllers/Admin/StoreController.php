<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\Store\StoreRepo;
use App\Repositories\Department\DepartmentRepo;
use App\Repositories\City\CityRepo;

class StoreController extends CRUDController
{

  protected $module='stores';
  protected $departmentRepo;
  protected $cityRepo;

  function __construct(StoreRepo $storeRepo,
                       DepartmentRepo $departmentRepo,
                       CityRepo $cityRepo)
  {
      $this->repo=$storeRepo;
      $this->departmentRepo=$departmentRepo;
      $this->cityRepo=$cityRepo;
  }


  public function create()
  {
      $department=$this->departmentRepo->lists('description','id');
      $city=$this->cityRepo->lists('description','id');
      return view($this->root . '/' . $this->module . '/create', compact('department','city'));
  }




}
