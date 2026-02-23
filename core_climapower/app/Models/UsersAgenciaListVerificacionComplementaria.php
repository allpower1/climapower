<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UsersAgenciaListVerificacionComplementaria extends Model
{
    //use SoftDeletes;

    protected $table = 'users_agencia_list_verificacion_complementaria';

    public function verifcomp()
    {
        return $this->hasOne('App\Models\ConfListVerificacionComplementaria','id','id_verificacion_complementaria');
    }

}
