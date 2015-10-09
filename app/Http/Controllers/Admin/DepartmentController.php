<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\Department\DepartmentRepo;


class DepartmentController extends CRUDController
{
    protected $module='departments';


    function __construct(DepartmentRepo $departmentRepo)
    {
        $this->repo=$departmentRepo;
    }
    public function store(Request $request)
    {
        $data =$request->all();
        return $data;
    }



}
