<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreListadoServiciosRequest;
use App\Models\ConfListServicios;

class AdminListadoServiciosController extends Controller
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

        $listadoservicios = ConfListServicios::all();

        return view('admin.listado_servicios.index', compact('listadoservicios'));
    }

    public function create()
    {
        return view('admin.listado_servicios.create');
    }

    public function store(StoreListadoServiciosRequest $request)
    {
        if (! Gate::allows('agregar_roles')) {
            return abort(401);
        }

        $newservicio = new ConfListServicios();
        $newservicio->nombre = $request->get('nombre');
        $newservicio->save();

        return redirect()->route('admin.listservicios.index')->with('msj','Masaje ingresado exitosamente');
    }

    public function edit($id)
    {
        $editservicio = ConfListServicios::findOrFail($id);

        return view('admin.listado_servicios.edit', compact('editservicio'));
    }

    public function update(StoreListadoServiciosRequest $request, $id)
    {
        if (! Gate::allows('editar_roles')) {
            return abort(401);
        }

        $editservicio = ConfListServicios::findOrFail($id);
        $editservicio->nombre = $request->get('nombre');
        $editservicio->update();

        return redirect()->route('admin.listservicios.index')->with('msj','Masaje actualizado exitosamente');
    }

    public function destroy($id)
    {
        $deleteservicio = ConfListServicios::findOrFail($id);
        $deleteservicio->delete();

        return redirect()->route('admin.listservicios.index')->with('msj','Masaje eliminado exitosamente');
    }

    public function massDestroy(Request $request)
    {
        if ($request->input('ids')) {
            $entries = ConfListServicios::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
