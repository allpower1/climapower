<?php

namespace App\Models;

use Auth;
use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Cache;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Role;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    protected $fillable = [
        'name',
        'last_name',
        'mothers_last_name',
        'email',
        'email_verified_at',
        'password',
        'username',
        'phone',
        'avatar',
        'status',
        'ultima_actividad',
        'referido_code',
        'referido_por',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = [
        'ultima_actividad_formateado',
        'txt_nacionalidad',
        'fecha_registro_formateado',
        'fecha_ultima_actualizacion_formateado',
        'is_user_nueva',
        'user_en_linea'
    ];

    public function rolesRelation()
    {
        return $this->belongsToMany(Role::class, 'role_user');
    }

    public function role()
    {
        return $this->belongsToMany(Role::class, 'role_user');
    }

    public function comuna()
    {
        return;
    }

    public function conversations()
    {
        return $this->belongsToMany(Conversation::class, 'chats_conversation_user');
    }

    public function detalle_publico()
    {
        return $this->hasOne('App\Models\UserMasajistasDetalle','id_user_masajista','id');
    }

    public function detalle_agencia_publico()
    {
        return $this->hasOne('App\Models\UserAgenciasDetalle','id_user_agencia','id');
    }

    public function certificados()
    {
        return $this->hasMany(UsersCertificados::class);
    }

    public function getUltimaActividadFormateadoAttribute()
    {
        $fechaultimaactividad = ' -- ';

        if($this->ultima_actividad){
            $fechacreacion = Carbon::parse($this->ultima_actividad);
            $fechaultimaactividad = $fechacreacion->format('d-m-Y').' / '.$fechacreacion->format('H:i:s');
        }

        return $fechaultimaactividad;
    }

    public function getTxtNacionalidadAttribute()
    {
        $txtnacionalidad = '';
        if($this->caract_nacionalidad){
            if($this->caract_nacionalidad == 1){
                $txtnacionalidad = 'Chilena';
            }
            if($this->caract_nacionalidad == 2){
                $txtnacionalidad = 'Extranjera';
                if($this->caract_nacionalidad_detalle != '' && $this->caract_nacionalidad_detalle != null){
                    $txtnacionalidad = 'Extranjera - '.$this->caract_nacionalidad_detalle;
                }
            }
        }

        return $txtnacionalidad;
    }

    public function getFechaRegistroFormateadoAttribute()
    {
        $fechacreacion = Carbon::parse($this->created_at);
        $fecharegistro = $fechacreacion->format('d-m-Y').' / '.$fechacreacion->format('H:i:s');

        return $fecharegistro;
    }

    public function getFechaUltimaActualizacionFormateadoAttribute()
    {
        //obtener todas las fechas de actualizacion
        $fechas = [
            User::where('id',$this->id)->max('updated_at'),
        ];

        $ultimaActualizacion = collect($fechas)->filter()->max();

        $fechaactualizacion = Carbon::parse($ultimaActualizacion);
        $fechaultimaact = $fechaactualizacion->format('d-m-Y').' / '.$fechaactualizacion->format('H:i:s');

        return $fechaultimaact;
    }

    public function getIsUserNuevaAttribute()
    {
        $esusuarionueva = 'NO';

        $registrationDate = $this->created_at;

        if($registrationDate){
            $now = now();
            $daysSinceRegistration = $registrationDate->diffInDays($now);

            if($daysSinceRegistration <= 30){
                $esusuarionueva = 'SI';
            }
        }

        return $esusuarionueva;
    }

    public function getUserEnLineaAttribute()
    {
        $userenlinea = User::where('id',$this->id)->where('ultima_actividad','>', now()->subMinutes(5)->getTimestamp())->exists();

        if(!$userenlinea){
            $userenlinea = Cache::has('user-is-online-' . $this->id);
        }

        return $userenlinea;
    }

    public function getIsAdminAttribute()
    {
        if (Auth::user()->hasRole('Administrador Master')) {
            return true;
        }else{
            return false;
        }
    }

    public function scopeValidacionMinima($query){
        $query->where('username','!=',null)->where('username','!=','')->where('status','!=','0')->where('email_verified_at','!=',null);
    }

    public function scopeValidacionAgenciaMinima($query){
        //
    }

}
