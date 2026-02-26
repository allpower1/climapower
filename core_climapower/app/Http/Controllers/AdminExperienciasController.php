<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreExperienciasRequest;
use App\Models\Experiencias;
use Intervention\Image\ImageManager;

class AdminExperienciasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $listexperiencias = Experiencias::all();

        return view('admin.experiencias.index', compact('listexperiencias'));
    }

    public function create()
    {
        return view('admin.experiencias.create');
    }

    public function store(StoreExperienciasRequest $request)
    {
        $this->validate($request, [
            'adjuntoexperiencia' => 'required|file|max:10240|mimes:jpg,jpeg,png',
        ]);

        if ($request->hasFile('adjuntoexperiencia')) {
            $ruta = storage_path().'/respaldos/adjuntoexperiencia/';

            $file = $request->file('adjuntoexperiencia');
            $extension = $file->getClientOriginalExtension();
            $filename = date('Y').'_experiencia_'.date('Y-m-d').'_'.$this->random_string().'.'.$extension;

            $manager = new ImageManager(['driver' => 'gd']);
            $image = $manager->make($file);
            $image->fit(111, 106);
            $image->save($ruta.$filename);

            $experiencia = new Experiencias;
            $experiencia->titulo = $request->get('titulo');
            $experiencia->subtitulo = $request->get('subtitulo');
            $experiencia->descripcion = $request->get('descripcion');
            $experiencia->adjunto = $filename;
            $experiencia->estado = 1;
            $experiencia->save();

            return redirect()->route('admin.experiencias.index')->with('msj','Experiencia ingresada exitosamente');
        }
    }

    public function edit($id)
    {
        $experiencia = Experiencias::findOrFail($id);

        return view('admin.experiencias.edit', compact('experiencia'));
    }

    public function update(StoreExperienciasRequest $request, $id)
    {
        $this->validate($request, [
            'adjuntoexperiencia' => 'nullable|file|max:10240|mimes:jpg,jpeg,png',
        ]);

        $experiencia = Experiencias::findOrFail($id);
        $experiencia->titulo = $request->get('titulo');
        $experiencia->subtitulo = $request->get('subtitulo');
        $experiencia->descripcion = $request->get('descripcion');

        if ($request->hasFile('adjuntoexperiencia')) {
            $ruta = storage_path().'/respaldos/adjuntoexperiencia/';

            $file = $request->file('adjuntoexperiencia');
            $extension = $file->getClientOriginalExtension();
            $filename = date('Y').'_experiencia_'.date('Y-m-d').'_'.$this->random_string().'.'.$extension;

            $manager = new ImageManager(['driver' => 'gd']);
            $image = $manager->make($file);
            $image->fit(111, 106);
            $image->save($ruta.$filename);

            $experiencia->adjunto = $filename;
        }

        $experiencia->estado = $request->get('estado');
        $experiencia->update();

        return redirect()->route('admin.experiencias.index')->with('msj','Experiencia actualizada exitosamente');
    }

    public function destroy($id)
    {
        $exper = Experiencias::findOrFail($id);
        $exper->delete();

        return redirect()->route('admin.experiencias.index')->with('msj','Experiencia eliminada exitosamente');
    }

    public function massDestroy(Request $request)
    {
        if ($request->input('ids')) {
            $entries = Experiencias::whereIn('id', $request->input('ids'))->get();

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
