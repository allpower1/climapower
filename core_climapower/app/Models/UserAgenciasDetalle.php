<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserAgenciasDetalle extends Model
{
    //use SoftDeletes;

    protected $table = 'users_agencias_detalle';

    public function useragencia()
    {
        return $this->hasOne('App\Models\User','id','id_user_agencia');
    }

    public function comunaservicio()
    {
        return $this->hasOne('App\Models\ConfComunas','id','comuna_servicio');
    }

}
