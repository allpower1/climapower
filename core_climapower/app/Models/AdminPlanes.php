<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminPlanes extends Model
{
    protected $table = 'admin_planes';

    protected $appends = [
        'texto_publico_new',
    ];

    public function getTextoPublicoNewAttribute()
    {
        $detallepublico = $this->texto_publico;
        $detallepublico = str_replace('<ul>','<ul class="classul">',$detallepublico);
        $detallepublico = str_replace('<li>','<li class="lihidden">',$detallepublico);

        return $detallepublico;
    }

}
