<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UsersOfertasDelDia extends Model
{
    //use SoftDeletes;

    protected $table = 'users_ofertas_dia';

    protected $appends = [
        'fecha_activo_hasta_formateado',
        'minutos_restantes_oferta'
    ];

    public function useroferta()
    {
        return $this->hasOne('App\Models\User','id','id_usuario');
    }

    public function userplan()
    {
        return $this->hasOne('App\Models\UsersPlanes','id','id_user_plan');
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
            $query->whereHas('useroferta.detalle_publico', function ($sub) use ($idregion){
                $sub->where('region_servicio', $idregion);
            });
        }
    }

    public function scopeSoloAgencias($query){
        //
    }

    public function scopeSoloMasajistas($query){
        $query->whereHas('userplan', function ($sub){
            $sub->whereIn('id_plan',[3,7]);
        });
    }

    public function scopeSoloEroticos($query){
        //
    }

    public function scopeSoloProfesionales($query){
        //
    }

    public function scopeSoloAmateur($query){
        //
    }

    public function scopeSoloHombres($query){
        //
    }

    public function getFechaActivoHastaFormateadoAttribute()
    {
        $fechacreacion = Carbon::parse($this->activo_hasta);
        $dateformateado = $fechacreacion->format('d-m-Y');
        return $dateformateado;
    }

    public function getMinutosRestantesOFertaAttribute()
    {
        $fechaActual = Carbon::now();
        $fechahasta = Carbon::parse($this->activo_hasta);

        $diferenciaHoras = $fechahasta->diffInHours($fechaActual);
        $diferenciaMinutos = $fechahasta->diffInMinutes($fechaActual);

        if($diferenciaHoras > 1){
            $minutossobrantes = $diferenciaHoras * 60;

            return $diferenciaHoras.' Hrs '.$diferenciaMinutos - $minutossobrantes.' min.';
        }else{
            return $diferenciaHoras.' Hrs';
        }
    }

}
