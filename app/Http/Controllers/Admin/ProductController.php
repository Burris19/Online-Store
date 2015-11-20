<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Repositories\Product\ProductRepo;
use App\Repositories\Category\CategoryRepo;
use App\Repositories\Provider\ProviderRepo;
use App\Repositories\Store\StoreRepo;
use App\Repositories\StoreProducts\StoreProductRepo;
use Validator;

class ProductController extends CRUDController
{
    protected $module = 'products';
    protected $productRepo;
    protected $categoryRepo;
    protected $providerRepo;
    protected $storeRepo;
    protected $storeProductRepo = null;

    protected $rules = [
        'code' => 'required|unique:products',
        'title' => 'required',
        'price' => 'required|integer',
        'id_provider' => 'required|integer',
        'id_category' => 'required|integer'
    ];

    function __construct(ProductRepo $productRepo,
                         CategoryRepo $categoryRepo,
                         ProviderRepo $providerRepo,
                         StoreRepo $storeRepo,
                         StoreProductRepo $storeProductRepo)
    {
        $this->repo = $productRepo;
        $this->categoryRepo = $categoryRepo;
        $this->providerRepo = $providerRepo;
        $this->storeRepo = $storeRepo;
        $this->storeProductRepo = $storeProductRepo;
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

    public function store(Request $request)
    {
        $data =$request->all();
        $validator = \Validator::make($data, $this->rules);
        $success = true;
        $message = "Registro guardado exitosamente";
        $record = null;
        if ($validator->passes())
        {
            $record = $this->repo->create($data);
            $storeProduct['idStore'] = 1;
            $storeProduct['idProduct'] = $record->;
            $this->storeProductRepo->create($storeProduct);
            return compact('success','message','record','data');
        }
        else
        {
            $success=false;
            $message = $validator->messages();
            return compact('success','message','record','data');
        }
    }


}
