<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreNuestrasEstrategiasRequest;
use App\Models\NuestrasEstrategias;

class AdminNuestrasEstrategiasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $listestrategias = NuestrasEstrategias::all();

        return view('admin.nuestrasestrategias.index', compact('listestrategias'));
    }

    public function create()
    {
        return view('admin.nuestrasestrategias.create');
    }

    public function store(StoreNuestrasEstrategiasRequest $request)
    {
        $preg = new NuestrasEstrategias;
        $preg->titulo = $request->get('titulo');
        $preg->descripcion = $request->get('descripcion');
        $preg->estado = 1;
        $preg->save();

        return redirect()->route('admin.nuestrasestrategias.index')->with('msj','Estrategia ingresada exitosamente');
    }

    public function edit($id)
    {
        $estrategia = NuestrasEstrategias::findOrFail($id);

        return view('admin.nuestrasestrategias.edit', compact('estrategia'));
    }

    public function update(StoreNuestrasEstrategiasRequest $request, $id)
    {
        $preg = NuestrasEstrategias::findOrFail($id);
        $preg->titulo = $request->get('titulo');
        $preg->descripcion = $request->get('descripcion');
        $preg->estado = $request->get('estado');
        $preg->update();

        return redirect()->route('admin.nuestrasestrategias.index')->with('msj','Estrategia actualizada exitosamente');
    }

    public function destroy($id)
    {
        $preg = NuestrasEstrategias::findOrFail($id);
        $preg->delete();

        return redirect()->route('admin.nuestrasestrategias.index')->with('msj','Estrategia eliminada exitosamente');
    }

    public function massDestroy(Request $request)
    {
        if ($request->input('ids')) {
            $entries = NuestrasEstrategias::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
