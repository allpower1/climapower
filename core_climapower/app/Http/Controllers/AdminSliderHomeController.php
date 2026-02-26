<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SliderHome;
use Intervention\Image\ImageManager;

class AdminSliderHomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $listsliderhome = SliderHome::all();

        return view('admin.sliderhome.index', compact('listsliderhome'));
    }

    public function create()
    {
        return view('admin.sliderhome.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'titulo_parte_1' => 'required|string|max:100',
            'titulo_parte_2' => 'required|string|max:191',
            'texto_boton' => 'nullable|string|max:50',
            'url_boton' => 'nullable|url:http,https|active_url|max:191',
            'adjuntoimagen' => 'required|file|max:10240|mimes:jpg,jpeg,png',
        ]);

        if ($request->hasFile('adjuntoimagen')) {
            $ruta = storage_path().'/respaldos/adjuntosliderhome/';

            $file = $request->file('adjuntoimagen');
            $extension = $file->getClientOriginalExtension();
            $filename = date('Y').'_slider_home_'.date('Y-m-d').'_'.$this->random_string().'.'.$extension;

            $manager = new ImageManager(['driver' => 'gd']);
            $image = $manager->make($file);
            $image->fit(1920, 874);
            $image->save($ruta.$filename);

            $sliderhome = new SliderHome;
            $sliderhome->titulo_parte_1 = $request->get('titulo_parte_1');
            $sliderhome->titulo_parte_2 = $request->get('titulo_parte_2');
            $sliderhome->texto_boton = $request->get('texto_boton');
            $sliderhome->url_boton = $request->get('url_boton');
            $sliderhome->imagen = $filename;
            $sliderhome->estado = 1;
            $sliderhome->save();

            return redirect()->route('admin.sliderhome.index')->with('msj','Slider home ingresado exitosamente');
        }
    }

    public function edit($id)
    {
        $sliderhome = SliderHome::findOrFail($id);

        return view('admin.sliderhome.edit', compact('sliderhome'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'titulo_parte_1' => 'required|string|max:100',
            'titulo_parte_2' => 'required|string|max:191',
            'texto_boton' => 'nullable|string|max:50',
            'url_boton' => 'nullable|url:http,https|active_url|max:191',
            'adjuntoimagen' => 'nullable|file|max:10240|mimes:jpg,jpeg,png',
        ]);

        $sliderhome = SliderHome::findOrFail($id);
        $sliderhome->titulo_parte_1 = $request->get('titulo_parte_1');
        $sliderhome->titulo_parte_2 = $request->get('titulo_parte_2');
        $sliderhome->texto_boton = $request->get('texto_boton');
        $sliderhome->url_boton = $request->get('url_boton');

        if ($request->hasFile('adjuntoimagen')) {
            $ruta = storage_path().'/respaldos/adjuntosliderhome/';

            $file = $request->file('adjuntoimagen');
            $extension = $file->getClientOriginalExtension();
            $filename = date('Y').'_slider_home_'.date('Y-m-d').'_'.$this->random_string().'.'.$extension;

            $manager = new ImageManager(['driver' => 'gd']);
            $image = $manager->make($file);
            $image->fit(1920, 874);
            $image->save($ruta.$filename);

            $sliderhome->imagen = $filename;
        }

        $sliderhome->estado = $request->get('estado');
        $sliderhome->update();

        return redirect()->route('admin.sliderhome.index')->with('msj','Slider home actualizado exitosamente');
    }

    public function destroy($id)
    {
        $sliderhome = SliderHome::findOrFail($id);
        $sliderhome->delete();

        return redirect()->route('admin.sliderhome.index')->with('msj','Slider home eliminado exitosamente');
    }

    public function massDestroy(Request $request)
    {
        if ($request->input('ids')) {
            $entries = SliderHome::whereIn('id', $request->input('ids'))->get();

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
