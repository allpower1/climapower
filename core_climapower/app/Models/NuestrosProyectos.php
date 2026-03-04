<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NuestrosProyectos extends Model
{
    use SoftDeletes;

    protected $table = 'nuestros_proyectos';

    protected $appends = [
        'fecha_creacion_formateado',
    ];

    public function getFechaCreacionFormateadoAttribute()
    {
        $fechacreacion = Carbon::parse($this->fecha);
        $dateformateado = $fechacreacion->format('d-m-Y');
        return $dateformateado;
    }

}
