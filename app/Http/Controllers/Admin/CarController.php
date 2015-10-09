<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\Car\CarRepo;

class CarController extends CRUDController
{
  protected $module='cars';

  function __construct(CarRepo $carRepo)
  {
      $this->repo=$carRepo;
  }

}
