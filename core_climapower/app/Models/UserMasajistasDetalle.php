<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserMasajistasDetalle extends Model
{
    //use SoftDeletes;

    protected $table = 'users_masajistas_detalle';

    public function usermasajista()
    {
        return $this->hasOne('App\Models\User','id','id_user_masajista');
    }

    public function comunaservicio()
    {
        return $this->hasOne('App\Models\ConfComunas','id','comuna_servicio');
    }

}
