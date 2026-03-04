<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\NuestrosProyectos;
use Intervention\Image\ImageManager;

class AdminNuestrosProyectosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $listproyectos = NuestrosProyectos::all();

        return view('admin.nuestros_proyectos.index', compact('listproyectos'));
    }

    public function create()
    {
        return view('admin.nuestros_proyectos.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'titulo'    => 'required',
            'subtitulo' => 'required',
            'datahtml'  => 'required',
            'adjuntoproyecto' => 'required|file|max:10240|mimes:jpg,jpeg,png',
        ]);

        if ($request->hasFile('adjuntoproyecto')) {
            $ruta = storage_path().'/respaldos/adjuntoproyecto/';

            $file = $request->file('adjuntoproyecto');
            $extension = $file->getClientOriginalExtension();
            $filename = date('Y').'_proyecto_'.date('Y-m-d').'_'.$this->random_string().'.'.$extension;

            $manager = new ImageManager(['driver' => 'gd']);
            $image = $manager->make($file);
            $image->fit(371, 255);
            $image->save($ruta.$filename);

            $proyecto = new NuestrosProyectos;
            $proyecto->titulo = $request->get('titulo');
            $proyecto->subtitulo = $request->get('subtitulo');
            $proyecto->datahtml = $request->get('datahtml');
            $proyecto->imagen = $filename;
            $proyecto->fecha = date('Y-m-d');
            $proyecto->estado = 1;
            $proyecto->save();

            return redirect()->route('admin.nuestros_proyectos.index')->with('msj','Proyecto ingresado exitosamente');
        }
    }

    public function edit($id)
    {
        $proyecto = NuestrosProyectos::findOrFail($id);

        return view('admin.nuestros_proyectos.edit', compact('proyecto'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'titulo'    => 'required',
            'subtitulo'    => 'required',
            'datahtml'   => 'required',
            'adjuntoproyecto' => 'nullable|file|max:10240|mimes:jpg,jpeg,png',
        ]);

        $proyecto = NuestrosProyectos::findOrFail($id);
        $proyecto->titulo = $request->get('titulo');
        $proyecto->subtitulo = $request->get('subtitulo');
        $proyecto->datahtml = $request->get('datahtml');

        if ($request->hasFile('adjuntoproyecto')) {
            $ruta = storage_path().'/respaldos/adjuntoproyecto/';

            $file = $request->file('adjuntoproyecto');
            $extension = $file->getClientOriginalExtension();
            $filename = date('Y').'_proyecto_'.date('Y-m-d').'_'.$this->random_string().'.'.$extension;

            $manager = new ImageManager(['driver' => 'gd']);
            $image = $manager->make($file);
            $image->fit(371, 255);
            $image->save($ruta.$filename);

            $proyecto->imagen = $filename;
        }

        $proyecto->estado = $request->get('estado');
        $proyecto->update();

        return redirect()->route('admin.nuestros_proyectos.index')->with('msj','Proyecto actualizado exitosamente');
    }

    public function destroy($id)
    {
        $proyecto = NuestrosProyectos::findOrFail($id);
        $proyecto->delete();

        return redirect()->route('admin.nuestros_proyectos.index')->with('msj','Proyecto eliminado exitosamente');
    }

    public function massDestroy(Request $request)
    {
        if ($request->input('ids')) {
            $entries = NuestrosProyectos::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

    protected function random_string()
    {
        $key = '';
        $keys = array_merge(range('a', 'z'), range(0, 9));

        for ($i = 0; $i < 10; $i++) {
            $key .= $keys[array_rand($keys)];
        }

        return $key;
    }

}
