<?php

namespace App\Http\Controllers\Auth;

use Malahierba\ChileRut\ChileRut;
use Intervention\Image\Drivers\Gd\Driver;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManager;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserAgenciasDetalle;
use App\Models\UserMasajistasDetalle;
use App\Models\UsersAgenciaListHorarios;
use App\Models\UsersAgenciaListVerificacionComplementaria;
use App\Models\UsersListHorarios;
use App\Models\UsersListServicios;
use App\Models\UsersListVerificacionComplementaria;
use Validator;
use Hash;

class ChangePasswordController extends Controller
{
    /**
     * Crear una nueva instancia de controlador.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Dónde redirigir a los usuarios después de cambiar la contraseña.
     *
     * @var string $redirectTo
     */
    protected $redirectTo = '/miperfil';

    /**
     * Cambiar formulario de contraseña
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showChangePasswordForm()
    {
        $user = Auth::getUser();

        return view('auth.change_password', compact('user'));
    }

    /**
     * Cambia la contraseña del usuario logueado.
     *
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function changePassword(Request $request)
    {
        $user = Auth::getUser();
        $this->validator($request->all())->validate();
        if (Hash::check($request->get('contrasena_actual'), $user->password)) {
            $user->password = bcrypt($request->get('nueva_contrasena'));
            $user->save();
            Auth::logout();
            return redirect("/login");
        } else {
            return redirect()->back()->withErrors('La contraseña actual es incorrecta');
        }
    }

    /**
     * Cambia los datos personales del perfil.
     *
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function changePerfil(Request $request)
    {
        $this->validator_perfil($request->all())->validate();

        $user = Auth::getUser();
        if($request->get('name')){
            $user->name = $request->get('name');
        }
        $user->last_name = $request->get('last_name');
        if($request->get('mothers_last_name')){
            $user->mothers_last_name = $request->get('mothers_last_name');
        }
        if($request->get('email')){
            $user->email = $request->get('email');
        }
        $user->phone = $request->get('telefono');
        $user->save();

        return redirect($this->redirectTo)->with('success','Cambio de datos generales exitosamente!');
    }

    /**
     * Obtenga un validador para una solicitud de cambio de contraseña entrante.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'contrasena_actual' => 'required',
            'nueva_contrasena' => ['required','min:8','confirmed'],
        ]);
    }

    /**
     * Obtenga las reglas de validación que se aplican a la solicitud.
     *
     * @return array
     */
    protected function validator_perfil(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:191',
            'last_name' => 'required|max:191',
            'mothers_last_name' => 'max:191',
            'email' => 'required|email|max:191',
            'phone' => 'max:191',
        ]);
    }

    /**
     * Elimina el avatar(imagen) del usuario logueado.
     *
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function RestaurarAvatar(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $user->avatar = "";
        $user->save();

        return redirect($this->redirectTo)->with('success','Restauración de imagen exitosamente!');
    }

    /**
     * Cambia el avatar(imagen) del usuario logueado.
     *
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function saveAvatar(Request $request){
        $ruta = storage_path().'/respaldos/images/users/';

        $imagenOriginal = $request->file('imagen');

        $this->validate($request, [
            'imagen' => 'required|image|mimes:png,jpg,jpeg|max:2048',
        ]);

        $temp_name = $this->random_string().'.'.$imagenOriginal->getClientOriginalExtension();

        $manager = new ImageManager(new Driver());
        $image = $manager->read($imagenOriginal);
        $image->scale(width: 300, height: 300);
        $image->toPng()->save($ruta.$temp_name);

        $user = User::find(Auth::user()->id);
        $user->avatar = $temp_name;
        $user->save();

        return redirect($this->redirectTo)->with('success','Cambio de imagen exitosamente!');
    }

    //perfil publico
    public function changePerfilPublico(Request $request)
    {
        return redirect($this->redirectTo)->with('successDatosPublicos','Cambio de datos públicos actualizados exitosamente!');
    }

    public function changeHorarioPerfilPublico(Request $request)
    {
        //guardar el horario del usuario
        $getregistrohorario = UsersListHorarios::where('id_usuario',Auth::user()->id)->first();

        if($getregistrohorario){
            $userhorario = UsersListHorarios::findOrFail($getregistrohorario->id);
        }else{
            $userhorario = new UsersListHorarios();
            $userhorario->id_usuario = Auth::user()->id;
        }

        $userhorario->lunesdesde = $request->lunesdesde;
        $userhorario->luneshasta = $request->luneshasta;
        $userhorario->martesdesde = $request->martesdesde;
        $userhorario->marteshasta = $request->marteshasta;
        $userhorario->miercolesdesde = $request->miercolesdesde;
        $userhorario->miercoleshasta = $request->miercoleshasta;
        $userhorario->juevesdesde = $request->juevesdesde;
        $userhorario->jueveshasta = $request->jueveshasta;
        $userhorario->viernesdesde = $request->viernesdesde;
        $userhorario->vierneshasta = $request->vierneshasta;
        $userhorario->sabadodesde = $request->sabadodesde;
        $userhorario->sabadohasta = $request->sabadohasta;
        $userhorario->domingodesde = $request->domingodesde;
        $userhorario->domingohasta = $request->domingohasta;
        $userhorario->feriadosdesde = $request->feriadosdesde;
        $userhorario->feriadoshasta = $request->feriadoshasta;
        $userhorario->save();

        return redirect($this->redirectTo)->with('successDatosPublicos','Cambio de horarios actualizados exitosamente!');
    }

    public function RestaurarImagenPortada(Request $request)
    {
        return redirect($this->redirectTo)->with('success','Restauración de imagen de portada exitosamente!');
    }

    public function saveImagenPortada(Request $request){
        $ruta = storage_path().'/respaldos/images/users/';

        $imagenOriginal = $request->file('imagen');

        $this->validate($request, [
            'imagen' => 'required|image|mimes:png,jpg,jpeg|max:2048',
        ]);

        $temp_name = $this->random_string().'.'.$imagenOriginal->getClientOriginalExtension();

        return redirect($this->redirectTo)->with('success','Cambio de imagen de portada actualizada exitosamente!');
    }

    public function changePerfilPublicidad(Request $request)
    {
        $phoneNumberUtil = \libphonenumber\PhoneNumberUtil::getInstance();
        $phoneNumberObject = $phoneNumberUtil->parse($request->fono_contacto, 'CL');
        $validacionnumerocelular = $phoneNumberUtil->isPossibleNumber($phoneNumberObject);

        if($validacionnumerocelular != 1){
            return redirect()->back()->withErrors('Formato de número de celular de contacto inválido')->withInput();
        }

        $this->validator_perfil_publicidad_publico_user_general($request->all())->validate();

        return redirect($this->redirectTo)->with('successDatosPublicidad','Cambio de datos públicos actualizados exitosamente!');
    }

    protected function validator_perfil_publicidad_publico_user_general(array $data)
    {
        return Validator::make($data, [
            'nombre_contacto' => 'required|max:191',
            'email_contacto' => 'nullable|email',
            'fono_contacto' => 'required',
            'estado_publicacion' => 'required',
        ]);
    }

    public function eliminarImagenPerfilPublicidad($id_registro = null)
    {
        return redirect($this->redirectTo)->with('successDatosPublicidad','Cambio de datos públicos actualizados exitosamente!');
    }

    //imagenes carnet
    public function guardarFotoPersonal(Request $request){
        $ruta = storage_path().'/respaldos/images/users/';

        $imagenOriginal = $request->file('imagen');

        $this->validate($request, [
            'imagen' => 'required|image|mimes:png,jpg,jpeg|max:2048',
        ]);

        return redirect($this->redirectTo)->with('success','Cambio de imagen personal actualizada exitosamente!');
    }

    public function guardarCarnetFrontal(Request $request){
        $ruta = storage_path().'/respaldos/images/users/';

        $imagenOriginal = $request->file('imagen');

        $this->validate($request, [
            'imagen' => 'required|image|mimes:png,jpg,jpeg|max:2048',
        ]);

        return redirect($this->redirectTo)->with('success','Cambio de imagen foto carnet frontal actualizada exitosamente!');
    }

    public function guardarCarnetPosterior(Request $request){
        $ruta = storage_path().'/respaldos/images/users/';

        $imagenOriginal = $request->file('imagen');

        $this->validate($request, [
            'imagen' => 'required|image|mimes:png,jpg,jpeg|max:2048',
        ]);

        return redirect($this->redirectTo)->with('success','Cambio de imagen foto carnet posterior actualizada exitosamente!');
    }

    //seccion perfil agencia
    public function RestaurarAgenciaAvatar(Request $request)
    {
        return redirect($this->redirectTo)->with('success','Restauración de imagen exitosamente!');
    }

    public function saveAvatarAgencia(Request $request){
        $ruta = storage_path().'/respaldos/images/users/';

        $imagenOriginal = $request->file('imagen');

        $this->validate($request, [
            'imagen' => 'required|image|mimes:png,jpg,jpeg|max:2048',
        ]);

        return redirect($this->redirectTo)->with('success','Cambio de imagen exitosamente!');
    }

    public function RestaurarImagenPortadaAgencia(Request $request)
    {
        return redirect($this->redirectTo)->with('success','Restauración de imagen de portada exitosamente!');
    }

    public function saveImagenPortadaAgencia(Request $request){
        $ruta = storage_path().'/respaldos/images/users/';

        $imagenOriginal = $request->file('imagen');

        $this->validate($request, [
            'imagen' => 'required|image|mimes:png,jpg,jpeg|max:2048',
        ]);

        return redirect($this->redirectTo)->with('success','Cambio de imagen de portada actualizada exitosamente!');
    }

    /**
     * Procesar un numero aleatorio.
     *
     * @return string $key
     */
    protected function random_string()
    {
        $key = '';
        $keys = array_merge( range('a','z'), range(0,9) );

        for($i=0; $i<10; $i++)
        {
            $key .= $keys[array_rand($keys)];
        }

        return $key;
    }

}
