<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitasPublicidad extends Model
{
    use HasFactory;

    protected $table = 'visitas_publicidad';

    protected $fillable = [
        'id_publicidad',
        'ip_address',
        'visit_date',
    ];
}
