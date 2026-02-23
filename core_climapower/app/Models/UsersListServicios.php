<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UsersListServicios extends Model
{
    //use SoftDeletes;

    protected $table = 'users_list_servicios';

    public function servicio()
    {
        return $this->hasOne('App\Models\ConfListServicios','id','id_servicio');
    }

}
