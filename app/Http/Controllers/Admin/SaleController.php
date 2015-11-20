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
use App\Repositories\StoreProducts\StoreProductRepo;
use App\Repositories\Order\OrderRepo;
use App\Repositories\DetailOrder\DetailOrderRepo;

class SaleController extends CRUDController
{
    protected $rules =[
        'id_client' => 'required'
    ];

    protected $saleDetailRepo = null;
    protected $productRepo = null;
    protected $clientAddressRepo = null;
    protected $storeAddressRepo = null;
    protected $storeProductsRepo = null;
    protected $orderRepo = null;
    protected $detailOrderRepo = null;

    public function __construct(SaleRepo $saleRepo,
                                SaleDetailRepo $saleDetailRepo,
                                ProductRepo $productRepo,
                                ClientAddressRepo $clientAddressRepo,
                                StoreAddressRepo $storeAddressRepo,
                                StoreProductRepo $storeProductRepo,
                                OrderRepo $orderRepo,
                                DetailOrderRepo $detailOrderRepo)
    {
        $this->repo = $saleRepo;
        $this->saleDetailRepo = $saleDetailRepo;
        $this->productRepo = $productRepo;
        $this->clientAddressRepo = $clientAddressRepo;
        $this->storeAddressRepo = $storeAddressRepo;
        $this->storeProductsRepo = $storeProductRepo;
        $this->orderRepo = $orderRepo;
        $this->detailOrderRepo = $detailOrderRepo;
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
        $idProducts = [];


        //preparo la venta
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
                //guardo la venta
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
                    $idProducts[$key] = $value['id'];
                }

                $sale = $this->repo->findOrFail($record->id);
                $sale['total'] = $total;
                $sale->save();

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



        foreach($idProducts as $key => $valueProduct)
        {
            /*
             * Busco si tengo tiendas en el departamento del cliente
             */
            foreach($storeAddreses as $key1 => $valueStore)
            {
                if($valueStore['city']['department']['id'] == $idDepartment )
                {
                    $department[$key1] = $valueStore['city']['department']['id'];
                }
            }


            if (count($department) == 0)
            {
                /*
                 * No tengo tiendas en el departamento del cliente
                 */



            }
            else
            {
                $message = "si tengo tiendas";
                /*
                 * Si tengo tiendas en el departamento del cliente
                 */

                /*
                 * Verifico si solo hay una tienda o hay mas
                 */
                if( count($department) == 1 )
                {
                    /*
                     * Solo hay una tienda
                     */

                    /*
                     * Verifico si la tienda tiene el producto
                     */

                    $existProduct = $this->storeProductsRepo->getAndField('idStore',$department[0],'idProduct', $valueProduct);

                    if (isset($existProduct))
                    {
                        /*
                         * Si existe el producto registro la orden
                         */
                        $order['id_sale'] = $sale->id;
                        $order['id_store_origin'] = $existProduct->idStore;
                        $order['id_store_destiny'] = $existProduct->idStore;
                        $order['type'] = 'En camino' ;
                        $order = $this->orderRepo->create($order);

                        $orderDetail['id_order'] = $order->id;
                        $orderDetail['id_store_origin'] = $existProduct->idStore;;
                        $orderDetail['id_store_destiny'] = $existProduct->idStore;;
                        $orderDetail['type'] = 'bodega';
                        $orderDetail['time'] = '5Horas';
                        $orderDetail['status'] = 'bodega';
                        $orderDetail = $this->detailOrderRepo->create($orderDetail);

                        $success = true;
                        $message = "La transaccion se realizo con exito";



                    }else{
                        return "Esta tienda no tiene este producto :(";
                    }

                }else{
                    /*
                     * Hay mas tiendas en departamento
                     */
                }
            }

        }

        return compact('success','message');

    }


}
