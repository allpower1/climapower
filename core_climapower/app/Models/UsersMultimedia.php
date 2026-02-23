<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsersMultimedia extends Model
{
    protected $table = 'users_masajistas_multimedia';

    public function getuser()
    {
        return $this->hasOne('App\Models\User','id','id_user_masajista');
    }

}
