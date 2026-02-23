<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreListadoServiciosRequest;
use App\Models\ConfListVerificacionComplementaria;

class AdminListadoComplementosController extends Controller
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

        $listadocomplementos = ConfListVerificacionComplementaria::all();

        return view('admin.listado_complementos.index', compact('listadocomplementos'));
    }

    public function create()
    {
        return view('admin.listado_complementos.create');
    }

    public function store(StoreListadoServiciosRequest $request)
    {
        if (! Gate::allows('agregar_roles')) {
            return abort(401);
        }

        $newcomplemento = new ConfListVerificacionComplementaria();
        $newcomplemento->nombre = $request->get('nombre');
        $newcomplemento->save();

        return redirect()->route('admin.listcomplementos.index')->with('msj','Complemento ingresado exitosamente');
    }

    public function edit($id)
    {
        $editcomplemento = ConfListVerificacionComplementaria::findOrFail($id);

        return view('admin.listado_complementos.edit', compact('editcomplemento'));
    }

    public function update(StoreListadoServiciosRequest $request, $id)
    {
        if (! Gate::allows('editar_roles')) {
            return abort(401);
        }

        $editcomplemento = ConfListVerificacionComplementaria::findOrFail($id);
        $editcomplemento->nombre = $request->get('nombre');
        $editcomplemento->update();

        return redirect()->route('admin.listcomplementos.index')->with('msj','Complemento actualizado exitosamente');
    }

    public function destroy($id)
    {
        $deletecomplemento = ConfListVerificacionComplementaria::findOrFail($id);
        $deletecomplemento->delete();

        return redirect()->route('admin.listcomplementos.index')->with('msj','Complemento eliminado exitosamente');
    }

    public function massDestroy(Request $request)
    {
        if ($request->input('ids')) {
            $entries = ConfListVerificacionComplementaria::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
