<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Http\Requests;
use App\Http\Controllers\Admin\CRUDController;
use App\Repositories\Category\CategoryRepo;
use App\Repositories\Product\ProductRepo;
use App\Repositories\Department\DepartmentRepo;
use App\Repositories\City\CityRepo;
use App\Repositories\Client\ClientRepo;
use App\Repositories\ClientAddress\ClientAddressRepo;
use Symfony\Component\Debug\ExceptionHandler;
use Illuminate\Support\Facades\Auth;




class FrontedController extends CRUDController
{
    protected $categoryRepo;
    protected $productRepo;
    protected $departmentRepo;
    protected $cityRepo;
    protected $clientRepo;
    protected $clientAddressRepo;


    function __construct(CategoryRepo $categoryRepo,
                         ProductRepo $productRepo,
                         DepartmentRepo $departmentRepo,
                         CityRepo $cityRepo,
                         ClientRepo $clientRepo,
                         ClientAddressRepo $clientAddressRepo)
    {
          $this->categoryRepo = $categoryRepo;
          $this->productRepo = $productRepo;
          $this->departmentRepo = $departmentRepo;
          $this->cityRepo = $cityRepo;
          $this->clientRepo = $clientRepo;
          $this->clientAddressRepo = $clientAddressRepo;
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

    public function getDetail($id)
    {
        $data = $this->productRepo->findOrFail($id);
        return view('e-comer.products.detail',compact('data'));

    }

    public function getShoppingCart()
    {
        return view('e-comer.cart.detail');
    }

}
