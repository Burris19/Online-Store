<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\TypeEmployee\TypeEmployeeRepo;

class TypeEmployeeController extends CRUDController
{
    protected $module = 'typeEmployees';

    function __construct(TypeEmployeeRepo $typeEmployees)
    {
        $this->repo = $typeEmployees;
    }


}
