<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AvisoLegal extends Model
{
    use SoftDeletes;

    protected $table = 'data_aviso_legal';

}
