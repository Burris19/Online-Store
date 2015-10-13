<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Admin\CRUDController;
use App\Repositories\Category\CategoryRepo;
use App\Repositories\Product\ProductRepo;

class FrontedController extends CRUDController
{
    protected $categoryRepo;
    protected $productRepo;


    function __construct(CategoryRepo $categoryRepo,
                         ProductRepo $productRepo)
    {
          $this->categoryRepo = $categoryRepo;
          $this->productRepo = $productRepo;
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
        return view('e-comer.register.register',compact('categories','products'));
    }

}
