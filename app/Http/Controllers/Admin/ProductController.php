<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Repositories\Product\ProductRepo;

class ProductController extends CRUDController
{
    protected $module = 'products';
    protected $productRepo;


    function __construct(ProductRepo $productRepo)
    {
        $this->repo = $productRepo;
    }


}
