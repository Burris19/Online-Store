<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Client\ClientRepo;

class ClientsController extends Controller
{
    protected $userRepo = null;
    protected $clientRepo = null;

    protected $rulesClient = [
        'name' => 'required',
        'last_name' => 'required',
        'phone' => 'required',
        'email' => 'required|unique:clients,email'
    ];

    protected $rulesUser = [
        'email' => 'required|unique:users,email',
        'password' => 'required'
    ];


    public function __construct(ClientRepo $clientRepo)
    {
        $this->clientRepo = $clientRepo;
    }

    public function postRegister(Request $request)
    {
        $dataClient = $request->only('name', 'last_name', 'phone', 'email');
        $dataUser = $request->only('email', 'password');

        $validator = \Validator::make($dataClient, $this->rulesClient);

        if ($validator->passes()) {
            try {
                \DB::beginTransaction();

                // Save data of client and generate user
                $user = $this->userRepo->create($dataUser);

                //$client = $this->clientRepo->create($dataClient);
/*
                $dataUser['name'] = $client->full_name;
                $dataUser['type'] = 'client';


                $client->id_user = $user->id;
                $client->save();
*/
                $code = 201;
                $message = "Client registered successfully";

                \DB::commit();

                return response()
                    ->json(compact('success', 'message', 'client'), $code);

            } catch (\Exception $e) {
                \DB::rollback();

                $code = 500;
                $message = 'An error has ocurred when try register the client';

                return response()
                    ->json(compact('success', 'message'), $code);
            }
        } else {
            $success = false;
            $message = $validator->messages();
            $code = 400;

            return response()
                ->json(compact('success', 'message'), $code);
        }

    }

}
