<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Admin\CRUDController;
use App\Repositories\Category\CategoryRepo;
use App\Repositories\Product\ProductRepo;
use App\Repositories\Department\DepartmentRepo;
use App\Repositories\City\CityRepo;
use App\Repositories\Client\ClientRepo;


class FrontedController extends CRUDController
{
    protected $categoryRepo;
    protected $productRepo;
    protected $departmentRepo;
    protected $cityRepo;
    protected $clientRepo;


    function __construct(CategoryRepo $categoryRepo,
                         ProductRepo $productRepo,
                         DepartmentRepo $departmentRepo,
                         CityRepo $cityRepo,
                         ClientRepo $clientRepo)
    {
          $this->categoryRepo = $categoryRepo;
          $this->productRepo = $productRepo;
          $this->departmentRepo = $departmentRepo;
          $this->cityRepo = $cityRepo;
          $this->clientRepo = $clientRepo;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $categories = $this->categoryRepo->getAll();
          $products = $this->productRepo->getAll();         
          return view('e-comer.principal.index', compact('categories','products'));
    }

    public function login()
    {
        $categories = $this->categoryRepo->getAll();
        $products = $this->productRepo->getAll();
        return view('e-comer.login.login',compact('categories','products'));
    }

    public function register()
    {
        $categories = $this->categoryRepo->getAll();
        $products = $this->productRepo->getAll();
        $departments = $this->departmentRepo->lists('description','id');
        return view('e-comer.register.register',compact('categories','products','departments'));
    }

    public function getCities($id)
    {
        $data = $this->cityRepo->getModel()->where('id_department',$id)->get();
        return $data->lists('description','id');
    }

    public function addRegister(Request $request)
    {
        $data = $request->all();

        $success = true;
        $message = "Registro guardado exitosamente";
        $record = null;
        $record = $this->clientRepo->create($data);
        return compact('success','message','record','data');

    }

}
