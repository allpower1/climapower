<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreUsersExternoRequest;
use App\Http\Requests\Admin\StoreUsersRequest;
use App\Http\Requests\Admin\UpdateUsersRequest;
use App\Http\Requests\Admin\UpdatePasswordUsersRequest;
use App\Models\ConfComunas;
use App\Models\ConfListServicios;
use App\Models\ConfListVerificacionComplementaria;
use App\Models\ConfRegiones;
use App\Models\UserAgenciasDetalle;
use App\Models\UserMasajistasDetalle;
use App\Models\UsersAgenciaListHorarios;
use App\Models\UsersAgenciaListVerificacionComplementaria;
use App\Models\UsersAgenciaMultimedia;
use App\Models\UsersListHorarios;
use App\Models\UsersListServicios;
use App\Models\UsersListVerificacionComplementaria;
use App\Models\UsersMultimedia;
use App\Models\UsersPerfilesAgencias;
use App\Models\UsersPlanes;
use App\Models\VisitasPublicidad;
use Auth;
use Illuminate\Auth\Events\Registered;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (Auth::user()->hasRole('Usuario General')) {
            return redirect('/');
        }

        return view('admin.users.index');
    }

    public function listado_usuarios($tipousuarios)
    {
        $users = User::select('*')->get();

        $users = $users->filter(function ($user, $valor) use ($tipousuarios){
            if($tipousuarios == 'externos'){
                //si debe ser solo usuarios externos
                if($user->hasRole('Usuario General')){
                    return 1 == 1;
                }else{
                    return 1 == 2;
                }
            }else{
                //si son usuarios del sistema
                if($user->hasRole('Usuario General')){
                    return 1 == 2;
                }else{
                    return 1 == 1;
                }
            }
        });

        return datatables()->of($users)
            ->addColumn('referidopor', function ($user) {
                return '--';
            })
            ->addColumn('roles', function ($user) {
                $list_roles = '';
                foreach ($user->roles()->pluck('name') as $role){
                    $list_roles .= '<span class="">'.$role.'</span><br>';
                }

                return $list_roles;
            })
            ->addColumn('tipoperfiles', function ($user) {
                $txttipoperfil = '';

                return $txttipoperfil;
            })
            ->addColumn('action', function ($user) use ($tipousuarios) {
                $txttipousuario = "'".$tipousuarios."'";
                $editar = '<a href="'.route('admin.users.edit',[$user->id]).'" title="Editar" class="btn btn-sm btn-info">Editar</a>';
                $editar_user_cliente = '<a href="'.url('admin/users/editar_usuario').'/'.$user->id.'" title="Editar" class="btn btn-sm btn-info">Editar</a>';
                $visualizar_user_cliente = '<a href="'.url('admin/users/ver_usuario').'/'.$user->id.'" title="Visualizar" class="btn btn-sm btn-info">Ver</a>';
                $validar_email_user_cliente = '<a href="'.url('admin/users/validar_email_users_cliente').'/'.$user->id.'" title="Validar Email Registro" class="btn btn-sm btn-info">Validar Email</a>';
                $eliminar = '<a href="#" title="Eliminar" class="btn btn-sm btn-danger" onclick="confirm_eliminar_usuario('.$user->id.','.$txttipousuario.')">Eliminar</a>';

                if(Auth::user()->hasRole('Administrador Master')){
                    $isadmin = 0;
                }else{
                    if($user->hasRole('Administrador Master'))
                        $isadmin = 1;
                    else
                        $isadmin = 0;
                }

                //validar boton eliminar
                $puedoeliminarse = 0;
                if($tipousuarios == 'sistema'){
                    if(!$user->hasRole('Administrador Master')){
                        $puedoeliminarse = 1;
                    }
                }else{
                    if(Auth::user()->hasRole('Administrador Master')){
                        $puedoeliminarse = 1;
                    }
                }

                if($user->hasRole('Usuario General'))
                    $isusergeneral = 1;
                else
                    $isusergeneral = 0;

                $botones_acciones = '';

                if (Gate::allows('editar_usuarios') && $isadmin == 0 & $isusergeneral == 0) {
                    $botones_acciones = $botones_acciones.$editar;
                }

                if (Gate::allows('editar_usuarios') && $isadmin == 0 & $isusergeneral == 1) {
                    $botones_acciones = $botones_acciones.$visualizar_user_cliente;
                    $botones_acciones = $botones_acciones.$editar_user_cliente;

                    if($user->email_verified_at == null || $user->email_verified_at == ''){
                        //boton validar email manualmente
                        $botones_acciones = $botones_acciones.$validar_email_user_cliente;
                    }
                }

                if (Gate::allows('eliminar_usuarios') && $puedoeliminarse == 1) {
                    $botones_acciones = $botones_acciones.$eliminar;
                }

                return $botones_acciones;

            })
            ->addColumn('checknomina', function ($user) {
                $checknomina = '<input class="listcheckboxusuarios" type="checkbox" value="'.$user->id.'" onclick="comprobarCheckboxUsuarios()">';

                return $checknomina;
            })
            ->make(true);
    }

    public function create()
    {
        if(Auth::user()->hasRole('Administrador maestro')){
            $roles = Role::all()->pluck('name','name');
        }else{
            $roles = Role::where('id','!=',1)->get()->pluck('name','name');
        }

        return view('admin.users.create', compact('roles'));
    }

    public function store(StoreUsersRequest $request)
    {
        if (! Gate::allows('agregar_usuarios')) {
            return abort(401);
        }

        $user = new User;
        //$user->username = $request->get('usuario');
        $user->name = $request->get('name');
        $user->last_name = $request->get('last_name');
        $user->mothers_last_name = $request->get('mothers_last_name');
        $user->email = $request->get('email');
        $user->phone = $request->get('phone');
        $user->password = bcrypt($request->get('password'));
        $user->referido_code = strtoupper(Str::random(8));
        $user->status = 1;
        $user->save();

        $roles = $request->input('roles') ? $request->input('roles') : [];
        $user->assignRole($roles);

        return redirect()->route('admin.users.index')->with('msj','Usuario registrado exitosamente');
    }

    public function edit($id)
    {
        $id_user = Auth::user()->id;

        if(Auth::user()->hasRole('Administrador maestro')){
            $roles = Role::all()->pluck('name','name');
        }else{
            $roles = Role::where('id','!=',1)->get()->pluck('name','name');
        }
        $user = User::findOrFail($id);

        return view('admin.users.edit', compact('user','roles'));
    }

    public function show($id)
    {
        echo $id;
    }

    public function update(UpdateUsersRequest $request, $id)
    {
        if (! Gate::allows('editar_usuarios')) {
            return abort(401);
        }

        $user = User::findOrFail($id);
        //$user->username = $request->get('usuario');
        $user->name = $request->get('name');
        $user->last_name = $request->get('last_name');
        $user->mothers_last_name = $request->get('mothers_last_name');
        $user->email = $request->get('email');
        $user->phone = $request->get('phone');
        $user->update();

        if($request->input('roles')){
            $roles = $request->input('roles') ? $request->input('roles') : [];
            $user->syncRoles($roles);
        }

        return redirect()->route('admin.users.index')->with('msj','Usuario actualizado exitosamente');
    }

    public function visualizarUserCliente($id)
    {
        $user = User::findOrFail($id);
        $listadoregiones = ConfRegiones::all();
        $listadocomunas = ConfComunas::orderBy('nombre','asc')->get();
        $userdetallemasaj = UserMasajistasDetalle::where('id_user_masajista',$id)->first();
        $userdetalleagencia = UserAgenciasDetalle::where('id_user_agencia',$id)->first();
        $listserviciosuser = UsersListServicios::where('id_usuario',$id)->get()->pluck('id_servicio')->toArray();
        $listverificompuser = UsersListVerificacionComplementaria::where('id_usuario',$id)->get()->pluck('id_verificacion_complementaria')->toArray();
        $listverificompagenciauser = UsersAgenciaListVerificacionComplementaria::where('id_usuario',$id)->get()->pluck('id_verificacion_complementaria')->toArray();
        $userhorario = UsersListHorarios::where('id_usuario',$id)->first();
        $useragenciahorario = UsersAgenciaListHorarios::where('id_usuario',$id)->first();
        $listadomultimediaser = UsersMultimedia::where('id_user_masajista',$id)->get();
        $listadomultimediauseragencia = UsersAgenciaMultimedia::where('id_user_agencia',$id)->get();

        $dataperfilpublicacion = null;
        $listusersagencia = UsersPerfilesAgencias::where('id_user_agencia',$id)->get();
        $listadomasajes = ConfListServicios::all();
        $listadocomplementos = ConfListVerificacionComplementaria::all();

        $getplanactivopublicidad = null;
        $getplanactivointerconexionesagencia = null;
        $getseccionofertamasajista = [];
        $getseccionofertaagencia = [];
        $cumpleseccionmasajista = 'NO';
        $cumpleseccionagencia = 'NO';
        $cumpleseccionpublicidad = 'NO';
        //validar si cumple perfil publico masajista con plan
        $cumpleperfiluno = 0;

        $getuseragencia = UsersPerfilesAgencias::where('id_user_masajista',$id)->get();

        //verificar si tiene invitacion pendiente agencia
        $getexistsinvitacionagencia = UsersPerfilesAgencias::where('email_invitacion',$user->email)->where('estado',0)->first();

        //listado de planes para gestiones
        $listadoplanes = UsersPlanes::where('id_usuario',$id)->get();

        $gestionsitio = 'VER';

        //contadores visitas
        if($dataperfilpublicacion){
            $today = Carbon::today()->toDateString();
            $visitaspublicidadUnicas = VisitasPublicidad::where('id_publicidad', $dataperfilpublicacion->id)->distinct('ip_address')->count('ip_address');
            $visitaspublicidadHoyUnicas = VisitasPublicidad::where('id_publicidad', $dataperfilpublicacion->id)->where('visit_date', $today)->distinct('ip_address')->count('ip_address');
        }else{
            $visitaspublicidadUnicas = 0;
            $visitaspublicidadHoyUnicas = 0;
        }

        $cumpleseccionmasajista = 'NO';
        $cumpleseccionagencia = 'NO';
        $cumpleseccionpublicidad = 'NO';

        return view('admin.users.edit_user_cliente', compact('gestionsitio','user','listadoregiones','listadocomunas','userdetallemasaj','userdetalleagencia','listserviciosuser','listverificompuser','listverificompagenciauser','userhorario','useragenciahorario','listadomultimediaser','listadomultimediauseragencia','dataperfilpublicacion','cumpleseccionmasajista','cumpleseccionagencia','cumpleseccionpublicidad','getseccionofertamasajista','getplanactivointerconexionesagencia','listusersagencia','getseccionofertaagencia','getplanactivopublicidad','getuseragencia','getexistsinvitacionagencia','listadoplanes','listadomasajes','listadocomplementos','visitaspublicidadUnicas','visitaspublicidadHoyUnicas'));
    }

    public function editUserCliente($id)
    {
        $user = User::findOrFail($id);
        $listadoregiones = ConfRegiones::all();
        $listadocomunas = ConfComunas::orderBy('nombre','asc')->get();
        $userdetallemasaj = UserMasajistasDetalle::where('id_user_masajista',$id)->first();
        $userdetalleagencia = UserAgenciasDetalle::where('id_user_agencia',$id)->first();
        $listserviciosuser = UsersListServicios::where('id_usuario',$id)->get()->pluck('id_servicio')->toArray();
        $listverificompuser = UsersListVerificacionComplementaria::where('id_usuario',$id)->get()->pluck('id_verificacion_complementaria')->toArray();
        $listverificompagenciauser = UsersAgenciaListVerificacionComplementaria::where('id_usuario',$id)->get()->pluck('id_verificacion_complementaria')->toArray();
        $userhorario = UsersListHorarios::where('id_usuario',$id)->first();
        $useragenciahorario = UsersAgenciaListHorarios::where('id_usuario',$id)->first();
        $listadomultimediaser = UsersMultimedia::where('id_user_masajista',$id)->get();
        $listadomultimediauseragencia = UsersAgenciaMultimedia::where('id_user_agencia',$id)->get();

        $dataperfilpublicacion = null;
        $listusersagencia = UsersPerfilesAgencias::where('id_user_agencia',$id)->get();
        $listadomasajes = ConfListServicios::all();
        $listadocomplementos = ConfListVerificacionComplementaria::all();

        $getplanactivopublicidad = null;
        $getplanactivointerconexionesagencia = null;
        $getseccionofertamasajista = [];
        $getseccionofertaagencia = [];
        $cumpleseccionmasajista = 'NO';
        $cumpleseccionagencia = 'NO';
        $cumpleseccionpublicidad = 'NO';
        //validar si cumple perfil publico masajista con plan
        $cumpleperfiluno = 0;

        $getuseragencia = UsersPerfilesAgencias::where('id_user_masajista',$id)->get();

        //verificar si tiene invitacion pendiente agencia
        $getexistsinvitacionagencia = UsersPerfilesAgencias::where('email_invitacion',$user->email)->where('estado',0)->first();

        //listado de planes para gestiones
        $listadoplanes = UsersPlanes::where('id_usuario',$id)->get();

        $gestionsitio = 'EDITAR';

        //contadores visitas
        if($dataperfilpublicacion){
            $today = Carbon::today()->toDateString();
            $visitaspublicidadUnicas = VisitasPublicidad::where('id_publicidad', $dataperfilpublicacion->id)->distinct('ip_address')->count('ip_address');
            $visitaspublicidadHoyUnicas = VisitasPublicidad::where('id_publicidad', $dataperfilpublicacion->id)->where('visit_date', $today)->distinct('ip_address')->count('ip_address');
        }else{
            $visitaspublicidadUnicas = 0;
            $visitaspublicidadHoyUnicas = 0;
        }

        $cumpleseccionmasajista = 'NO';
        $cumpleseccionagencia = 'NO';
        $cumpleseccionpublicidad = 'NO';

        return view('admin.users.edit_user_cliente', compact('gestionsitio','user','listadoregiones','listadocomunas','userdetallemasaj','userdetalleagencia','listserviciosuser','listverificompuser','listverificompagenciauser','userhorario','useragenciahorario','listadomultimediaser','listadomultimediauseragencia','dataperfilpublicacion','cumpleseccionmasajista','cumpleseccionagencia','cumpleseccionpublicidad','getseccionofertamasajista','getplanactivointerconexionesagencia','listusersagencia','getseccionofertaagencia','getplanactivopublicidad','getuseragencia','getexistsinvitacionagencia','listadoplanes','listadomasajes','listadocomplementos','visitaspublicidadUnicas','visitaspublicidadHoyUnicas'));
    }

    public function validarEmailUsersCliente($id)
    {
        $user = User::findOrFail($id);
        $user->email_verified_at = now();
        $user->update();

        return redirect('admin/usuarios_externos')->with('msj','Email usuario externo / cliente validado exitosamente');
    }

    public function updateUserCliente(Request $request)
    {
        if (! Gate::allows('editar_usuarios')) {
            return abort(401);
        }

        $iduser = $request->id_usu;

        $user = User::findOrFail($iduser);
        $user->name = $request->get('name');
        $user->last_name = $request->get('last_name');
        $user->mothers_last_name = $request->get('mothers_last_name');
        $user->email = $request->get('email');
        $user->phone = $request->get('phone');
        $user->update();

        return redirect('admin/usuarios_externos')->with('msj','Usuario externo / cliente actualizado exitosamente');
    }

    public function restablecerPassword(UpdatePasswordUsersRequest $request)
    {
        if (! Gate::allows('editar_usuarios')) {
            return abort(401);
        }

        $id_user = $request->get('id_usu');
        $user = User::findOrFail($id_user);
        $user->password = $request->get('nueva_contrasena');
        $user->save();

        return redirect()->route('admin.users.index')->with('msj','Usuario actualizado exitosamente');
    }

    public function restablecerEstado(Request $request)
    {
        if (! Gate::allows('editar_usuarios')) {
            return abort(401);
        }

        $id_user = $request->get('id_usu');
        $user = User::findOrFail($id_user);
        $user->status = $request->get('estado_usu');
        $user->save();

        return redirect()->route('admin.users.index')->with('msj','Usuario actualizado exitosamente');
    }

    public function GestionarAprobacionRegistro(Request $request)
    {
        if (! Gate::allows('editar_usuarios')) {
            return abort(401);
        }

        return redirect('admin/usuarios_externos')->with('msj','Estado aprobación del registro actualizado exitosamente');
    }

    public function destroy($id)
    {
        if (! Gate::allows('eliminar_usuarios')) {
            return abort(401);
        }

        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.users.index')->with('msj','Usuario eliminado exitosamente');
    }

    public function massDestroy(Request $request)
    {
        if ($request->input('ids')) {
            $entries = User::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

    //usuarios externos
    public function usuarios_externos()
    {
        return view('admin.users.index_externos');
    }

    public function createUserExterno()
    {
        return view('admin.users.create_externos');
    }

    public function storeUserExternos(StoreUsersExternoRequest $request)
    {
        if (! Gate::allows('agregar_usuarios')) {
            return abort(401);
        }

        $user = new User;
        $user->name = $request->get('name');
        $user->last_name = $request->get('last_name');
        $user->mothers_last_name = $request->get('mothers_last_name');
        $user->email = $request->get('email');
        $user->phone = $request->get('phone');
        $user->password = bcrypt($request->get('password'));
        $user->referido_code = strtoupper(Str::random(8));
        $user->status = 1;
        $user->save();

        $roles = ['Usuario General'];
        $user->assignRole($roles);

        if($request->enviar_correo_bienvenida){
            //enviar email registro
            event(new Registered($user));
        }

        return redirect('admin/usuarios_externos')->with('msj','Usuario externo/cliente registrado exitosamente, no fue enviado correo de bienvenida');
    }

}
