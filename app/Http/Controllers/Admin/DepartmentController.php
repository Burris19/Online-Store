<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\Department\DepartmentRepo;


class DepartmentController extends CRUDController
{
    protected $module = 'departments';

    function __construct(DepartmentRepo $departmentRepo)
    {
        $this->repo = $departmentRepo;
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $info =  $data['cells'];
        $depart = array();
        $cities = array();


        foreach ($info as $index => $value) {
            if ($index == 1)
            {
                $depart['description'] = $value;
                $this->repo->create($depart);
            }

            $cities['description'] = $value;


        }

        return compact('depart','cities');


    }



}
