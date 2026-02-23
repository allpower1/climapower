<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PalabrasBuscador extends Model
{
    use SoftDeletes;

    protected $table = 'admin_palabras_buscador';

}
