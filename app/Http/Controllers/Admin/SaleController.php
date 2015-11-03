<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\Sale\SaleRepo;
use App\Repositories\SaleDetail\SaleDetailRepo;
use App\Repositories\Product\ProductRepo;
class SaleController extends CRUDController
{
    protected $rules =[
        'id_client' => 'required'
    ];

    protected $saleDetailRepo = null;
    protected $productRepo = null;

    public function __construct(SaleRepo $saleRepo,
                                SaleDetailRepo $saleDetailRepo,
                                ProductRepo $productRepo)
    {
        $this->repo = $saleRepo;
        $this->saleDetailRepo = $saleDetailRepo;
        $this->productRepo = $productRepo;
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
        $sale['id_client'] = \Auth::user()['client'][0]['id'];
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
