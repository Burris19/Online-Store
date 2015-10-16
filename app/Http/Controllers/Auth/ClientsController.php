<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Client\ClientRepo;
use App\Repositories\User\UserRepo;
use App\Repositories\ClientAddress\ClientAddressRepo;

class ClientsController extends Controller
{
    protected $userRepo = null;
    protected $clientRepo = null;
    protected $clientAddressRepo;

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


    public function __construct(ClientRepo $clientRepo,
                                UserRepo $userRepo,
                                ClientAddressRepo $clientAddressRepo)
    {
        $this->clientRepo = $clientRepo;
        $this->userRepo = $userRepo;
        $this->clientAddressRepo = $clientAddressRepo;
    }

    public function postRegister(Request $request)
    {
        $dataClient = $request->only('name', 'last_name', 'phone', 'email');
        $dataUser = $request->only('email', 'password');
        $dataClientAddress = $request->only('id_city','address');

        $validator = \Validator::make($dataClient, $this->rulesClient);

        if ($validator->passes()) {
            try {
                \DB::beginTransaction();

                $dataUser['name'] = $dataClient['name'] . ' '. $dataClient['last_name'];
                $dataUser['type'] = 'client';
                $user = $this->userRepo->create($dataUser);

                $dataClient['id_user'] = $user->id;
                $client = $this->clientRepo->create($dataClient);

                $dataClientAddress['id_client'] = $client->id;
                $clientAddress = $this->clientAddressRepo->create($dataClientAddress);

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
