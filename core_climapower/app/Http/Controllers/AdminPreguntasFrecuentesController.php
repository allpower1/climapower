<?php

namespace App\Http\Controllers;

use App\Models\PreguntasFrecuentes;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StorePreguntaFrecuenteRequest;

class AdminPreguntasFrecuentesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $listpreguntas = PreguntasFrecuentes::all();

        return view('admin.preguntasfrecuentes.index', compact('listpreguntas'));
    }

    public function create()
    {
        return view('admin.preguntasfrecuentes.create');
    }

    public function store(StorePreguntaFrecuenteRequest $request)
    {
        $preg = new PreguntasFrecuentes;
        $preg->pregunta = $request->get('pregunta');
        $preg->respuesta = $request->get('respuesta');
        $preg->estado = 1;
        $preg->save();

        return redirect()->route('admin.preguntasfrecuentes.index')->with('msj','Pregunta frecuente ingresada exitosamente');
    }

    public function edit($id)
    {
        $preguntafrec = PreguntasFrecuentes::findOrFail($id);

        return view('admin.preguntasfrecuentes.edit', compact('preguntafrec'));
    }

    public function update(StorePreguntaFrecuenteRequest $request, $id)
    {
        $preg = PreguntasFrecuentes::findOrFail($id);
        $preg->pregunta = $request->get('pregunta');
        $preg->respuesta = $request->get('respuesta');
        $preg->estado = $request->get('estado');
        $preg->update();

        return redirect()->route('admin.preguntasfrecuentes.index')->with('msj','Pregunta frecuente actualizada exitosamente');
    }

    public function destroy($id)
    {
        $preg = PreguntasFrecuentes::findOrFail($id);
        $preg->delete();

        return redirect()->route('admin.preguntasfrecuentes.index')->with('msj','Pregunta frecuente eliminada exitosamente');
    }

    public function massDestroy(Request $request)
    {
        if ($request->input('ids')) {
            $entries = PreguntasFrecuentes::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
