<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\Order\OrderRepo;
use App\Repositories\DetailOrder\DetailOrderRepo;

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
//            dd($data);
            return view($this->root . '/' . $this->module  .'/listStore',compact('data'));

        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = $this->detailOrderRepo->getByFieldWithRelations('id_order',$id);
//        dd($data);
        return view('admin.orders.showDetail', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
