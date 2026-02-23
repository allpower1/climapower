<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsersAgenciaMultimedia extends Model
{
    protected $table = 'users_agencias_multimedia';

    public function getuser()
    {
        return $this->hasOne('App\Models\User','id','id_user_agencia');
    }

}
