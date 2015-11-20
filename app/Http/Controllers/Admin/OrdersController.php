<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\Order\OrderRepo;
use App\Repositories\DetailOrder\DetailOrderRepo;
use Mockery\Exception;

class OrdersController extends CRUDController
{
    protected $module = 'orders';
    protected $detailOrderRepo = null;
    protected $repo = null;

    public function __construct(OrderRepo $orderRepo,
                                DetailOrderRepo $detailOrderRepo)
    {
        $this->repo = $orderRepo;
        $this->detailOrderRepo = $detailOrderRepo;
    }

    public function index()
    {
        $typeUSer = \Auth::user()['employee'][0]['id_type_employee'];

        if($typeUSer == 1)
        {
            $data = $this->repo->getWithRelations();
            return view($this->root . '/' . $this->module  .'/list',compact('data'));
        }else{
            $idStore = \Auth::user()['employee'][0]['id_store'];
            $data = $this->detailOrderRepo->getAndFieldWithRelations('id_store_origin',$idStore,'status','bodega');
            return view($this->root . '/' . $this->module  .'/listStore',compact('data'));

        }

    }

    public function show($id)
    {
        $data = $this->detailOrderRepo->getByFieldWithRelations('id_order',$id);
        return view('admin.orders.showDetail', compact('data'));
    }


    public function edit($id)
    {
        try {

            $data = $this->detailOrderRepo->findOrFail($id);
            $id_store_destiny = $data->id_store_destiny;
            $data->status = 'entregado';
            $data->save();

            if ($data->id_store_destiny != $data->id_store_origin) {

                $id_store_origin = $this->detailOrderRepo->findByField('id_store_origin',$id_store_destiny);
                $id_store_origin->status = 'bodega';
                $id_store_origin->save();
            }
            $success = true;
            $message = "Registro entregado con exito";

            return response()
                ->json(compact('success', 'message'));

        } catch(\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error has occurred',
                'exception' => $e->getMessage()
            ]);
        }


    }


}
