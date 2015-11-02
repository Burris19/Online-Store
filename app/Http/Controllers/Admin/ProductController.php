<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Repositories\Product\ProductRepo;
use App\Repositories\Category\CategoryRepo;
use App\Repositories\Provider\ProviderRepo;
use App\Repositories\Store\StoreRepo;
use Validator;

class ProductController extends CRUDController
{
    protected $module = 'products';
    protected $productRepo;
    protected $categoryRepo;
    protected $providerRepo;
    protected $storeRepo;

    protected $rules = [
        'code' => 'required|unique:products',
        'title' => 'required',
        'price' => 'required|integer',
        'id_provider' => 'required|integer',
        'id_category' => 'required|integer'
    ];

    function __construct(ProductRepo $productRepo,
                         CategoryRepo $categoryRepo,
                         ProviderRepo $providerRepo, StoreRepo $storeRepo)
    {
        $this->repo = $productRepo;
        $this->categoryRepo = $categoryRepo;
        $this->providerRepo = $providerRepo;
        $this->storeRepo = $storeRepo;
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function  index()
    {
        $idStore = \Auth::user()['employee'][0]['id_store'];
        $data = $this->storeRepo->findWithRelations($idStore);
        return view($this->root . '/' . $this->module  .'/list',compact('data'));
    }

    public function create()
    {
        $Categories = $this->categoryRepo->lists('title','id');
        $Provider = $this->providerRepo->lists('name','id');
        return view($this->root . '/' . $this->module . '/create', compact('Categories','Provider'));
    }




}
