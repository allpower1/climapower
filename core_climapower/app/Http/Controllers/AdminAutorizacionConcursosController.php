<?php

namespace App\Http\Controllers;

use Auth;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Models\User;

class AdminAutorizacionConcursosController extends Controller
{
    /**
     * Crear una nueva instancia de controlador.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (Auth::user()->hasRole('Usuario General')) {
            return redirect('/');
        }

        return view('admin.autorizacion_concursos.index');
    }

    public function listado_autorizacion_concursos()
    {
        $listautorizacionconcursos = User::where('autorizacion_concursos',1)->orderBy('id','desc')->get();

        return datatables()->of($listautorizacionconcursos)
            ->addColumn('checknomina', function ($user) {
                $checknomina = '<input class="listcheckboxusuarios" type="checkbox" value="'.$user->id.'" onclick="comprobarCheckboxUsuarios()">';

                return $checknomina;
            })
            ->addColumn('tipoperfiles', function ($user) {
                $txttipoperfil = '';

                return $txttipoperfil;
            })
            ->addColumn('fechaformateado', function ($news) {
                $fechacreacion = Carbon::parse($news->created_at);
                $dateformateado = $fechacreacion->format('d-m-Y');
                return $dateformateado;
            })
            ->make(true);
    }

}
