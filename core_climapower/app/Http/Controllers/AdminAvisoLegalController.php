<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreAvisoLegalRequest;
use App\Models\AvisoLegal;

class AdminAvisoLegalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $listavisolegal = AvisoLegal::all();

        return view('admin.avisolegal.index', compact('listavisolegal'));
    }

    public function create()
    {
        return view('admin.avisolegal.create');
    }

    public function store(StoreAvisoLegalRequest $request)
    {
        $aviso = new AvisoLegal();
        $aviso->titulo = $request->get('titulo');
        $aviso->descripcion = $request->get('descripcion');
        $aviso->estado = 1;
        $aviso->save();

        return redirect()->route('admin.avisolegal.index')->with('msj','Aviso legal ingresado exitosamente');
    }

    public function edit($id)
    {
        $avisolegal = AvisoLegal::findOrFail($id);

        return view('admin.avisolegal.edit', compact('avisolegal'));
    }

    public function update(StoreAvisoLegalRequest $request, $id)
    {
        $aviso = AvisoLegal::findOrFail($id);
        $aviso->titulo = $request->get('titulo');
        $aviso->descripcion = $request->get('descripcion');
        $aviso->estado = $request->get('estado');
        $aviso->update();

        return redirect()->route('admin.avisolegal.index')->with('msj','Aviso legal actualizado exitosamente');
    }

    public function destroy($id)
    {
        $aviso = AvisoLegal::findOrFail($id);
        $aviso->delete();

        return redirect()->route('admin.avisolegal.index')->with('msj','Aviso legal eliminado exitosamente');
    }

    public function massDestroy(Request $request)
    {
        if ($request->input('ids')) {
            $entries = AvisoLegal::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
