<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Testimonios;
use Intervention\Image\ImageManager;

class AdminTestimoniosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $listtestimonios = Testimonios::all();

        return view('admin.testimonios.index', compact('listtestimonios'));
    }

    public function edit($id)
    {
        $testimonio = Testimonios::findOrFail($id);

        return view('admin.testimonios.edit', compact('testimonio'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nombre' => 'required',
            'email' => 'required|email',
            'cargo' => 'nullable|string|max:100',
            'testimonio' => 'required',
            'estado' => 'required',
        ]);

        $testimonio = Testimonios::findOrFail($id);
        $testimonio->nombre = $request->get('nombre');
        $testimonio->email = $request->get('email');
        $testimonio->cargo = $request->get('cargo');
        $testimonio->testimonio = $request->get('testimonio');
        $testimonio->estado = $request->get('estado');

        if ($request->hasFile('adjuntoimagen')) {
            $ruta = storage_path().'/respaldos/adjuntotestimonio/';

            $file = $request->file('adjuntoimagen');
            $extension = $file->getClientOriginalExtension();
            $filename = date('Y').'_testimonio_'.date('Y-m-d').'_'.$this->random_string().'.'.$extension;

            $manager = new ImageManager(['driver' => 'gd']);
            $image = $manager->make($file);
            $image->fit(234, 225);
            $image->save($ruta.$filename);

            $testimonio->imagen = $filename;
        }

        $testimonio->update();

        return redirect()->back()->with('msj','Testimonio actualizado exitosamente');
    }

    public function destroy($id)
    {
        $testimonio = Testimonios::findOrFail($id);
        $testimonio->delete();

        return redirect()->back()->with('msj','Testimonio eliminado exitosamente');
    }

}
