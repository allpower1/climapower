<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreAreasRequest;
use App\Models\Areas;
use Intervention\Image\ImageManager;

class AdminAreasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $listareas = Areas::all();

        return view('admin.areas.index', compact('listareas'));
    }

    public function create()
    {
        return view('admin.areas.create');
    }

    public function store(StoreAreasRequest $request)
    {
        $this->validate($request, [
            'adjuntoarea' => 'required|file|max:10240|mimes:jpg,jpeg,png',
        ]);

        if ($request->hasFile('adjuntoarea')) {
            $ruta = storage_path().'/respaldos/adjuntoarea/';

            $file = $request->file('adjuntoarea');
            $extension = $file->getClientOriginalExtension();
            $filename = date('Y').'_area_'.date('Y-m-d').'_'.$this->random_string().'.'.$extension;

            $manager = new ImageManager(['driver' => 'gd']);
            $image = $manager->make($file);
            $image->fit(111, 106);
            $image->save($ruta.$filename);

            $area = new Areas;
            $area->titulo = $request->get('titulo');
            $area->subtitulo = $request->get('subtitulo');
            $area->descripcion = $request->get('descripcion');
            $area->adjunto = $filename;
            $area->estado = 1;
            $area->save();

            return redirect()->route('admin.areas.index')->with('msj','Área ingresada exitosamente');
        }
    }

    public function edit($id)
    {
        $area = Areas::findOrFail($id);

        return view('admin.areas.edit', compact('area'));
    }

    public function update(StoreAreasRequest $request, $id)
    {
        $this->validate($request, [
            'adjuntoarea' => 'nullable|file|max:10240|mimes:jpg,jpeg,png',
        ]);

        $area = Areas::findOrFail($id);
        $area->titulo = $request->get('titulo');
        $area->subtitulo = $request->get('subtitulo');
        $area->descripcion = $request->get('descripcion');

        if ($request->hasFile('adjuntoarea')) {
            $ruta = storage_path().'/respaldos/adjuntoarea/';

            $file = $request->file('adjuntoarea');
            $extension = $file->getClientOriginalExtension();
            $filename = date('Y').'_area_'.date('Y-m-d').'_'.$this->random_string().'.'.$extension;

            $manager = new ImageManager(['driver' => 'gd']);
            $image = $manager->make($file);
            $image->fit(111, 106);
            $image->save($ruta.$filename);

            $area->adjunto = $filename;
        }

        $area->estado = $request->get('estado');
        $area->update();

        return redirect()->route('admin.areas.index')->with('msj','Área actualizada exitosamente');
    }

    public function destroy($id)
    {
        $exper = Areas::findOrFail($id);
        $exper->delete();

        return redirect()->route('admin.areas.index')->with('msj','Área eliminada exitosamente');
    }

    public function massDestroy(Request $request)
    {
        if ($request->input('ids')) {
            $entries = Areas::whereIn('id', $request->input('ids'))->get();

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
