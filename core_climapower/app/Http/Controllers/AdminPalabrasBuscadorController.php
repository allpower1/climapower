<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StorePalabraBuscadorRequest;
use App\Models\PalabrasBuscador;

class AdminPalabrasBuscadorController extends Controller
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

        $listadopalabras = PalabrasBuscador::all();

        return view('admin.palabras_buscador.index', compact('listadopalabras'));
    }

    public function create()
    {
        return view('admin.palabras_buscador.create');
    }

    public function store(StorePalabraBuscadorRequest $request)
    {
        if (! Gate::allows('agregar_roles')) {
            return abort(401);
        }

        $newpalabra = new PalabrasBuscador();
        $newpalabra->palabra = $request->get('palabra');
        $newpalabra->save();

        return redirect()->route('admin.palabrasbuscador.index')->with('msj','Palabra buscador ingresada exitosamente');
    }

    public function edit($id)
    {
        $palabrabuscador = PalabrasBuscador::findOrFail($id);

        return view('admin.palabras_buscador.edit', compact('palabrabuscador'));
    }

    public function update(StorePalabraBuscadorRequest $request, $id)
    {
        if (! Gate::allows('editar_roles')) {
            return abort(401);
        }

        $editpalabra = PalabrasBuscador::findOrFail($id);
        $editpalabra->palabra = $request->get('palabra');
        $editpalabra->update();

        return redirect()->route('admin.palabrasbuscador.index')->with('msj','Palabra buscador actualizada exitosamente');
    }

    public function destroy($id)
    {
        $deletepalabra = PalabrasBuscador::findOrFail($id);
        $deletepalabra->delete();

        return redirect()->route('admin.palabrasbuscador.index')->with('msj','Palabra buscador eliminada exitosamente');
    }

    public function massDestroy(Request $request)
    {
        if ($request->input('ids')) {
            $entries = PalabrasBuscador::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
