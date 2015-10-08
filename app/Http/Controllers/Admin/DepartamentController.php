<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\Departament\DepartamentRepo;


class DepartamentController extends CRUDController
{
    protected $module='departaments';


    function __construct(DepartamentRepo $departamentRepo)
    {
        $this->repo=$departamentRepo;
    }
    public function store(Request $request)
    {
        $data =$request->all();
        return $data;
    }

}
