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
        $data =$request->all();
        $department = array();
        $city = array();
        $id_department = 0;
        foreach( $data['cells'] as $key => $value)
        {
            if($key == 1)
            {
                $department['description'] = $value;
                $record = $this->repo->create($department);
                $id_department = $record->id;
            }
            if($key == 2)
            {
                $city['description'] = $value;
                $city['id_department'] = $id_department;
                $this->cityRepo->create($city);
            }
        }
    }



}
