<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\Provider\ProviderRepo;

class ProviderController extends CRUDController
{
    protected $module = 'providers';

    function __construct(ProviderRepo $providerRepo)
    {
        $this->repo = $providerRepo;
    }

}
