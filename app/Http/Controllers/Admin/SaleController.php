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
use App\Repositories\Store\StoreRepo;
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
    protected $storeRepo = null;

    public function __construct(SaleRepo $saleRepo,
                                SaleDetailRepo $saleDetailRepo,
                                ProductRepo $productRepo,
                                ClientAddressRepo $clientAddressRepo,
                                StoreAddressRepo $storeAddressRepo,
                                StoreProductRepo $storeProductRepo,
                                OrderRepo $orderRepo,
                                DetailOrderRepo $detailOrderRepo, StoreRepo $storeRepo)
    {
        $this->repo = $saleRepo;
        $this->saleDetailRepo = $saleDetailRepo;
        $this->productRepo = $productRepo;
        $this->clientAddressRepo = $clientAddressRepo;
        $this->storeAddressRepo = $storeAddressRepo;
        $this->storeProductsRepo = $storeProductRepo;
        $this->orderRepo = $orderRepo;
        $this->detailOrderRepo = $detailOrderRepo;
        $this->storeRepo = $storeRepo;
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

        $getStores = $this->storeRepo->getWithRelations();

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
                $bandera = true;

                $stores = $this->storeProductsRepo->getByFieldWithRelations('idProduct',$valueProduct);



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
                        $bandera = false;



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
        return compact('stores','success' ,'message','bandera','client','getStores','record');

    }

    public function saveOrder(Request $request)
    {
        $data = $request->all();
        $order['id_sale'] = $data['idSale'];
        $order['id_store_origin'] = $data['idStoreOrigin'][0];

        $distanciaOrigen = 0;
        $idStoreFinall = 0;

        $menorTemporal = 0;

        foreach($data['stores'] as $key => $value) {
            if($value['idStore'] == $order['id_store_origin'])
            {
                $distanciaOrigen = $value['distancia'];
                $idStoreFinall = $value['idStore'];
            }
        }

        foreach($data['stores'] as $key => $value) {

            if($value['idStore'] != $order['id_store_origin'])
            {
                if($menorTemporal == 0 )
                {
                    $menorTemporal = $value['distancia'];
                    $idStoreFinall = $value['idStore'];
                }else
                {
                    if($value['distancia'] < $menorTemporal )
                    {
                        $menorTemporal = $value['distancia'];
                        $idStoreFinall = $value['idStore'];
                    }
                }

            }
        }


        $order['id_store_destiny'] = $idStoreFinall;
        $order['type'] = 'En camino';
        $order = $this->orderRepo->create($order);

        $orderDetail['id_order'] = $order->id;
        $orderDetail['id_store_origin'] = $order['id_store_origin'];


        //para ver si hay tienas de por medio
        $tiendasMedio = 0;

        //para guardar los id de las tiendas que esten de por medio
        $idTiendasMedios = [];


        foreach($data['stores'] as $key => $value) {

            if($value['distancia'] < $distanciaOrigen and $value['distancia'] > $idStoreFinall )
            {
                $tiendasMedio++;
                $idTiendasMedios[$key] = $value['distancia'];
            }
        }
        //ordenar de mayor a menor
        array_multisort($idTiendasMedios,SORT_DESC);

        //guarda el id de la tienda de inicio sigueinte
        $idInicioSiguiente =0;

        //si existen tiendas de por medio
        if($tiendasMedio == 0 )
        {
            $orderDetail['id_store_destiny'] = $idStoreFinall ;
            $orderDetail['type'] = 'entrega' ;
            $orderDetail['time'] = '1 dia' ;
            $orderDetail['status'] = 'bodega' ;
            $this->detailOrderRepo->create($orderDetail);

        }else
        {
            //cuando hay varios destinos

            for($i = 0; $i < $tiendasMedio; $i++)
            {
                //cuando es el ultimo
                if( ($tiendasMedio - 1) == $i )
                {
                    foreach($data['stores'] as $key => $value) {
                        if($value['distancia'] == $idTiendasMedios[$i] )
                        {
                            $orderDetail['id_store_destiny'] = $value['idStore'] ;
                            $orderDetail['type'] = 'entrega' ;
                            $orderDetail['time'] = '1 dia' ;
                            $orderDetail['status'] = 'bodega' ;
                            $this->detailOrderRepo->create($orderDetail);
                        }
                    }

                    $success = true;
                    $message = "La Compra se realizo con exito";
                    return compact('success' ,'message');
                }
                else{
                    foreach($data['stores'] as $key => $value) {

                        if($value['distancia'] == $idTiendasMedios[$i] )
                        {
                            $idInicioSiguiente = $value['idStore'];
                            $orderDetail['id_store_destiny'] = $value['idStore'] ;
                            $orderDetail['type'] = 'bodega' ;
                            $orderDetail['time'] = '1 dia' ;
                            $orderDetail['status'] = 'bodega' ;
                            $this->detailOrderRepo->create($orderDetail);
                            $orderDetail['id_store_origin'] = $idInicioSiguiente;
                        }
                    }

                }


            }

        }




    }
}
