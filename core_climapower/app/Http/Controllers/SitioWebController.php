<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewsLetterWeb;
use App\Models\NewsletterWeb as ModelsNewsletterWeb;
use Rahul900day\Captcha\Facades\Captcha;
use App\Mail\ContactoWeb;
use App\Mail\TestimonioWeb;
use App\Models\AdminAcercaNosotros;
use App\Models\AdminContactoOtros;
use App\Models\AdminSitioWeb;
use App\Models\AvisoLegal;
use App\Models\Experiencias;
use App\Models\NuestrasEstrategias;
use App\Models\NuestroEquipo;
use App\Models\NuestrosProyectos;
use App\Models\PreguntasFrecuentes;
use App\Models\SliderHome;
use App\Models\Testimonios;
use Intervention\Image\ImageManager;

class SitioWebController extends Controller
{
    use ThrottlesLogins;

    public function indexinicial(Request $request)
    {
        return view('indexenconstruccion');
    }

    public function index()
    {
        $datasitio = AdminContactoOtros::where('id',1)->first();
        $listpreguntasfrecuentes = PreguntasFrecuentes::where('estado',1)->get();
        $listnuestrasestrategias = NuestrasEstrategias::where('estado',1)->get();
        $listexperiencias = Experiencias::where('estado',1)->limit(6)->get();
        $listnuestroequipo = NuestroEquipo::where('estado',1)->get();
        $dataacercanosotros = AdminAcercaNosotros::where('id',1)->first();
        $sliderhome = SliderHome::where('estado',1)->get();
        $listtestimonios = Testimonios::where('estado',1)->get();
        $listproyectos = NuestrosProyectos::where('estado',1)->orderBy('id','desc')->get();

        //validar si existe data basica
        if(!$datasitio){
            return abort(404);
        }

        //procesar fonodo footer
        $fondofooter = 'img/demos/business-consulting/contact/contact-background.jpg';
        if($datasitio){
            if($datasitio->adjunto_fondo_footer){
                $fondofooter = 'filefondofooter/'.$datasitio->adjunto_fondo_footer;
            }
        }

        return view('welcome',compact('datasitio','listpreguntasfrecuentes','listnuestrasestrategias','listexperiencias','listnuestroequipo','dataacercanosotros','sliderhome','fondofooter','listtestimonios','listproyectos'));
    }

    public function listadoexperiencias()
    {
        $listexperiencias = Experiencias::where('estado',1)->get();

        return view('site_listado_experiencias', compact('listexperiencias'));
    }

    public function detalleexperiencia($id)
    {
        $experiencia = Experiencias::where('id',$id)->first();

        if(!$experiencia){
            return abort(404);
        }

        if($experiencia->titulo == '' || $experiencia->titulo == null){
            return abort(404);
        }

        if($experiencia->subtitulo == '' || $experiencia->subtitulo == null){
            return abort(404);
        }

        return view('site_detalle_experiencia', compact('experiencia'));
    }

    //nuestro equipo
    public function listadoequipo()
    {
        $listequipo = NuestroEquipo::where('estado',1)->get();

        return view('site_listado_equipo', compact('listequipo'));
    }

    public function detalleequipo($id)
    {
        $equipo = NuestroEquipo::where('id',$id)->first();

        if(!$equipo){
            return abort(404);
        }

        if($equipo->nombre_completo == '' || $equipo->nombre_completo == null){
            return abort(404);
        }

        if($equipo->cargo == '' || $equipo->cargo == null){
            return abort(404);
        }

        return view('site_detalle_equipo', compact('equipo'));
    }

    public function sobrenosotros()
    {
        $datasitio = AdminContactoOtros::where('id',1)->first();
        $dataacercanosotros = AdminAcercaNosotros::where('id',1)->first();

        if(!$dataacercanosotros){
            return abort(404);
        }

        return view('site_acerca_nosotros', compact('datasitio','dataacercanosotros'));
    }

    public function testimonios()
    {
        $listtestimonios = Testimonios::where('estado',1)->get();

        return view('site_testimonios', compact('listtestimonios'));
    }

    public function listadoproyectos()
    {
        $listproyectos = NuestrosProyectos::where('estado',1)->orderBy('id','desc')->get();

        return view('site_listado_proyectos', compact('listproyectos'));
    }

    public function detalleproyecto($id)
    {
        $proyecto = NuestrosProyectos::where('id',$id)->first();

        if(!$proyecto){
            return abort(404);
        }
        return view('site_detalle_proyecto', compact('proyecto'));
    }

    //INICIO SITIOS AUTOADMINISTRABLES
    public function AdminSiteClimaPower()
    {
        $datasitio = AdminSitioWeb::where('id',1)->first();

        if($datasitio->titulo == '' || $datasitio->titulo == null){
            return abort(404);
        }

        return view('sitio_new_footer_autoadministrable', compact('datasitio'));
    }

    public function AdminSiteGrupoChr()
    {
        $datasitio = AdminSitioWeb::where('id',2)->first();

        if($datasitio->titulo == '' || $datasitio->titulo == null){
            return abort(404);
        }

        return view('sitio_new_footer_autoadministrable', compact('datasitio'));
    }

    public function AdminDirectorio()
    {
        $datasitio = AdminSitioWeb::where('id',3)->first();

        if($datasitio->titulo == '' || $datasitio->titulo == null){
            return abort(404);
        }

        return view('sitio_new_footer_autoadministrable', compact('datasitio'));
    }

    public function AdminDatosComerciales()
    {
        $datasitio = AdminSitioWeb::where('id',4)->first();

        if($datasitio->titulo == '' || $datasitio->titulo == null){
            return abort(404);
        }

        return view('sitio_new_footer_autoadministrable', compact('datasitio'));
    }

    public function AdminServicios()
    {
        $datasitio = AdminSitioWeb::where('id',5)->first();

        if($datasitio->titulo == '' || $datasitio->titulo == null){
            return abort(404);
        }

        return view('sitio_new_footer_autoadministrable', compact('datasitio'));
    }

    public function AdminProductos()
    {
        $datasitio = AdminSitioWeb::where('id',6)->first();

        if($datasitio->titulo == '' || $datasitio->titulo == null){
            return abort(404);
        }

        return view('sitio_new_footer_autoadministrable', compact('datasitio'));
    }

    public function AdminContratos()
    {
        $datasitio = AdminSitioWeb::where('id',7)->first();

        if($datasitio->titulo == '' || $datasitio->titulo == null){
            return abort(404);
        }

        return view('sitio_new_footer_autoadministrable', compact('datasitio'));
    }

    public function AdminEficienciaEnergetica()
    {
        $datasitio = AdminSitioWeb::where('id',8)->first();

        if($datasitio->titulo == '' || $datasitio->titulo == null){
            return abort(404);
        }

        return view('sitio_new_footer_autoadministrable', compact('datasitio'));
    }

    public function AdminUnidadesNegocios()
    {
        $datasitio = AdminSitioWeb::where('id',9)->first();

        if($datasitio->titulo == '' || $datasitio->titulo == null){
            return abort(404);
        }

        return view('sitio_new_footer_autoadministrable', compact('datasitio'));
    }

    public function AdminInformacionGeneral()
    {
        $datasitio = AdminSitioWeb::where('id',10)->first();

        if($datasitio->titulo == '' || $datasitio->titulo == null){
            return abort(404);
        }

        return view('sitio_new_footer_autoadministrable', compact('datasitio'));
    }

    public function AdminTerminosYCondiciones()
    {
        $datasitio = AdminSitioWeb::where('id',11)->first();

        if($datasitio->titulo == '' || $datasitio->titulo == null){
            return abort(404);
        }

        return view('sitio_new_footer_autoadministrable', compact('datasitio'));
    }

    public function AdminPoliticasCalidad()
    {
        $datasitio = AdminSitioWeb::where('id',12)->first();

        if($datasitio->titulo == '' || $datasitio->titulo == null){
            return abort(404);
        }

        return view('sitio_new_footer_autoadministrable', compact('datasitio'));
    }

    public function AdminPoliticasCookies()
    {
        $datasitio = AdminSitioWeb::where('id',13)->first();

        if($datasitio->titulo == '' || $datasitio->titulo == null){
            return abort(404);
        }

        return view('sitio_new_footer_autoadministrable', compact('datasitio'));
    }

    public function AdminFormasPagos()
    {
        $datasitio = AdminSitioWeb::where('id',14)->first();

        if($datasitio->titulo == '' || $datasitio->titulo == null){
            return abort(404);
        }

        return view('sitio_new_footer_autoadministrable', compact('datasitio'));
    }

    public function AdminComunidades()
    {
        $datasitio = AdminSitioWeb::where('id',15)->first();

        if($datasitio->titulo == '' || $datasitio->titulo == null){
            return abort(404);
        }

        return view('sitio_new_footer_autoadministrable', compact('datasitio'));
    }

    public function AdminDespachos()
    {
        $datasitio = AdminSitioWeb::where('id',16)->first();

        if($datasitio->titulo == '' || $datasitio->titulo == null){
            return abort(404);
        }

        return view('sitio_new_footer_autoadministrable', compact('datasitio'));
    }

    public function AdminExcluye()
    {
        $datasitio = AdminSitioWeb::where('id',17)->first();

        if($datasitio->titulo == '' || $datasitio->titulo == null){
            return abort(404);
        }

        return view('sitio_new_footer_autoadministrable', compact('datasitio'));
    }

    public function AdminGarantias()
    {
        $datasitio = AdminSitioWeb::where('id',18)->first();

        if($datasitio->titulo == '' || $datasitio->titulo == null){
            return abort(404);
        }

        return view('sitio_new_footer_autoadministrable', compact('datasitio'));
    }

    public function AdminAvisoLegal()
    {
        $datasitio = AdminSitioWeb::where('id',19)->first();
        $listavisoslegales = AvisoLegal::where('estado',1)->get();

        return view('site_aviso_legal', compact('datasitio','listavisoslegales'));
    }

    public function AdminTiendaElectronica()
    {
        $datasitio = AdminSitioWeb::where('id',20)->first();

        if($datasitio->titulo == '' || $datasitio->titulo == null){
            return abort(404);
        }

        return view('sitio_new_footer_autoadministrable', compact('datasitio'));
    }

    public function AdminPreguntasFrecuentes()
    {
        $datasitio = AdminSitioWeb::where('id',21)->first();
        $listpreguntasfrecuentes = PreguntasFrecuentes::where('estado',1)->get();

        return view('site_preguntas_frecuentes', compact('datasitio','listpreguntasfrecuentes'));
    }

    public function AdminDescargasPDF()
    {
        $datasitio = AdminSitioWeb::where('id',22)->first();

        if($datasitio->titulo == '' || $datasitio->titulo == null){
            return abort(404);
        }

        return view('sitio_new_footer_autoadministrable', compact('datasitio'));
    }

    public function AdminNormativas()
    {
        $datasitio = AdminSitioWeb::where('id',23)->first();

        if($datasitio->titulo == '' || $datasitio->titulo == null){
            return abort(404);
        }

        return view('sitio_new_footer_autoadministrable', compact('datasitio'));
    }

    public function AdminPartners()
    {
        $datasitio = AdminSitioWeb::where('id',24)->first();

        if($datasitio->titulo == '' || $datasitio->titulo == null){
            return abort(404);
        }

        return view('sitio_new_footer_autoadministrable', compact('datasitio'));
    }

    public function AdminSoporte()
    {
        $datasitio = AdminSitioWeb::where('id',25)->first();

        if($datasitio->titulo == '' || $datasitio->titulo == null){
            return abort(404);
        }

        return view('sitio_new_footer_autoadministrable', compact('datasitio'));
    }

    public function AdminReclamos()
    {
        $datasitio = AdminSitioWeb::where('id',26)->first();

        if($datasitio->titulo == '' || $datasitio->titulo == null){
            return abort(404);
        }

        return view('sitio_new_footer_autoadministrable', compact('datasitio'));
    }

    public function AdminOfertaTrabajo()
    {
        $datasitio = AdminSitioWeb::where('id',27)->first();

        if($datasitio->titulo == '' || $datasitio->titulo == null){
            return abort(404);
        }

        return view('sitio_new_footer_autoadministrable', compact('datasitio'));
    }

    public function AdminTrabajaConNosotros()
    {
        $datasitio = AdminSitioWeb::where('id',28)->first();

        if($datasitio->titulo == '' || $datasitio->titulo == null){
            return abort(404);
        }

        return view('sitio_new_footer_autoadministrable', compact('datasitio'));
    }

    public function AdminSiteGrupoChrCL()
    {
        $datasitio = AdminSitioWeb::where('id',29)->first();

        if($datasitio->titulo == '' || $datasitio->titulo == null){
            return abort(404);
        }

        return view('sitio_new_footer_autoadministrable', compact('datasitio'));
    }
    //FIN SITIOS AUTOADMINISTRABLES

    public function contacto()
    {
        $datasitio = AdminContactoOtros::where('id',1)->first();

        return view('site_contacto',compact('datasitio'));
    }

    public function procesarContacto(Request $request)
    {
        try {
            $reglas = array(
                'nombre_completo' => 'required',
                'email' => 'email|required',
                'mensaje' => 'required',
                Captcha::getResponseName() => ['required', 'captcha'],
            );

            $mensaje = array(
                'phone.required' => 'El campo celular es requerido',
                'phone.digits_between' => 'El campo celular debe estar entre 7 and 12 digitos',
                'subject.required' => 'El campo asunto es requerido',
                'acceptance.accepted' => 'Debe aceptar que sus datos sean collecionados'
            );

            $validator = Validator::make($request->all(), $reglas, $mensaje);

            if($validator->fails())
            {
                $errors = $validator->errors();
                return redirect()->back()->withErrors($errors->first())->withInput();
            }else{
                //validar numero de telefono que sea valido
                /*
                $phoneNumberUtil = \libphonenumber\PhoneNumberUtil::getInstance();
                $phoneNumberObject = $phoneNumberUtil->parse($request->phone, 'CL');
                $validacionnumerocelular = $phoneNumberUtil->isPossibleNumber($phoneNumberObject);

                if($validacionnumerocelular != 1){
                    return redirect()->back()->withErrors('Formato de número de celular inválido')->withInput();
                }
                */

                $objDemo = new \stdClass();
                $objDemo->nombre_completo = $request->get('nombre_completo');
                $objDemo->email = $request->get('email');
                $objDemo->mensaje = $request->get('mensaje');

                Mail::to('contacto@climatizacion-hvac.cl')->send(new ContactoWeb($objDemo));

                return redirect()->back()->with('successenvio','Tu requerimiento fue ingresado exitosamente, nos contactaremos contigo a la brevedad!');
            }
        } catch (\Throwable $th) {
            Log::info(print_r($th->getMessage(),true));
            return redirect()->back()->withErrors($th->getMessage())->withInput();
        }
    }

    public function procesarNewsLetter(Request $request)
    {
        try {
            $reglas = array(
                'email' => 'required|email',
                Captcha::getResponseName() => ['required', 'captcha'],
            );

            $validator = Validator::make($request->all(), $reglas);

            if($validator->fails())
            {
                $errors = $validator->errors();
                return redirect()->back()->with('errorEnvioNewsletter',$errors->first());
            }else{
                //validar si el email ya se encuentra registrado
                $existsemail = ModelsNewsletterWeb::where('email',$request->get('email'))->exists();

                if($existsemail){
                    return redirect()->back()->with('errorEnvioNewsletter','Su email ya se encuentra registrado en nuestras base de datos, agradecemos tu preferencia!');
                }

                //registrar en bbdd el newsletter
                $newleter = new ModelsNewsletterWeb();
                $newleter->email = $request->get('email');
                $newleter->save();

                //enviar correo de aviso
                $objDemo = new \stdClass();
                $objDemo->email = $request->get('email');

                Mail::to('contacto@climatizacion-hvac.cl')->send(new NewsLetterWeb($objDemo));

                return redirect()->back()->with('successEnvioNewsletter','Tu newsletter fue ingresado exitosamente, agradecemos tu preferencia!');
            }
        } catch (\Throwable $th) {
            Log::info(print_r($th->getMessage(),true));
            return redirect()->back()->with('errorEnvioNewsletter',$th->getMessage());
        }
    }
    public function procesarNuevoTestimonio(Request $request)
    {
        try {
            $reglas = array(
                'nombre' => 'required|string|max:191',
                'email' => 'email|required',
                'cargo' => 'nullable|string|max:100',
                'testimonio' => 'required',
                'imagen' => 'nullable|file|max:10240|mimes:jpg,jpeg,png',
                Captcha::getResponseName() => ['required', 'captcha'],
            );

            $validator = Validator::make($request->all(), $reglas);

            if($validator->fails())
            {
                $errors = $validator->errors();
                return redirect()->back()->with('errortestimonio',$errors->first());
            }else{
                //guardar nuevo testimonio
                $testimonio = new Testimonios();
                $testimonio->nombre = $request->get('nombre');
                $testimonio->email = $request->get('email');
                $testimonio->cargo = $request->get('cargo');
                $testimonio->testimonio = $request->get('testimonio');
                $testimonio->estado = 0;

                if ($request->hasFile('imagen')) {
                    $ruta = storage_path().'/respaldos/adjuntotestimonio/';

                    $file = $request->file('imagen');
                    $extension = $file->getClientOriginalExtension();
                    $filename = date('Y').'_testimonio_'.date('Y-m-d').'_'.$this->random_string().'.'.$extension;

                    $manager = new ImageManager(['driver' => 'gd']);
                    $image = $manager->make($file);
                    $image->fit(234, 225);
                    $image->save($ruta.$filename);

                    $testimonio->imagen = $filename;
                }

                $testimonio->save();

                //enviar email de aviso del testimonio
                $objDemo = new \stdClass();
                $objDemo->nombre = $request->get('nombre');
                $objDemo->email = $request->get('email');
                $objDemo->cargo = $request->get('cargo');
                $objDemo->testimonio = $request->get('testimonio');

                Mail::to($request->get('email'))->cc('contacto@climatizacion-hvac.cl')->send(new TestimonioWeb($objDemo));

                return redirect()->back()->with('successenviotestimonio','Tu testimonio fue ingresado exitosamente, revisaremos tu testimonio a la brevedad!');
            }
        } catch (\Throwable $th) {
            Log::info(print_r($th->getMessage(),true));
            return redirect()->back()->with('errortestimonio',$th->getMessage());
        }
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
