<?php

namespace Store;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'access'
    ];

    public function customers() 
    {
        return $this->hasMany(Customer::class, 'email', 'email');
    }

    public function verifyUser() {
        return $this->hasOne(VerifyUser::class, 'id_user');
    }

    /**
    * Check whether this user is admin or not
    * @return boolean
    */
    public function isAdmin() 
    {
        return $this->access;
    }

    /**
    * check whether this user is actived or not
    * @return boolean
    */
    public function isVerified() {
        return $this->verified;
    }
}
