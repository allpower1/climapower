<?php

namespace App\Http\Controllers;

use Auth;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Models\PublicacionesInternas;

class AdminPublicacionesInternasController extends Controller
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

        return view('admin.publicaciones_internas.index');
    }

    public function listado_publicaciones_internas()
    {
        $listpublicacionesinternas = PublicacionesInternas::with('usuario')
        ->where(function($query) {
            $query->whereDate('fecha_finalizacion', '>=', now()->toDateString())->orWhereNull('fecha_finalizacion');
        })
        ->orderBy('id','desc')->get();

        return datatables()->of($listpublicacionesinternas)
            ->addColumn('dataDetalle', function ($publicacion) {
                if (strlen($publicacion->descripcion) > 50) {
                    // Recorta la cadena hasta 50 caracteres y agrega puntos suspensivos
                    $cadena_corta = substr($publicacion->descripcion, 0, 50) . '...';
                } else {
                    // La cadena ya tiene 100 caracteres o menos, no se necesita cortar
                    $cadena_corta = $publicacion->descripcion;
                }

                return $cadena_corta;
            })
            ->addColumn('dataUser', function ($publicacion) {
                $txtusuario = '--';
                return $txtusuario;
            })
            ->addColumn('fechaCreacionformateado', function ($publicacion) {
                $fechacreacion = Carbon::parse($publicacion->created_at);
                $dateformateado = $fechacreacion->format('d-m-Y');
                return $dateformateado;
            })
            ->addColumn('fechaFinalizacionFormateado', function ($publicacion) {
                if($publicacion->fecha_finalizacion){
                    $fechafinalizacion = Carbon::parse($publicacion->fecha_finalizacion);
                    $dateformateado = $fechafinalizacion->format('d-m-Y');
                    return $dateformateado;
                }else{
                    return '--';
                }
            })
            ->addColumn('action', function ($publicacion) {
                $btnEditar = '<button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modalEditarPublicacionInterna" data-id="'.$publicacion->id.'" data-titulo="'.$publicacion->titulo.'" data-descripcion="'.$publicacion->descripcion.'" data-fecha_finalizacion="'.$publicacion->fecha_finalizacion.'">Editar</button>';

                $btnEliminar = '<form action="'.route("publicaciones_internas.destroy", $publicacion->id).'" method="POST" class="d-inline">'.csrf_field().method_field("DELETE").'<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'¿Eliminar publicación?\')">Eliminar</button></form>';

                return $btnEditar.$btnEliminar;

            })
            ->make(true);
    }

}
