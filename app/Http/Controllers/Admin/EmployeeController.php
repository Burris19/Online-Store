<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\Employee\EmployeeRepo;
use App\Repositories\Store\StoreRepo;
use App\Repositories\TypeEmployee\TypeEmployeeRepo;

class EmployeeController extends CRUDController
{
    protected $module ='employees';
    protected $typeEmployeeRepo;
    protected $storeRepo;

    function __construct(EmployeeRepo $employeeRepo,
                         TypeEmployeeRepo $typeEmployeeRepo,
                         StoreRepo $storeRepo)
    {
        $this->repo=$employeeRepo;
        $this->typeEmployeeRepo = $typeEmployeeRepo;
        $this->storeRepo = $storeRepo;
    }

    public function index()
    {
        $data = $this->repo->getWithRelations();
        return view($this->root . '/' . $this->module  .'/list',compact('data'));
    }

    public function create()
    {
        $Types = $this->typeEmployeeRepo->lists('description','id');
        $Store = $this->storeRepo->lists('name','id');
        return view($this->root . '/' . $this->module . '/create', compact('Types','Store'));
    }

}
