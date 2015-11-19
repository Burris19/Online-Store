<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\Store\StoreRepo;
use App\Repositories\Department\DepartmentRepo;
use App\Repositories\City\CityRepo;
use App\Repositories\StoreAddress\StoreAddressRepo;

class StoreController extends CRUDController
{
    protected $module='stores';
    protected $departmentRepo;
    protected $cityRepo;
    protected $storeAddressRepo = null;

  protected $rules = [
      'code'  =>  'required|unique:stores',
      'name'  =>  'required',
      'phone' => 'required',
      'address' => 'required',
      'id_city' => 'required'
  ];

  function __construct(StoreRepo $storeRepo,
                       DepartmentRepo $departmentRepo,
                       CityRepo $cityRepo, StoreAddressRepo $storeAddressRepo)
  {
      $this->repo=$storeRepo;
      $this->departmentRepo=$departmentRepo;
      $this->cityRepo=$cityRepo;
      $this->storeAddressRepo = $storeAddressRepo;
  }

  public function index()
  {
      $data = $this->repo->getWithRelations();
      return view($this->root . '/' . $this->module  .'/list',compact('data'));
  }

  public function create()
  {
      $department=$this->departmentRepo->lists('description','id');
      $city=$this->cityRepo->lists('description','id');
      return view($this->root . '/' . $this->module . '/create', compact('department','city'));
  }

  public function store(Request $request)
  {
      $data = $request->all();

      try {
          $validator = \Validator::make($data, $this->rules);
          $success = true;
          $message = "Registro guardado exitosamente";
          $record = null;
          if ($validator->passes())
          {
              $record = $this->repo->create($data);
              $data['id_store'] = $record->id;
              $record = $this->storeAddressRepo->create($data);
              return compact('success','message','record','data');
          }
          else
          {
              $success=false;
              $message = $validator->messages();
              return compact('success','message','record','data');
          }
      } catch (Exception $e) {
          return $e;
      }


  }




}
