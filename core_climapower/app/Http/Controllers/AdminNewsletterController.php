<?php

namespace App\Http\Controllers;

use Auth;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Models\NewsletterWeb;

class AdminNewsletterController extends Controller
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

        return view('admin.newsletter.index');
    }

    public function listado_newsletter()
    {
        $listnewsletter = NewsletterWeb::orderBy('id','desc')->get();

        return datatables()->of($listnewsletter)
            ->addColumn('fechaformateado', function ($news) {
                $fechacreacion = Carbon::parse($news->created_at);
                $dateformateado = $fechacreacion->format('d-m-Y');
                return $dateformateado;
            })
            ->make(true);
    }

}
