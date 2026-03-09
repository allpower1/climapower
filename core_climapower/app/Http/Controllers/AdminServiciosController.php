<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreServiciosRequest;
use App\Models\Servicios;

class AdminServiciosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $listservicios = Servicios::all();

        return view('admin.servicios.index', compact('listservicios'));
    }

    public function create()
    {
        return view('admin.servicios.create');
    }

    public function store(StoreServiciosRequest $request)
    {
        $servicio = new Servicios();
        $servicio->titulo = $request->get('titulo');
        $servicio->descripcion = $request->get('descripcion');
        $servicio->estado = 1;
        $servicio->save();

        return redirect()->route('admin.servicios.index')->with('msj','Servicio ingresado exitosamente');
    }

    public function edit($id)
    {
        $servicio = Servicios::findOrFail($id);

        return view('admin.servicios.edit', compact('servicio'));
    }

    public function update(StoreServiciosRequest $request, $id)
    {
        $servicio = Servicios::findOrFail($id);
        $servicio->titulo = $request->get('titulo');
        $servicio->descripcion = $request->get('descripcion');
        $servicio->estado = $request->get('estado');
        $servicio->update();

        return redirect()->route('admin.servicios.index')->with('msj','Servicio actualizado exitosamente');
    }

    public function destroy($id)
    {
        $servicio = Servicios::findOrFail($id);
        $servicio->delete();

        return redirect()->route('admin.servicios.index')->with('msj','Servicio eliminado exitosamente');
    }

    public function massDestroy(Request $request)
    {
        if ($request->input('ids')) {
            $entries = Servicios::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
