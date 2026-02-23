<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PublicacionesInternas extends Model
{
    use HasFactory;

    protected $table = 'publicaciones_internas';

    protected $fillable = [
        'id_usuario',
        'titulo',
        'descripcion',
        'fecha_finalizacion',
    ];

    protected $appends = [
        'fecha_finalizacion_formateado',
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }

    public function getFechaFinalizacionFormateadoAttribute()
    {
        if($this->fecha_finalizacion){
            $fechacreacion = Carbon::parse($this->fecha_finalizacion);
            $dateformateado = $fechacreacion->format('d/m/Y');
            return $dateformateado;
        }else{
            return '--';
        }
    }

}
