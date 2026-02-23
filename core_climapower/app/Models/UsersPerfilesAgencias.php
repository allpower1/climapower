<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UsersPerfilesAgencias extends Model
{
    //use SoftDeletes;

    protected $table = 'users_perfiles_agencias';

    public function useragencia()
    {
        return $this->hasOne('App\Models\User','id','id_user_agencia');
    }

    public function usermasajista()
    {
        return $this->hasOne('App\Models\User','id','id_user_masajista');
    }

}
