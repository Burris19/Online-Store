<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Repositories\Product\ProductRepo;
use App\Repositories\Category\CategoryRepo;
use App\Repositories\Provider\ProviderRepo;

class ProductController extends CRUDController
{
    protected $module = 'products';
    protected $productRepo;
    protected $categoryRepo;
    protected $providerRepo;

    function __construct(ProductRepo $productRepo,
                         CategoryRepo $categoryRepo,
                         ProviderRepo $providerRepo)
    {
        $this->repo = $productRepo;
        $this->categoryRepo = $categoryRepo;
        $this->providerRepo = $providerRepo;
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $Categories = $this->categoryRepo->getAll();
        $Provider = $this->providerRepo->getAll();
        return $Provider;

        return view($this->root . '/' . $this->module . '/create', compact('Categories'));
    }



}
