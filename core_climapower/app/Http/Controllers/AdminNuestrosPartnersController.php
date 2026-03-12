<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\NuestrosPartners;
use Intervention\Image\ImageManager;

class AdminNuestrosPartnersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $listnuestrospartners = NuestrosPartners::all();

        return view('admin.nuestrospartners.index', compact('listnuestrospartners'));
    }

    public function create()
    {
        return view('admin.nuestrospartners.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre_completo' => 'required',
            'cargo' => 'required',
            'telefono' => 'required',
            'email' => 'required|email',
            'descripcion_breve' => 'required',
            'descripcion' => 'required',
            'adjuntopartner' => 'required|file|max:10240|mimes:jpg,jpeg,png',
        ]);

        if ($request->hasFile('adjuntopartner')) {
            $ruta = storage_path().'/respaldos/adjuntopartners/';

            $file = $request->file('adjuntopartner');
            $extension = $file->getClientOriginalExtension();
            $filename = date('Y').'_partners_'.date('Y-m-d').'_'.$this->random_string().'.'.$extension;

            $manager = new ImageManager(['driver' => 'gd']);
            $image = $manager->make($file);
            $image->fit(800, 800);
            $image->save($ruta.$filename);

            $partners = new NuestrosPartners;
            $partners->nombre_completo = $request->get('nombre_completo');
            $partners->cargo = $request->get('cargo');
            $partners->telefono = $request->get('telefono');
            $partners->email = $request->get('email');
            $partners->descripcion_breve = $request->get('descripcion_breve');
            $partners->descripcion = $request->get('descripcion');
            $partners->adjunto = $filename;
            $partners->estado = 1;
            $partners->save();

            return redirect()->route('admin.nuestrospartners.index')->with('msj','Partners ingresado exitosamente');
        }
    }

    public function edit($id)
    {
        $partner = NuestrosPartners::findOrFail($id);

        return view('admin.nuestrospartners.edit', compact('partner'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nombre_completo' => 'required',
            'cargo' => 'required',
            'telefono' => 'required',
            'email' => 'required|email',
            'descripcion_breve' => 'required',
            'descripcion' => 'required',
            'adjuntopartner' => 'nullable|file|max:10240|mimes:jpg,jpeg,png',
        ]);

        $partners = NuestrosPartners::findOrFail($id);
        $partners->nombre_completo = $request->get('nombre_completo');
        $partners->cargo = $request->get('cargo');
        $partners->telefono = $request->get('telefono');
        $partners->email = $request->get('email');
        $partners->descripcion_breve = $request->get('descripcion_breve');
        $partners->descripcion = $request->get('descripcion');

        if ($request->hasFile('adjuntopartner')) {
            $ruta = storage_path().'/respaldos/adjuntopartners/';

            $file = $request->file('adjuntopartner');
            $extension = $file->getClientOriginalExtension();
            $filename = date('Y').'_partners_'.date('Y-m-d').'_'.$this->random_string().'.'.$extension;

            $manager = new ImageManager(['driver' => 'gd']);
            $image = $manager->make($file);
            $image->fit(800, 800);
            $image->save($ruta.$filename);

            $partners->adjunto = $filename;
        }

        $partners->estado = $request->get('estado');
        $partners->update();

        return redirect()->route('admin.nuestrospartners.index')->with('msj','Partners actualizado exitosamente');
    }

    public function destroy($id)
    {
        $partners = NuestrosPartners::findOrFail($id);
        $partners->delete();

        return redirect()->route('admin.nuestrospartners.index')->with('msj','Partners eliminado exitosamente');
    }

    public function massDestroy(Request $request)
    {
        if ($request->input('ids')) {
            $entries = NuestrosPartners::whereIn('id', $request->input('ids'))->get();

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
