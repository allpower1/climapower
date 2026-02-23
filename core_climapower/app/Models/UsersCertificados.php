<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UsersCertificados extends Model
{
    use HasFactory;

    protected $table = 'users_certificados';

    protected $fillable = [
        'user_id',
        'ruta',
        'es_publico',
    ];

    public function getuser()
    {
        return $this->hasOne('App\Models\User','id','user_id');
    }

}
