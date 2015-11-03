<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
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
                $message = "Cliente Registrado Corectamente";
                $success = true;

                \DB::commit();

                return response()
                    ->json(compact('success', 'message', 'client'), $code);

            } catch (\Exception $e) {
                \DB::rollback();

                $code = 500;
                $success = false;
                $message = 'Error al registrar';

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


    public function postLogin(Request $request)
    {
        $this->validate($request, [
            $this->loginUsername() => 'required', 'password' => 'required',
        ]);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        $throttles = $this->isUsingThrottlesLoginsTrait();

        if ($throttles && $this->hasTooManyLoginAttempts($request)) {
            return $this->sendLockoutResponse($request);
        }

        $credentials = $this->getCredentials($request);

        if (Auth::attempt($credentials, $request->has('remember'))) {
            return $this->handleUserWasAuthenticated($request, $throttles);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        if ($throttles) {
            $this->incrementLoginAttempts($request);
        }

        return ['status' => false  ];
            /*redirect($this->loginPath())
            ->withInput($request->only($this->loginUsername(), 'remember'))
            ->withErrors([
                $this->loginUsername() => $this->getFailedLoginMessage(),
            ]);*/
    }

    public function getLogout()
    {
        Auth::logout();
        return redirect('/');
    }
    public function loginPath()
    {
        return property_exists($this, 'redirectTo') ? $this->redirectTo : 'login';
    }

    public function loginUsername()
    {
        return property_exists($this, 'username') ? $this->username : 'email';
    }

    protected function isUsingThrottlesLoginsTrait()
    {
        return in_array(
            ThrottlesLogins::class, class_uses_recursive(get_class($this))
        );
    }

    protected function getCredentials(Request $request)
    {
        return $request->only($this->loginUsername(), 'password');
    }

    protected function handleUserWasAuthenticated(Request $request, $throttles)
    {
        if ($throttles) {
            $this->clearLoginAttempts($request);
        }

        if (method_exists($this, 'authenticated')) {
            return $this->authenticated($request, Auth::user());
        }

        return ['status' => true ];
    }


    public function redirectPath()
    {
        if (property_exists($this, 'redirectPath')) {
            return $this->redirectPath;
        }

        return property_exists($this, 'redirectTo') ? $this->redirectTo : '/';
    }

    protected function getFailedLoginMessage()
    {
        return Lang::has('auth.failed')
            ? Lang::get('auth.failed')
            : 'These credentials do not match our records.';
    }

}
