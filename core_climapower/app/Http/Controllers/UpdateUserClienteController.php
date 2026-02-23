<?php

namespace App\Http\Controllers;

use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Models\AdminPlanes;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UsersAgenciaListHorarios;
use App\Models\UsersCertificados;
use App\Models\UsersListHorarios;
use App\Models\UsersMultimedia;
use App\Models\UsersOfertasDelDia;
use App\Models\UsersPerfilesAgencias;
use App\Models\UsersPlanes;
use Validator;

class UpdateUserClienteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //planes
    public function UpdatePlanUSer(Request $request)
    {
        $idregistrouserplan = $request->idregistrouserplan;

        $userplan = UsersPlanes::findOrFail($idregistrouserplan);
        $userplan->activo_desde = $request->editActivoDesde;
        $userplan->activo_hasta = $request->editActivoHasta;
        $userplan->estado = $request->estadoPlan;
        $userplan->update();

        return redirect()->back()->with('successactivacion','Plan actualizado exitosamente!');
    }

    //MASAJISTAS
    //perfil publico
    public function updateMasajistaPerfilPublico(Request $request)
    {
        $iduseredit = $request->iduseredit;

        return redirect('admin/users/editar_usuario/'.$iduseredit)->with('successDatosPublicos','Cambio de datos públicos actualizados exitosamente!');
    }

    public function changeHorarioPerfilPublico(Request $request)
    {
        $iduseredit = $request->iduseredit;

        //guardar el horario del usuario
        $getregistrohorario = UsersListHorarios::where('id_usuario',$iduseredit)->first();

        if($getregistrohorario){
            $userhorario = UsersListHorarios::findOrFail($getregistrohorario->id);
        }else{
            $userhorario = new UsersListHorarios();
            $userhorario->id_usuario = $iduseredit;
        }

        $userhorario->lunescerrado = $request->get('checkboxdia1',0);
        $userhorario->lunescierrecolacion = $request->get('checkboxdiacierre1',0);
        $userhorario->lunesdesde = $request->lunesdesde;
        $userhorario->luneshasta = $request->luneshasta;
        $userhorario->martescerrado = $request->get('checkboxdia2',0);
        $userhorario->martescierrecolacion = $request->get('checkboxdiacierre2',0);
        $userhorario->martesdesde = $request->martesdesde;
        $userhorario->marteshasta = $request->marteshasta;
        $userhorario->miercolescerrado = $request->get('checkboxdia3',0);
        $userhorario->miercolescierrecolacion = $request->get('checkboxdiacierre3',0);
        $userhorario->miercolesdesde = $request->miercolesdesde;
        $userhorario->miercoleshasta = $request->miercoleshasta;
        $userhorario->juevescerrado = $request->get('checkboxdia4',0);
        $userhorario->juevescierrecolacion = $request->get('checkboxdiacierre4',0);
        $userhorario->juevesdesde = $request->juevesdesde;
        $userhorario->jueveshasta = $request->jueveshasta;
        $userhorario->viernescerrado = $request->get('checkboxdia5',0);
        $userhorario->viernescierrecolacion = $request->get('checkboxdiacierre5',0);
        $userhorario->viernesdesde = $request->viernesdesde;
        $userhorario->vierneshasta = $request->vierneshasta;
        $userhorario->sabadocerrado = $request->get('checkboxdia6',0);
        $userhorario->sabadocierrecolacion = $request->get('checkboxdiacierre6',0);
        $userhorario->sabadodesde = $request->sabadodesde;
        $userhorario->sabadohasta = $request->sabadohasta;
        $userhorario->domingocerrado = $request->get('checkboxdia7',0);
        $userhorario->domingocierrecolacion = $request->get('checkboxdiacierre7',0);
        $userhorario->domingodesde = $request->domingodesde;
        $userhorario->domingohasta = $request->domingohasta;
        $userhorario->feriadoscerrado = $request->get('checkboxdia8',0);
        $userhorario->feriadoscierrecolacion = $request->get('checkboxdiacierre8',0);
        $userhorario->feriadosdesde = $request->feriadosdesde;
        $userhorario->feriadoshasta = $request->feriadoshasta;
        $userhorario->save();

        return redirect('admin/users/editar_usuario/'.$iduseredit)->with('successDatosPublicos','Cambio de horarios actualizados exitosamente!');
    }

    public function changeCaracteristicaMasajista(Request $request)
    {
        $iduseredit = $request->iduseredit;

        return redirect('admin/users/editar_usuario/'.$iduseredit)->with('success','Caracteristicas y buscadores actualizados exitosamente!');
    }

    public function changeTipoPerfil(Request $request)
    {
        $iduseredit = $request->iduseredit;

        return redirect('admin/users/editar_usuario/'.$iduseredit)->with('success','Cambio de datos personales actualizados exitosamente!');
    }

    public function eliminarCertificadoUser($id)
    {
        $cert = UsersCertificados::findOrFail($id);

        // Eliminar archivo del disco
        Storage::disk('public')->delete($cert->ruta);

        // Eliminar registro
        $cert->delete();

        return redirect()->back()->with('successDatosPublicos','Certificado eliminado correctamente!');
    }

    public function guardarNewMultimedia(Request $request){
        $this->validate($request, [
            'adjuntomultimedia' => 'required|file|max:10240|mimes:jpg,jpeg,png',
        ]);

        if ($request->hasFile('adjuntomultimedia')) {
            return redirect()->back()->with('success','Adjunto multimedia subido exitosamente!');

        }else{
            return redirect()->back()->with('msjerror','Adjunto multimedia no reconocido!');
        }
    }

    public function guardarNewVideoMultimedia(Request $request){
        try {
            $this->validate($request, [
                'adjuntomultimedia' => 'required|file|max:30720|mimes:mov,mp4',
            ]);

            if ($request->hasFile('adjuntomultimedia')) {
                return redirect()->back()->with('success','Adjunto multimedia subido exitosamente!');

            }else{
                return redirect()->back()->with('msjerror','Adjunto multimedia no reconocido!');
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('msjerror',$th->getMessage());
        }
    }

    public function eliminarUsersMultimedia($idmultimedia)
    {
        UsersMultimedia::where('id',$idmultimedia)->delete();

        return redirect()->back()->with('success','Imagen multimedia eliminada exitosamente!');
    }

    public function updateOfertaDelDiaPlan(Request $request)
    {
        $this->validate($request, [
            'hora_expiracion_hoy' => 'required|date_format:H:i',
            'detalle_oferta' => 'required|max:255',
            'precio_normal' => 'required|numeric',
            'precio_oferta' => 'required|numeric',
            'iduserplan' => 'required|numeric',
        ]);

        //validar si ingreso precio oferta, sea menor que precio normal
        if($request->precio_oferta){
            if($request->precio_oferta >= $request->precio_normal){
                return redirect()->back()->with('msjerror','Error - no puede ingresar un precio oferta, que no sea menor a precio normal');
            }
        }

        $getuserplan = UsersPlanes::where('id',$request->iduserplan)->first();

        if($getuserplan){
            $existsplan = AdminPlanes::where('id', $getuserplan->id_plan)->exists();

            if ($existsplan) {
                //actualizar valor plan
                $existsregistrooferta = UsersOfertasDelDia::where('id_user_plan',$request->iduserplan)->first();

                if($existsregistrooferta){
                    $updateofertauser = UsersOfertasDelDia::findOrFail($existsregistrooferta->id);
                    $updateofertauser->activo_hasta = date('Y-m-d').' '.$request->hora_expiracion_hoy;
                    $updateofertauser->detalle = $request->detalle_oferta;
                    $updateofertauser->precio_normal = $request->precio_normal;
                    $updateofertauser->precio_oferta = $request->precio_oferta;
                    $updateofertauser->estado = 1;
                    $updateofertauser->update();
                }else{
                    $newofertauser = new UsersOfertasDelDia();
                    $newofertauser->id_usuario = $getuserplan->id_usuario;
                    $newofertauser->id_user_plan = $request->iduserplan;
                    $newofertauser->activo_hasta = date('Y-m-d').' '.$request->hora_expiracion_hoy;
                    $newofertauser->detalle = $request->detalle_oferta;
                    $newofertauser->precio_normal = $request->precio_normal;
                    $newofertauser->precio_oferta = $request->precio_oferta;
                    $newofertauser->estado = 1;
                    $newofertauser->save();
                }

                return redirect()->back()->with('success','Oferta del día actualizado exitosamente!');
            }
        }

        return redirect()->back()->with('msjerror','Error al actualizar oferta del día!');
    }

    public function activarDesactivarOfertasDelDia($iduserplan,$estado,$vista)
    {
        //buscar registro del plan en ofertas
        $getuseroferta = UsersOfertasDelDia::where('id_user_plan',$iduserplan)->first();

        $updateofertauser = UsersOfertasDelDia::findOrFail($getuseroferta->id);
        $updateofertauser->estado = $estado;
        if($estado == 1){
            $updateofertauser->activo_hasta = date('Y-m-d H:m:i');
        }
        $updateofertauser->update();

        return redirect()->back()->with('success','Oferta del día actualizada exitosamente!');
    }

    //publicidad
    public function changePerfilPublicidad(Request $request)
    {
        $iduseredit = $request->iduseredit;

        if($request->fono_contacto){
            $phoneNumberUtil = \libphonenumber\PhoneNumberUtil::getInstance();
            $phoneNumberObject = $phoneNumberUtil->parse($request->fono_contacto, 'CL');
            $validacionnumerocelular = $phoneNumberUtil->isPossibleNumber($phoneNumberObject);

            if($validacionnumerocelular != 1){
                return redirect()->back()->withErrors('Formato de número de celular de contacto inválido')->withInput();
            }
        }

        return redirect()->back()->with('successDatosPublicidad','Cambio de datos públicos actualizados exitosamente!');
    }

    public function eliminarImagenPerfilPublicidad($iduser,$id_registro = null)
    {
        return redirect()->back()->with('successDatosPublicidad','Cambio de datos públicos actualizados exitosamente!');
    }

    //agencia
    public function changeCaracteristicaAgencia(Request $request)
    {
        $iduseredit = $request->iduseredit;

        //preparar los hashtag
        $textocompletohashtag = '';
        if($request->agencia_buscador_hashtag){
            $listhashtag = explode(' ',$request->agencia_buscador_hashtag);

            if($listhashtag){
                foreach ($listhashtag as $hasht) {
                    if (strpos($hasht, '#') === 0) {
                        //si comienza con #
                        $textocompletohashtag = $textocompletohashtag.' '.$hasht;
                    }else{
                        $textocompletohashtag = $textocompletohashtag.' #'.$hasht;
                    }
                }
            }
        }

        $textocompletohashtag = str_replace(' # ','',$textocompletohashtag);

        $user = User::findOrFail($iduseredit);
        $user->agencia_buscador_datos_extras = $request->agencia_buscador_datos_extras;
        $user->agencia_buscador_hashtag = $textocompletohashtag;
        $user->agencia_trabaja_con_nosotros = $request->agencia_trabaja_con_nosotros;
        $user->save();

        return redirect()->back()->with('success','Buscadores actualizados exitosamente!');
    }

    public function guardarAgenciaNewVideoMultimedia(Request $request){
        try {
            $iduseredit = $request->iduseredit;

            $this->validate($request, [
                'adjuntomultimedia' => 'required|file|max:30720|mimes:mov,mp4',
            ]);

            if ($request->hasFile('adjuntomultimedia')) {
                return redirect()->back()->with('success','Adjunto multimedia subido exitosamente!');
            }else{
                return redirect()->back()->with('msjerror','Adjunto multimedia no reconocido!');
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('msjerror',$th->getMessage());
        }
    }

    public function changePerfilAgenciaPublico(Request $request)
    {
        return redirect()->back()->with('successDatosPublicos','Cambio de datos públicos actualizados exitosamente!');
    }

    public function eliminarInterconexionMasajistaAgencia($id,$vista)
    {
        UsersPerfilesAgencias::where('id',$id)->delete();

        if($vista == 'interconexiones'){
            return redirect()->back()->with('successactivacion','Interconexión eliminada exitosamente!');
        }else{
            //masajista
            return redirect()->back()->with('successactivacion','Interconexión desvinculada exitosamente!');
        }
    }

    //avatar e imagenes
    //MASAJISTA
    public function RestaurarAvatar(Request $request)
    {
        $user = User::find($request->iduseredit);
        $user->avatar = "";
        $user->save();

        return redirect('admin/users/editar_usuario/'.$request->iduseredit)->with('success','Restauración de imagen de perfil actualizado exitosamente!');
    }

    public function saveAvatar(Request $request){
        $ruta = storage_path().'/respaldos/images/users/';

        $imagenOriginal = $request->file('imagen');

        $this->validate($request, [
            'imagen' => 'required|image|mimes:png,jpg,jpeg|max:5120',
        ]);

        $temp_name = $this->random_string().'.'.$imagenOriginal->getClientOriginalExtension();

        $manager = new ImageManager(['driver' => 'gd']);
        $image = $manager->make($imagenOriginal);
        $image->fit(200, 300);
        $image->save($ruta.$temp_name);

        $user = User::find($request->iduseredit);
        $user->avatar = $temp_name;
        $user->save();

        return redirect('admin/users/editar_usuario/'.$request->iduseredit)->with('success','Cambio de imagen de perfil actualizado exitosamente!');
    }

    public function RestaurarImagenPortada(Request $request)
    {
        return redirect('admin/users/editar_usuario/'.$request->iduseredit)->with('success','Restauración de imagen de portada ejecutado exitosamente!');
    }

    public function saveImagenPortada(Request $request){
        $ruta = storage_path().'/respaldos/images/users/';

        $imagenOriginal = $request->file('imagen');

        $this->validate($request, [
            'imagen' => 'required|image|mimes:png,jpg,jpeg|max:5120',
        ]);

        return redirect('admin/users/editar_usuario/'.$request->iduseredit)->with('success','Cambio de imagen de portada actualizada exitosamente!');
    }

    //AGENCIA
    public function RestaurarAgenciaAvatar(Request $request)
    {
        return redirect('admin/users/editar_usuario/'.$request->iduseredit)->with('success','Restauración de imagen ejecutada exitosamente!');
    }

    public function saveAvatarAgencia(Request $request){
        $ruta = storage_path().'/respaldos/images/users/';

        $imagenOriginal = $request->file('imagen');

        $this->validate($request, [
            'imagen' => 'required|image|mimes:png,jpg,jpeg|max:2048',
        ]);

        return redirect('admin/users/editar_usuario/'.$request->iduseredit)->with('success','Cambio de imagen de perfil actualizado exitosamente!');
    }

    public function RestaurarImagenPortadaAgencia(Request $request)
    {
        return redirect('admin/users/editar_usuario/'.$request->iduseredit)->with('success','Restauración de imagen de portada actualizado exitosamente!');
    }

    public function saveImagenPortadaAgencia(Request $request){
        $ruta = storage_path().'/respaldos/images/users/';

        $imagenOriginal = $request->file('imagen');

        $this->validate($request, [
            'imagen' => 'required|image|mimes:png,jpg,jpeg|max:5120',
        ]);

        return redirect('admin/users/editar_usuario/'.$request->iduseredit)->with('success','Cambio de imagen de portada actualizada exitosamente!');
    }

    public function changePassword(Request $request)
    {
        $this->validatorNewPassword($request->all())->validate();

        $user = User::findOrFail($request->iduseredit);
        $user->password = bcrypt($request->get('nueva_contrasena'));
        $user->save();

        return redirect('admin/users/editar_usuario/'.$request->iduseredit)->with('success','La contraseña cambiada correctamente');
    }

    protected function validatorNewPassword(array $data)
    {
        return Validator::make($data, [
            'nueva_contrasena' => ['required','min:8','confirmed'],
        ]);
    }

    //imagenes carnet
    public function guardarFotoPersonal(Request $request){
        $ruta = storage_path().'/respaldos/images/users/';

        $imagenOriginal = $request->file('imagen');

        $this->validate($request, [
            'imagen' => 'required|image|mimes:png,jpg,jpeg|max:2048',
        ]);

        return redirect('admin/users/editar_usuario/'.$request->iduseredit)->with('success','Cambio de imagen personal actualizada exitosamente!');
    }

    public function guardarCarnetFrontal(Request $request){
        $ruta = storage_path().'/respaldos/images/users/';

        $imagenOriginal = $request->file('imagen');

        $this->validate($request, [
            'imagen' => 'required|image|mimes:png,jpg,jpeg|max:2048',
        ]);

        return redirect('admin/users/editar_usuario/'.$request->iduseredit)->with('success','Cambio de imagen foto carnet frontal actualizada exitosamente!');
    }

    public function guardarCarnetPosterior(Request $request){
        $ruta = storage_path().'/respaldos/images/users/';

        $imagenOriginal = $request->file('imagen');

        $this->validate($request, [
            'imagen' => 'required|image|mimes:png,jpg,jpeg|max:2048',
        ]);

        return redirect('admin/users/editar_usuario/'.$request->iduseredit)->with('success','Cambio de imagen foto carnet posterior actualizada exitosamente!');
    }

    protected function random_string()
    {
        $key = '';
        $keys = array_merge(range('a', 'z'), range(0, 9));

        for ($i = 0; $i < 10; $i++) {
            $key .= $keys[array_rand($keys)];
        }

        return $key;
    }

}
