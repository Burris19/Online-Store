<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\Sale\SaleRepo;
use App\Repositories\SaleDetail\SaleDetailRepo;
use App\Repositories\Product\ProductRepo;
use App\Repositories\ClientAddress\ClientAddressRepo;
use App\Repositories\StoreAddress\StoreAddressRepo;

class SaleController extends CRUDController
{
    protected $rules =[
        'id_client' => 'required'
    ];

    protected $saleDetailRepo = null;
    protected $productRepo = null;
    protected $clientAddressRepo = null;
    protected $storeAddressRepo = null;

    public function __construct(SaleRepo $saleRepo,
                                SaleDetailRepo $saleDetailRepo,
                                ProductRepo $productRepo,
                                ClientAddressRepo $clientAddressRepo,
                                StoreAddressRepo $storeAddressRepo)
    {
        $this->repo = $saleRepo;
        $this->saleDetailRepo = $saleDetailRepo;
        $this->productRepo = $productRepo;
        $this->clientAddressRepo = $clientAddressRepo;
        $this->storeAddressRepo = $storeAddressRepo;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request['products'];
        $idClient = \Auth::user()['client'][0]['id'];
        $sale['id_client'] = $idClient;

        //get address client whit relations
        $client = $this->clientAddressRepo->findWithRelations($idClient);

        //get id city client
        $idCity = $client['city']['id'];

        //get id department client
        $idDepartment = $client['city']['department']['id'];



        //get all addresses store
        $storeAddreses = $this->storeAddressRepo->getWithRelations();

        $department = [];

        foreach($storeAddreses as $key => $value)
        {

            if($value['city']['department']['id'] == $idDepartment )
            {
                $department[$key] = $value['city']['department']['id'];
            }
        }

        if ( count($department) == 0)
        {
            return "ninguna tienda";
        }else
        {
            return "se encontraron tiendas";
        }








        $sale['shipping_price'] = 250;
        $sale['is_urgent'] = false;
        $sale['amount'] = 0;
        $sale['total'] = 0;
        $validator = \Validator::make($sale, $this->rules);
        $success = true;
        $message = "Registro guardado exitosamente";
        $record = null;
        try {

            if ($validator->passes())
            {
                $record = $this->repo->create($sale);
                $total = 0;
                foreach($data as $key => $value){
                    $product = $this->productRepo->findOrFail($value['id']);
                    $this->saleDetailRepo->create([
                        'id_sale' => $record->id,
                        'id_product' => $value['id'],
                        'quantity' => $value['quantity'],
                        'price' => $product->price
                    ]);
                    $total += ($product->price) * ($value['quantity']);
                }
                return compact('success','message','record','total');
            }
            else
            {
                $success=false;
                $message = $validator->messages();
                return compact('success','message','record');
            }
        } catch (Exception $e) {
            return $e;
        }


    }


}
