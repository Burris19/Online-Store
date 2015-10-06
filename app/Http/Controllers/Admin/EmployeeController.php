<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\Employee\EmployeeRepo;
use App\Repositories\TypeEmployee\TypeEmployeeRepo;

class EmployeeController extends CRUDController
{
  protected $module ='employees';
  protected $employeeRepo;
  protected $typeEmployeeRepo;

  function __construct(EmployeeRepo $employeeRepo,
                       TypeEmployeeRepo $typeEmployeeRepo)
  {
    $this->repo=$employeeRepo;
    $this->typeEmployeeRepo=$typeEmployeeRepo;
  }

  public function index()
  {
    $data = $this->repo->getWithRelations();
    return view($this->root . '/' . $this->module  .'/list',compact('data'));
  }

  public function create()
  {
      $Types = $this->typeEmployeeRepo->lists('description','id');
      return view($this->root . '/' . $this->module . '/create', compact('Types'));
  }

}
