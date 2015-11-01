<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\Employee\EmployeeRepo;
use App\Repositories\Store\StoreRepo;
use App\Repositories\TypeEmployee\TypeEmployeeRepo;
use App\Repositories\User\UserRepo;

class EmployeeController extends CRUDController
{
    protected $module ='employees';
    protected $typeEmployeeRepo;
    protected $storeRepo;
    protected $userRepo;

    function __construct(EmployeeRepo $employeeRepo,
                         TypeEmployeeRepo $typeEmployeeRepo,
                         StoreRepo $storeRepo,
                         UserRepo $userRepo)
    {
        $this->repo=$employeeRepo;
        $this->typeEmployeeRepo = $typeEmployeeRepo;
        $this->storeRepo = $storeRepo;
        $this->userRepo = $userRepo;
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


    public function store(Request $request)
    {
        $data =$request->all();
        $success = true;
        $message = "Registro guardado exitosamente";
        $record = null;
        $user['name'] = $data['name'] . ' '. $data['last_name'];
        $user['email'] = $data['email'];
        $user['password'] = $data['password'];
        $user['type'] = 'administrator';

        $user = $this->userRepo->create($user);
        $data['idUser'] = $user->id;
        $record = $this->repo->create($data);
        return compact('success','message','record','data');

    }



}
