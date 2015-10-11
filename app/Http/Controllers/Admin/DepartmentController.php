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

        // Create department
        $name_department = $data['departamento'];

        $department = $this->repo->findByField('description', $name_department);

        if(!$department) {
            $department = $this->repo->create([
                'description' => $name_department
            ]);
        }

        // Create cities
        $cities = [];
        foreach($data['municipios'] as $key => $value) {
            $cities[] = $this->cityRepo->create([
                'description' => $value,
                'id_department' => $department->id
            ]);
        }



        return compact('department', 'cities');
    }



}
