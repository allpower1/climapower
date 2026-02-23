<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PreguntasFrecuentes extends Model
{
    use SoftDeletes;

    protected $table = 'preguntas_frecuentes';

}
