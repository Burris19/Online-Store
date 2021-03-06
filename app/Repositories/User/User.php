<?php

namespace App\Repositories\User;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'type'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public $relations = [
        'employee',
        'client'
    ];

    // Attributes
    public function setPasswordAttribute($value)
    {
        if(! empty($value)) {
            $this->attributes['password'] = bcrypt($value);
        }
    }

    public function employee()
    {
        return $this->hasMany('App\Repositories\Employee\Employee', 'id_user', 'id')->with('typeEmployee');
    }

    public function client()
    {
        return $this->hasMany('App\Repositories\Client\Client', 'id_user', 'id');
    }


}
