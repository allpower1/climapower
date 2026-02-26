<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AdminFooter;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewsLetterWeb;
use App\Models\NewsletterWeb as ModelsNewsletterWeb;
use Rahul900day\Captcha\Facades\Captcha;
use App\Mail\ContactoWeb;
use App\Models\AdminAcercaNosotros;
use App\Models\AdminContactoOtros;
use App\Models\Experiencias;
use App\Models\NuestrasEstrategias;
use App\Models\NuestroEquipo;
use App\Models\PreguntasFrecuentes;

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

        return view('welcome',compact('datasitio','listpreguntasfrecuentes','listnuestrasestrategias','listexperiencias','listnuestroequipo','dataacercanosotros','fondofooter'));
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

    public function terminosycondiciones()
    {
        $datasitio = AdminFooter::where('id',2)->first();

        if($datasitio->titulo == '' || $datasitio->titulo == null){
            return abort(404);
        }

        return view('sitio_new_footer_autoadministrable', compact('datasitio'));
    }

    public function politicas_privacidad()
    {
        $datasitio = AdminFooter::where('id',3)->first();

        if($datasitio->titulo == '' || $datasitio->titulo == null){
            return abort(404);
        }

        return view('sitio_new_footer_autoadministrable', compact('datasitio'));
    }

    public function pago_seguro()
    {
        $datasitio = AdminFooter::where('id',4)->first();

        if($datasitio->titulo == '' || $datasitio->titulo == null){
            return abort(404);
        }

        return view('sitio_new_footer_autoadministrable', compact('datasitio'));
    }

    public function garantia()
    {
        $datasitio = AdminFooter::where('id',5)->first();

        if($datasitio->titulo == '' || $datasitio->titulo == null){
            return abort(404);
        }

        return view('sitio_new_footer_autoadministrable', compact('datasitio'));
    }

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
                //Captcha::getResponseName() => ['required', 'captcha'],
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

                Mail::to('contacto@climapower.cl')->send(new ContactoWeb($objDemo));

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

                Mail::to('contacto@tuladovip.cl')->send(new NewsLetterWeb($objDemo));

                return redirect()->back()->with('successEnvioNewsletter','Tu newsletter fue ingresado exitosamente, agradecemos tu preferencia!');
            }
        } catch (\Throwable $th) {
            Log::info(print_r($th->getMessage(),true));
            return redirect()->back()->with('errorEnvioNewsletter',$th->getMessage());
        }
    }

}
