<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NuestrosPartners extends Model
{
    use SoftDeletes;

    protected $table = 'nuestros_partners';

}
