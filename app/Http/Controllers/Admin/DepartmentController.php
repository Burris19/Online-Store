<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\Department\DepartmentRepo;
use App\Repositories\City\CityRepo;


class DepartmentController extends CRUDController
{
    protected $module='departments';
    protected $cityRepo;


    function __construct(DepartmentRepo $departmentRepo,
                         CityRepo $cityRepo)
    {
        $this->repo=$departmentRepo;
        $this->cityRepo = $cityRepo;

    }
    public function store(Request $request)
    {
        $data = $request->all();

        return $data;
    }



}
