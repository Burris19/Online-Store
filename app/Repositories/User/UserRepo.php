<?php

namespace App\Repositories\User;
use App\Repositories\Base\Baserepo;

class UserRepo extends Baserepo
{
    public function getModel()
    {
        return new User();
    }
}