<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Helpers\FunctionX;

class CRUDController extends Controller
{
    protected $rules = array();
    protected $repo;
    protected $module = '';
    protected $root = 'admin';


    function __construct($middleware = 'auth')
    {
        //$this->middleware($middleware);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->repo->getAll();
        return view($this->root . '/' . $this->module  .'/list',compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view($this->root . '/' . $this->module . '/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
            return compact('success','message','record','data');
        }
        else
        {
            $success=false;
            $message = $validator->messages();
            return compact('success','message','record','data');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

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
