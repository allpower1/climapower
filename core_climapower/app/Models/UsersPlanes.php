<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class UsersPlanes extends Model
{
    protected $table = 'users_planes';

    protected $appends = [
        'fecha_activo_hasta_formateado',
    ];

    protected $fillable = [
        'id_usuario',
        'id_plan',
        'activo_desde',
        'activo_hasta',
        'estado',
    ];

    public function getuser()
    {
        return $this->hasOne('App\Models\User','id','id_usuario');
    }

    public function getplan()
    {
        return $this->hasOne('App\Models\AdminPlanes','id','id_plan');
    }

    public function detalle_publico()
    {
        return $this->hasOne('App\Models\UserMasajistasDetalle','id_user_masajista','id_usuario');
    }

    public function detalle_agencia_publico()
    {
        return $this->hasOne('App\Models\UserAgenciasDetalle','id_user_agencia','id_usuario');
    }

    public function detalle_oferta()
    {
        return $this->hasOne('App\Models\UsersOfertasDelDia','id_user_plan','id');
    }

    public function scopeValidacionMinima($query){
        $query->whereHas('getuser', function ($sub){
            $sub->where('username','!=',null)->where('username','!=','')->where('email_verified_at','!=',null);
        });
    }

    public function scopeValidacionAgenciaMinima($query){
        //
    }

    public function scopeSoloUsuariosAmateur($query){
        //
    }

    public function scopeSoloUsuariosProfesionales($query){
        //
    }

    public function scopeSoloUsuariosEroticos($query){
        //
    }

    public function scopeSoloUsuariosHombres($query){
        //
    }

    public function scopeUsuariosNohombres($query){
        //
    }

    public function scopeFiltroRegion($query,$nombreregion){
        if($nombreregion == 'Santiago'){
            $idregion = 13;
        }elseif($nombreregion == 'Arica'){
            $idregion = 1;
        }elseif($nombreregion == 'Iquique'){
            $idregion = 1;
        }elseif($nombreregion == 'Antofagasta'){
            $idregion = 2;
        }elseif($nombreregion == 'Copiapo'){
            $idregion = 3;
        }elseif($nombreregion == 'Coquimbo'){
            $idregion = 4;
        }elseif($nombreregion == 'Valparaiso'){
            $idregion = 5;
        }elseif($nombreregion == 'Rancagua'){
            $idregion = 6;
        }elseif($nombreregion == 'Talca'){
            $idregion = 7;
        }elseif($nombreregion == 'Chillán'){
            $idregion = 16;
        }elseif($nombreregion == 'Concepción'){
            $idregion = 8;
        }elseif($nombreregion == 'Temuco'){
            $idregion = 9;
        }elseif($nombreregion == 'Valdivia'){
            $idregion = 14;
        }elseif($nombreregion == 'Puerto Montt'){
            $idregion = 10;
        }elseif($nombreregion == 'Coyhaique'){
            $idregion = 11;
        }elseif($nombreregion == 'Punta Arenas'){
            $idregion = 12;
        }else{
            $idregion = null;
        }

        if($idregion){
            $query->whereHas('getuser.detalle_publico', function ($sub) use ($idregion){
                $sub->where('region_servicio', $idregion);
            });
        }
    }

    public function getFechaActivoHastaFormateadoAttribute()
    {
        $fechacreacion = Carbon::parse($this->activo_hasta);
        $dateformateado = $fechacreacion->format('d-m-Y H:i:s');
        return $dateformateado;
    }

}
